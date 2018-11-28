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

class ShowOrbitaPage extends AbstractGamePage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}
	
	function show() 
	{
		global $USER, $PLANET, $LNG, $resource, $reslist, $pricelist;
		$techExpedition      = $USER[$resource[154]];

		if ($techExpedition >= 1)
		{
			$activeExpedition   = FleetFunctions::GetCurrentFleets($USER['id'], 15, true);
			$maxExpedition 		= $techExpedition;
		}
		else
		{
			$activeExpedition 	= 0;
			$maxExpedition 		= 0;
		}

		$maxFleetSlots	= FleetFunctions::GetMaxFleetSlots($USER);
		
		$db = database::get();
		$sql = "SELECT * FROM %%FLEETS%% WHERE fleet_owner = :userID AND fleet_mission <> 10 ORDER BY fleet_end_time ASC;";
        $fleetResult = $db->select($sql, array(
            ':userID'   => $USER['id']
        ));

        $activeFleetSlots	= $db->rowCount();
		
		$PlanetOrbita	= array();

		$PlanetsOribi	= getPlanetsIngame($USER);

		foreach($PlanetsOribi as $PlanetQuery)
		{
			
			$sql = "SELECT * FROM %%PLANETS%% WHERE id = :lunaId AND destruyed = 0 AND id_owner = :ownerId;";
			$lunaData = database::get()->selectSingle($sql, array(
				':lunaId'    => $PlanetQuery['id_luna'],
				':ownerId'   => $USER['id']
			));
		
			$PlanetOrbita[$PlanetQuery['id']]	= array(
				'name'			=> $PlanetQuery['name'],
				'galaxy'		=> $PlanetQuery['galaxy'],
				'system'		=> $PlanetQuery['system'],
				'planet'		=> $PlanetQuery['planet'],
				'image' 		=> $PlanetQuery['image'],
				'der_metal' 	=> $PlanetQuery['der_metal'],
				'der_crystal' 	=> $PlanetQuery['der_crystal'],
				'id_luna'	 	=> $PlanetQuery['id_luna'],
				'lunaPic'	 	=> empty($lunaData) ? "" : $lunaData['image'],
			);
		}
		
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
				
			//$TotalFleetPoints += ($PLANET[$resource[$FleetID]] * ($pricelist[$FleetID]['cost'][901] + $pricelist[$FleetID]['cost'][902])) / 1000;
			
			$FleetsOnPlanet[]	= array(
				'id'	=> $FleetID,
				'speed'	=> FleetFunctions::GetFleetMaxSpeed($FleetID, $USER),
				'count'	=> $PLANET[$resource[$FleetID]],
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
		$acsData	= $this->GetAvalibleACS();	
		
		$sql	= 'SELECT COUNT(*) as state
			FROM %%PLANETS%%
			WHERE `id_owner`	= :userId
			AND `planet_type`	= :type
			AND `destruyed`		= :destroyed;';

		$currentPlanetCount	= database::get()->selectSingle($sql, array(
			':userId'		=> $USER['id'],
			':type'			=> 1,
			':destroyed'	=> 0
		), 'state');

		$maxPlanetCount		= PlayerUtil::maxPlanetCount($USER);
			
		$this->assign(array(
			'PlanetOrbita'				=> $PlanetOrbita,
			'orbitPlanetCount'			=> $currentPlanetCount,
			'orbitMaxPlanetCount'		=> $maxPlanetCount,
			'acsData'					=> $acsData,
			'activeExpedition'			=> $activeExpedition,
			'maxExpedition'				=> $maxExpedition,
			'activeFleetSlots'			=> $activeFleetSlots,
			'maxFleetSlots'				=> $maxFleetSlots,
			'FleetsOnPlanet'			=> $FleetsOnPlanet,
			'FleetsOnPlanetBattle'		=> $FleetsOnPlanetBattle,
			'FleetsOnPlanetTransport'	=> $FleetsOnPlanetTransport,
			'FleetsOnPlanetProcessorcs'	=> $FleetsOnPlanetProcessorcs,
			'FleetsOnPlanetSpecial'		=> $FleetsOnPlanetSpecial,
			'TotalFleetPoints'			=> $TotalFleetPoints,
		));
		
		$this->display('page.orbita.default.tpl');
	}
	
	private function GetAvalibleACS()
	{
		global $USER;
		
		$db = Database::get();

        $sql = "SELECT acs.id, acs.name, planet.galaxy, planet.system, planet.planet, planet.planet_type
		FROM %%USERS_ACS%%
		INNER JOIN %%AKS%% acs ON acsID = acs.id
		INNER JOIN %%PLANETS%% planet ON planet.id = acs.target
		WHERE userID = :userID AND :maxFleets > (SELECT COUNT(*) FROM %%FLEETS%% WHERE fleet_group = acsID);";
        $ACSResult = $db->select($sql, array(
            ':userID'       => $USER['id'],
            ':maxFleets'    => Config::get()->max_fleets_per_acs,
        ));

        $ACSList	= array();
		
		foreach ($ACSResult as $ACSRow) {
			$ACSList[]	= $ACSRow;
		}
		
		return $ACSList;
	}
}
