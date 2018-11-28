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

class ShowFlightPage extends AbstractGamePage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}
	
	private function GetAvalibleACS($acsId)
	{
		global $USER;
		
		$db = Database::get();

        $sql = "SELECT acs.id, acs.name, planet.galaxy, planet.system, planet.planet, planet.planet_type
		FROM %%USERS_ACS%%
		INNER JOIN %%AKS%% acs ON acsID = acs.id
		INNER JOIN %%PLANETS%% planet ON planet.id = acs.target
		WHERE userID = :userID AND acsID = :acsID AND :maxFleets > (SELECT COUNT(*) FROM %%FLEETS%% WHERE fleet_group = acsID);";
        $ACSResult = $db->selectSingle($sql, array(
            ':userID'       => $USER['id'],
            ':maxFleets'    => Config::get()->max_fleets_per_acs,
            ':acsID'    	=> $acsId
        ));
		
		return $ACSResult;
	}
	
	function show() 
	{
		global $USER, $PLANET, $reslist, $resource, $LNG, $pricelist;
		$acsData			= array();
		$FleetID			= HTTP::_GP('fleetID', 0);
		$GetAction			= HTTP::_GP('action', "");
		$targetGalaxy		= HTTP::_GP('galaxy', (int) $PLANET['galaxy']);
		$targetSystem		= HTTP::_GP('system', (int) $PLANET['system']);
		$targetPlanet		= HTTP::_GP('planet', (int) $PLANET['planet']);
		$targetType			= HTTP::_GP('planettype', (int) $PLANET['planet_type']);
		$targetMission		= HTTP::_GP('mission', 0);
		$isAcsMission		= HTTP::_GP('acs', 0);
		
		if(!empty($isAcsMission)){
			$acsDetailsToP 	= $this->GetAvalibleACS($isAcsMission);
			$targetMission 	= 2;
			$targetGalaxy	= $acsDetailsToP['galaxy'];
			$targetSystem	= $acsDetailsToP['system'];
			$targetPlanet	= $acsDetailsToP['planet'];
			$targetType		= $acsDetailsToP['planet_type'];
		}
		
		if($targetMission == 15 || $targetMission == 16)
			$targetPlanet = Config::get($USER['universe'])->max_planets + 1;
		
		if(!empty($FleetID) && !IsVacationMode($USER))
		{
			switch($GetAction){
				case "sendfleetback":
					FleetFunctions::SendFleetBack($USER, $FleetID);
				break;
				case "acs":
					$acsData	= $this->getACSPageData($FleetID);
				break;
			}
		}
		
		$techExpedition      = $USER[$resource[124]];

		if ($techExpedition >= 1)
		{
			$activeExpedition   = FleetFunctions::GetCurrentFleets($USER['id'], 15, true);
			$maxExpedition 		= floor(sqrt($techExpedition));
		}
		else
		{
			$activeExpedition 	= 0;
			$maxExpedition 		= 0;
		}

		$maxFleetSlots	= FleetFunctions::GetMaxFleetSlots($USER);
		
		$fleetsData					= array();
		$FleetsOnPlanet				= array();
		$FleetsOnPlanetBattle		= array();
		$elementPlanetBattle		= array(204,205,229,206,207,215,213,211,224,225,226,214,216,227,230,228,222,218,221);
		$FleetsOnPlanetTransport	= array();
		$elementPlanetTransport		= array(202,203,217);
		$FleetsOnPlanetProcessorcs	= array();
		$elementPlanetProcessorcs	= array(209,219);
		$FleetsOnPlanetSpecial		= array();
		$elementPlanetSpecial		= array(208,210,220);
		$TotalFleetPoints			= 0;
		
		foreach($reslist['fleet'] as $FleetID)
		{
			if ($PLANET[$resource[$FleetID]] == 0)
				continue;
				
			$TotalFleetPoints += $PLANET[$resource[$FleetID]] * (($pricelist[$FleetID]['cost'][901] + $pricelist[$FleetID]['cost'][902]) / config::get()->stat_settings);
			
			$FleetsOnPlanet[]	= array(
				'id'	=> $FleetID,
				'speed'	=> FleetFunctions::GetFleetMaxSpeed($FleetID, $USER),
				'count'	=> $PLANET[$resource[$FleetID]],
			);
			
			$fleetsData[$FleetID]	= array(
				'points'		=> (($pricelist[$FleetID]['cost'][901] + $pricelist[$FleetID]['cost'][902]) / config::get()->stat_settings),
				'amount'		=> 0,
				'count'			=> $PLANET[$resource[$FleetID]],
				'speed'			=> FleetFunctions::GetFleetMaxSpeed($FleetID, $USER),
				'capacity'		=> $pricelist[$FleetID]['capacity'],
				'consumption'	=> FleetFunctions::GetShipConsumption($FleetID, $USER),
			);
		}
		
		foreach($elementPlanetBattle as $FleetID)
		{
			if ($PLANET[$resource[$FleetID]] == 0)
				continue;
			
			$TotalFleetPoints += $PLANET[$resource[$FleetID]] * (($pricelist[$FleetID]['cost'][901] + $pricelist[$FleetID]['cost'][902]) / config::get()->stat_settings);
			$FleetsOnPlanetBattle[]	= array(
				'id'	=> $FleetID,
				'speed'	=> FleetFunctions::GetFleetMaxSpeed($FleetID, $USER),
				'count'	=> $PLANET[$resource[$FleetID]],
			);
		}
		
		foreach($elementPlanetTransport as $FleetID)
		{
			if ($PLANET[$resource[$FleetID]] == 0)
				continue;
				
			$TotalFleetPoints += $PLANET[$resource[$FleetID]] * (($pricelist[$FleetID]['cost'][901] + $pricelist[$FleetID]['cost'][902]) / config::get()->stat_settings);
			$FleetsOnPlanetTransport[]	= array(
				'id'	=> $FleetID,
				'speed'	=> FleetFunctions::GetFleetMaxSpeed($FleetID, $USER),
				'count'	=> $PLANET[$resource[$FleetID]],
			);
		}
		
		foreach($elementPlanetProcessorcs as $FleetID)
		{
			if ($PLANET[$resource[$FleetID]] == 0)
				continue;
				
			$TotalFleetPoints += $PLANET[$resource[$FleetID]] * (($pricelist[$FleetID]['cost'][901] + $pricelist[$FleetID]['cost'][902]) / config::get()->stat_settings);
			$FleetsOnPlanetProcessorcs[]	= array(
				'id'	=> $FleetID,
				'speed'	=> FleetFunctions::GetFleetMaxSpeed($FleetID, $USER),
				'count'	=> $PLANET[$resource[$FleetID]],
			);
		}
		
		foreach($elementPlanetSpecial as $FleetID)
		{
			if ($PLANET[$resource[$FleetID]] == 0)
				continue;
				
			$TotalFleetPoints += $PLANET[$resource[$FleetID]] * (($pricelist[$FleetID]['cost'][901] + $pricelist[$FleetID]['cost'][902]) / config::get()->stat_settings);
			$FleetsOnPlanetSpecial[]	= array(
				'id'	=> $FleetID,
				'speed'	=> FleetFunctions::GetFleetMaxSpeed($FleetID, $USER),
				'count'	=> $PLANET[$resource[$FleetID]],
			);
		}
		
        $sql = "SELECT id, id_owner, der_metal, der_crystal FROM %%PLANETS%% WHERE universe = :universe AND galaxy = :targetGalaxy AND system = :targetSystem AND planet = :targetPlanet AND planet_type = '1';";
        $targetPlanetData = database::get()->selectSingle($sql, array(
            ':universe' => Universe::current(),
            ':targetGalaxy' => $targetGalaxy,
            ':targetSystem' => $targetSystem,
            ':targetPlanet' => $targetPlanet
        ));
		
		$MisInfo		     		= array();		
		$MisInfo['galaxy']     		= $targetGalaxy;		
		$MisInfo['system'] 	  		= $targetSystem;	
		$MisInfo['planet'] 	  		= $targetPlanet;		
		$MisInfo['planettype'] 		= $targetType;	
		$MisInfo['IsAKS']			= $isAcsMission;
		$MisInfo['Ship'] 			= array();
		
		$MissionOutput	 			= FleetFunctions::GetFleetMissions($USER, $MisInfo, $targetPlanetData);
		
		$GameSpeedFactor   		 	= FleetFunctions::GetGameSpeedFactor();		
		$distance      				= FleetFunctions::GetTargetDistance(array($PLANET['galaxy'], $PLANET['system'], $PLANET['planet']), array($targetGalaxy, $targetSystem, $targetPlanet));
		
		$token		= getRandomString();
		
		$_SESSION['fleet'][$token]	= array(
			'time'			=> TIMESTAMP,
			'targetGalaxy'	=> $targetGalaxy,
			'targetSystem'	=> $targetSystem,
			'targetPlanet'	=> $targetPlanet,
			'targetType'	=> $targetType,
			'targetMission'	=> $targetMission,
			'distance'		=> $distance,
			'fleet_group'	=> $isAcsMission,
		);
		
		$this->assign(array(
			'token'						=> $token,
			'distance'					=> $distance,
			'GameSpeedFactor'			=> $GameSpeedFactor,
			'targetMission'				=> $targetMission,
			'FleetsOnPlanet'			=> $FleetsOnPlanet,
			'FleetsOnPlanetBattle'		=> $FleetsOnPlanetBattle,
			'FleetsOnPlanetTransport'	=> $FleetsOnPlanetTransport,
			'FleetsOnPlanetProcessorcs'	=> $FleetsOnPlanetProcessorcs,
			'FleetsOnPlanetSpecial'		=> $FleetsOnPlanetSpecial,
			'TotalFleetPoints'			=> $TotalFleetPoints,
			'fleetsData'				=> $fleetsData,
			'targetGalaxy'				=> $targetGalaxy,
			'targetSystem'				=> $targetSystem,
			'targetPlanet'				=> $targetPlanet,
			'speedSelect'				=> FleetFunctions::$allowedSpeed,
			'StaySelector' 				=> $MissionOutput['StayBlock'],
			'LNGMISSION' 				=> $LNG['type_mission_'.$targetMission],
		));
		
		$this->display('page.flight.default.tpl');
	}
}
