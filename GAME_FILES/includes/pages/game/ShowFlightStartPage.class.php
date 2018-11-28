<?php

/**
 *  2Moons 
 *   by Jan-Otto Kröpke 2009-2016
 *
 * For the full copyright and license information, please view the LICENSE
 *
 * @package 2Moons
 * @author Jan-Otto Kröpke <slaver7@gmail.com>
 * @copyright 2009 Lucky
 * @copyright 2016 Jan-Otto Kröpke <slaver7@gmail.com>
 * @licence MIT
 * @version 1.8.0
 * @link https://github.com/jkroepke/2Moons
 */

class ShowFlightStartPage extends AbstractGamePage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}
	
	function show() 
	{
		global $USER, $PLANET, $reslist, $resource, $LNG, $pricelist;
		$token			= HTTP::_GP('token', '');
		$staytime		= HTTP::_GP('staytime', 0);
		$speed			= HTTP::_GP('speed', 0);
		$r901			= HTTP::_GP('r901', 0);
		$r902			= HTTP::_GP('r902', 0);
		$r903			= HTTP::_GP('r903', 0);
		
		if (IsVacationMode($USER) || !isset($_SESSION['fleet'][$token]) || $_SESSION['fleet'][$token]['time'] < TIMESTAMP - 600) {
			unset($_SESSION['fleet'][$token]);
			$this->redirectTo('game.php?page=fleetTable');
		}
		
		$formData		= $_SESSION['fleet'][$token];
        unset($_SESSION['fleet'][$token]);
		
		$distance		= $formData['distance'];
		$targetGalaxy	= $formData['targetGalaxy'];
		$targetSystem	= $formData['targetSystem'];
		$targetPlanet	= $formData['targetPlanet'];
		$targetType		= $formData['targetType'];
		$targetMission	= $formData['targetMission'];
		$fleetSpeed		= $speed;
		$fleetGroup		= $formData['fleet_group'];
		$fleetArray		= array();
		$FleetRoom		= 0;
		
		foreach ($reslist['fleet'] as $id => $ShipID)
		{
			$amount		 				= max(0, round(HTTP::_GP('ship'.$ShipID, 0.0, 0.0)));
			
			if ($amount < 1 || $ShipID == 212) continue;

			$fleetArray[$ShipID]		= $amount;
			$FleetRoom			   	   += $pricelist[$ShipID]['capacity'] * $amount;
		}
		
		$FleetRoom	*= 1 + $USER['factor']['ShipStorage'];
		
		if (empty($fleetArray))
			$this->redirectTo('game.php?page=fleetTable');
		
		if($targetMission != 2)
		{
			$fleetGroup	= 0;
		}
		
		if ($PLANET['galaxy'] == $targetGalaxy && $PLANET['system'] == $targetSystem && $PLANET['planet'] == $targetPlanet && $PLANET['planet_type'] == $targetType)
		{
			$this->printMessage($LNG['fl_error_same_planet'], array(array(
				'label'	=> $LNG['sys_back'],
				'url'	=> 'game.php?page=fleet1'
			)));
		}
		
		if ($targetGalaxy < 1 || $targetGalaxy > config::get()->max_galaxy || 
			$targetSystem < 1 || $targetSystem > config::get()->max_system || 
			$targetPlanet < 1 || $targetPlanet > (config::get()->max_planets + 1) ||
			($targetType !== 1 && $targetType !== 2 && $targetType !== 3)) {
			$this->printMessage($LNG['fl_invalid_target'], array(array(
				'label'	=> $LNG['sys_back'],
				'url'	=> 'game.php?page=fleet1'
			)));
		}

		if ($targetMission == 3 && $r901 + $r902 + $r903 < 1)
		{
			$this->printMessage($LNG['fl_no_noresource'], array(array(
				'label'	=> $LNG['sys_back'],
				'url'	=> 'game.php?page=fleet2'
			)));
		}
		
		$ActualFleets		= FleetFunctions::GetCurrentFleets($USER['id']);
		
		if (FleetFunctions::GetMaxFleetSlots($USER) <= $ActualFleets)
		{
			$this->printMessage($LNG['fl_no_slots'], array(array(
				'label'	=> $LNG['sys_back'],
				'url'	=> 'game.php?page=fleetTable'
			)));
		}
		
		$ACSTime = 0;

        $db = Database::get();

        if(!empty($fleetGroup))
		{
            $sql = "SELECT ankunft FROM %%USERS_ACS%% INNER JOIN %%AKS%% ON id = acsID
			WHERE acsID = :acsID AND :maxFleets > (SELECT COUNT(*) FROM %%FLEETS%% WHERE fleet_group = :acsID);";
            $ACSTime = $db->selectSingle($sql, array(
                ':acsID'        => $fleetGroup,
                ':maxFleets'    => config::get()->max_fleets_per_acs,
            ), 'ankunft');

            if (empty($ACSTime)) {
				$fleetGroup	= 0;
				$targetMission	= 1;
			}
		}

        $sql = "SELECT id, id_owner, der_metal, der_crystal, destruyed, ally_deposit FROM %%PLANETS%% WHERE universe = :universe AND galaxy = :targetGalaxy AND system = :targetSystem AND planet = :targetPlanet AND planet_type = :targetType;";
        $targetPlanetData = $db->selectSingle($sql, array(
            ':universe'     => Universe::current(),
            ':targetGalaxy' => $targetGalaxy,
            ':targetSystem' => $targetSystem,
            ':targetPlanet' => $targetPlanet,
            ':targetType' => ($targetType == 2 ? 1 : $targetType),
        ));
		
		if ($targetMission == 7)
		{
			if (!empty($targetPlanetData)) {
				$this->printMessage($LNG['fl_target_exists'], array(array(
					'label'	=> $LNG['sys_back'],
					'url'	=> 'game.php?page=fleet1'
				)));
			}
			
			if ($targetType != 1) {
				$this->printMessage($LNG['fl_only_planets_colonizable'], array(array(
					'label'	=> $LNG['sys_back'],
					'url'	=> 'game.php?page=fleet1'
				)));
			}
		}
		
		if ($targetMission == 7 || $targetMission == 15 || $targetMission == 16)
		{
			$targetPlanetData	= array('id' => 0, 'id_owner' => 0, 'planettype' => 1);
		}
		else
		{
			if ($targetPlanetData["destruyed"] != 0 || empty($targetPlanetData)) {
				$this->printMessage($LNG['fl_no_target'], array(array(
					'label'	=> $LNG['sys_back'],
					'url'	=> 'game.php?page=fleet1'
				)));
			}
		}
		
		foreach ($fleetArray as $Ship => $Count)
		{
			if ($Count > $PLANET[$resource[$Ship]]) {
				$this->printMessage($LNG['fl_not_all_ship_avalible'], array(array(
					'label'	=> $LNG['sys_back'],
					'url'	=> 'game.php?page=fleetTable'
				)));
			}
		}
		
		if ($targetMission == 11)
		{
			$activeExpedition	= FleetFunctions::GetCurrentFleets($USER['id'], 11, true);
			$maxExpedition		= FleetFunctions::getDMMissionLimit($USER);

			if ($activeExpedition >= $maxExpedition) {
				$this->printMessage($LNG['fl_no_expedition_slot'], array(array(
					'label'	=> $LNG['sys_back'],
					'url'	=> 'game.php?page=fleetTable'
				)));
			}
		}
		elseif ($targetMission == 15)
		{		
			$activeExpedition	= FleetFunctions::GetCurrentFleets($USER['id'], 15, true);
			$maxExpedition		= FleetFunctions::getExpeditionLimit($USER);
			
			if ($activeExpedition >= $maxExpedition) {
				$this->printMessage($LNG['fl_no_expedition_slot'], array(array(
					'label'	=> $LNG['sys_back'],
					'url'	=> 'game.php?page=fleetTable'
				)));
			}
		}

		$usedPlanet	= isset($targetPlanetData['id_owner']);
		$myPlanet	= $usedPlanet && $targetPlanetData['id_owner'] == $USER['id'];
		$targetPlayerData	= array();
		
		if($targetMission == 7 || $targetMission == 15 || $targetMission == 16) {
			$targetPlayerData	= array(
				'id'				=> 0,
				'onlinetime'		=> TIMESTAMP,
				'ally_id'			=> 0,
				'urlaubs_modus'		=> 0,
				'authattack'		=> 0,
				'total_points'		=> 0,
			);
		} elseif($myPlanet) {
			$targetPlayerData	= $USER;
		} elseif(!empty($targetPlanetData['id_owner'])) {
            $sql = "SELECT user.id, user.onlinetime, user.ally_id, user.urlaubs_modus, user.banaday, user.authattack,
                stat.total_points
                FROM %%USERS%% as user
                LEFT JOIN %%STATPOINTS%% as stat ON stat.id_owner = user.id AND stat.stat_type = '1'
                WHERE user.id = :ownerID;";

			$targetPlayerData = $db->selectSingle($sql, array(
                ':ownerID'  => $targetPlanetData['id_owner']
            ));
		}

		if(empty($targetPlayerData))
		{
			$this->printMessage($LNG['fl_empty_target'], array(array(
				'label'	=> $LNG['sys_back'],
				'url'	=> 'game.php?page=fleet1'
			)));
		}
		
		$MisInfo		     	= array();		
		$MisInfo['galaxy']     	= $targetGalaxy;		
		$MisInfo['system'] 	  	= $targetSystem;	
		$MisInfo['planet'] 	  	= $targetPlanet;		
		$MisInfo['planettype'] 	= $targetType;	
		$MisInfo['IsAKS']		= $fleetGroup;
		$MisInfo['Ship'] 		= $fleetArray;		
		
		$availableMissions		= FleetFunctions::GetFleetMissions($USER, $MisInfo, $targetPlanetData);
		
		if (!in_array($targetMission, $availableMissions['MissionSelector'])) {
			$this->printMessage($LNG['fl_invalid_mission'], array(array(
				'label'	=> $LNG['sys_back'],
				'url'	=> 'game.php?page=fleet2'
			)));
		}
		
		if ($targetMission != 8 && IsVacationMode($targetPlayerData)) {
			$this->printMessage($LNG['fl_target_exists'], array(array(
				'label'	=> $LNG['sys_back'],
				'url'	=> 'game.php?page=fleet1'
			)));
		}
		
		if($targetMission == 1 || $targetMission == 2 || $targetMission == 9) {
			if(FleetFunctions::CheckBash($targetPlanetData['id']))
			{
				$this->printMessage($LNG['fl_bash_protection'], array(array(
					'label'	=> $LNG['sys_back'],
					'url'	=> 'game.php?page=fleetTable'
				)));
			}
		}
		
		if($targetMission == 1 || $targetMission == 2 || $targetMission == 5 || $targetMission == 6 || $targetMission == 9)
		{
			if(Config::get()->adm_attack == 1 && $targetPlayerData['authattack'] > $USER['authlevel'])
			{
				$this->printMessage($LNG['fl_admin_attack'], array(array(
					'label'	=> $LNG['sys_back'],
					'url'	=> 'game.php?page=fleetTable'
				)));
			}

			$sql	= 'SELECT total_points
			FROM %%STATPOINTS%%
			WHERE id_owner = :userId AND stat_type = :statType';

			$USER	+= Database::get()->selectSingle($sql, array(
				':userId'	=> $USER['id'],
				':statType'	=> 1
			));
		
			$IsNoobProtec	= CheckNoobProtec($USER, $targetPlayerData, $targetPlayerData);
			
			if ($IsNoobProtec['NoobPlayer'])
			{
				$this->printMessage($LNG['fl_player_is_noob'], array(array(
					'label'	=> $LNG['sys_back'],
					'url'	=> 'game.php?page=fleetTable'
				)));
			}
			
			if ($IsNoobProtec['StrongPlayer']) {
				$this->printMessage($LNG['fl_player_is_strong'], array(array(
					'label'	=> $LNG['sys_back'],
					'url'	=> 'game.php?page=fleetTable'
				)));
			}
		}

		if ($targetMission == 5)
		{	
			if($targetPlayerData['ally_id'] != $USER['ally_id']) {
				$sql = "SELECT COUNT(*) as state FROM %%BUDDY%%
				WHERE id NOT IN (SELECT id FROM %%BUDDY_REQUEST%% WHERE %%BUDDY_REQUEST%%.id = %%BUDDY%%.id) AND
				(owner = :ownerID AND sender = :userID) OR (owner = :userID AND sender = :ownerID);";
                $buddy = $db->selectSingle($sql, array(
                    ':ownerID'  => $targetPlayerData['id'],
                    ':userID'   => $USER['id']
                ), 'state');

                if($buddy == 0) {
					$this->printMessage($LNG['fl_no_same_alliance'], array(array(
						'label'	=> $LNG['sys_back'],
						'url'	=> 'game.php?page=fleetTable'
					)));
				}
			}
		}

		$fleetMaxSpeed 	= FleetFunctions::GetFleetMaxSpeed($fleetArray, $USER);
		$SpeedFactor    = FleetFunctions::GetGameSpeedFactor();
		$duration      	= FleetFunctions::GetMissionDuration($fleetSpeed, $fleetMaxSpeed, $distance, $SpeedFactor, $USER);
		$consumption   	= FleetFunctions::GetFleetConsumption($fleetArray, $duration, $distance, $USER, $SpeedFactor);
	
		if ($PLANET[$resource[903]] < $consumption) {
			$this->printMessage($LNG['fl_not_enough_deuterium'], array(array(
				'label'	=> $LNG['sys_back'],
				'url'	=> 'game.php?page=fleetTable'
			)));
		}
		
		$StayDuration    = 0;
		
		if($targetMission == 5 || $targetMission == 11 || $targetMission == 15 || $targetMission == 16)
		{
			if(!isset($availableMissions['StayBlock'][$staytime]))
			{
				$this->printMessage($LNG['fl_hold_time_not_exists'], array(array(
					'label'	=> $LNG['sys_back'],
					'url'	=> 'game.php?page=fleetTable'
				)));
			}
			
			$StayDuration    = round($availableMissions['StayBlock'][$staytime] * 3600, 0);
		}
		
		$FleetRoom		-= $consumption;
		
		$fleetResource	= array(
			901	=> min($r901, floor($PLANET[$resource[901]])),
			902	=> min($r902, floor($PLANET[$resource[902]])),
			903	=> min($r903, floor($PLANET[$resource[903]] - $consumption)),
		);
		
		$StorageNeeded		= array_sum($fleetResource);
		
		if ($StorageNeeded > $FleetRoom)
		{
			$this->printMessage($LNG['fl_not_enough_space'], array(array(
				'label'	=> $LNG['sys_back'],
				'url'	=> 'game.php?page=fleetTable'
			)));
		}
		
		$PLANET[$resource[901]]	-= $fleetResource[901];
		$PLANET[$resource[902]]	-= $fleetResource[902];
		$PLANET[$resource[903]]	-= $fleetResource[903] + $consumption;

		$fleetStartTime		= $duration + TIMESTAMP;
		$timeDifference		= round(max(0, $fleetStartTime - $ACSTime));
		
		if($fleetGroup != 0)
		{
			if($timeDifference != 0)
			{
				FleetFunctions::setACSTime($timeDifference, $fleetGroup);
			}
			else
			{
				$fleetStartTime		= $ACSTime;
			}
		}
		
		$fleetStayTime		= $fleetStartTime + $StayDuration;
		$fleetEndTime		= $fleetStayTime + $duration;
		
		FleetFunctions::sendFleet($fleetArray, $targetMission, $USER['id'], $PLANET['id'], $PLANET['galaxy'],
			$PLANET['system'], $PLANET['planet'], $PLANET['planet_type'], $targetPlanetData['id_owner'],
			$targetPlanetData['id'], $targetGalaxy, $targetSystem, $targetPlanet, $targetType, $fleetResource,
			$fleetStartTime, $fleetStayTime, $fleetEndTime, $fleetGroup);
		
		$this->redirectTo('game.php?page=fleetTable');
	}
}
