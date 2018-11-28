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

class ShowPlanetariumPage extends AbstractGamePage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}
	
	function show() 
	{
		global $LNG, $PLANET, $USETT;
		$this->assign(array(
			'ov_security_confirm'		=> sprintf($LNG['planetar_3'], $PLANET['name'].' ['.$PLANET['galaxy'].':'.$PLANET['system'].':'.$PLANET['planet'].']'),
			'cost_teleport'				=> config::get()->cost_teleport,
			'max_galaxy'				=> config::get()->max_galaxy,
			'max_system'				=> config::get()->max_system,
			'max_planets'				=> config::get()->max_planets,
			'stellarore'				=> $USETT['stellarore'],
			'constructionBonus'			=> round($PLANET['constructionBonus'],1),
			'deuteriumBonus'			=> round($PLANET['deuteriumBonus'],1),
			'solarBonus'				=> round($PLANET['solarBonus'],1),
			'maxpla_fields'				=> CalculateMaxPlanetFields($PLANET),
		));
		$this->display('page.planetarium.default.tpl');
	}
	
	function coord() 
	{
		global $LNG, $PLANET, $USER, $CONF;

		$galaxyr        = HTTP::_GP('sleeve', $PLANET['galaxy']);
		$systemr        = HTTP::_GP('system', $PLANET['system']);
		$planetsr       = HTTP::_GP('planets', $PLANET['planet']);
		
		$fleetPlanet    = 0;
		$fleetMoon      = 0;
		
		$planetData	= array();
		require 'includes/PlanetData.php';


		$dataIndex		= (int) ceil($planetsr / (config::get()->max_planets / count($planetData)));
		$maxTemperature	= $planetData[$dataIndex]['temp'];
		$minTemperature	= $maxTemperature - 40;
		
		$cost_tp 		= config::get()->cost_teleport;
		$checkPosition	= PlayerUtil::checkPosition(Universe::current(), $galaxyr,$systemr, $planetsr);
		$isPositionFree	= PlayerUtil::isPositionFree(Universe::current(), $galaxyr,$systemr, $planetsr);	
		
		$sql	= 'SELECT COUNT(*) as count
		FROM %%FLEETS%%
		WHERE (fleet_start_id = :planetId AND fleet_universe = :fleetUni AND fleet_mission != :fleet_mission) OR (`fleet_end_id` = :planetId AND fleet_universe = :fleetUni AND fleet_mission != :fleet_mission)' ;

		$fleetPlanet	= Database::get()->selectSingle($sql, array(
			':planetId'	=> $PLANET['id'],
			':fleetUni'	=> Universe::current(),
			':fleet_mission'	=> 8
		), 'count' );
		
		if($PLANET['id_luna'] != 0){
			$sql	= 'SELECT COUNT(*) as count
			FROM %%FLEETS%%
			WHERE (fleet_start_id = :planetId AND fleet_universe = :fleetUni) OR (`fleet_end_id` = :planetId AND fleet_universe = :fleetUni)' ;

			$fleetMoon	= Database::get()->selectSingle($sql, array(
				':planetId'	=> $PLANET['id_luna'],
				':fleetUni'	=> Universe::current()
			), 'count' );
		}
		
		if($USER['darkmatter'] < $cost_tp){
			$this->printMessage($LNG['planeta_7'], true, array('game.php?page=planetarium', 2));
		}elseif($galaxyr == $PLANET['galaxy'] && $systemr == $PLANET['system'] && $planetsr == $PLANET['planet']){
			$this->printMessage($LNG['galaxie_5'], true, array('game.php?page=planetarium', 2));
		}elseif($fleetPlanet > 0 || $fleetMoon > 0){
			$this->printMessage($LNG['planeta_8'], true, array('game.php?page=planetarium', 2));
		}elseif(!$isPositionFree || !$checkPosition){
			$this->printMessage($LNG['planeta_9'], true, array('game.php?page=planetarium', 2));
		}elseif($PLANET['planet_type'] == 3){
			$this->printMessage($LNG['planeta_10'], true, array('game.php?page=planetarium', 2));
		}elseif($galaxyr > Config::get()->max_galaxy || $systemr > Config::get()->max_system || $planetsr > Config::get()->max_planets){
			$this->printMessage($LNG['planeta_11'], true, array('game.php?page=planetarium', 2));
		}elseif($galaxyr < 0 || $systemr < 0 || $planetsr < 0){
			$this->printMessage($LNG['market_17'], true, array('game.php?page=planetarium', 2));
		}else{
			$sql	= "UPDATE %%PLANETS%% SET galaxy = :galaxy, system = :system, planet = :planet, temp_min = :temp_min, temp_max = :temp_max, last_relocate = :timeStamp WHERE id = :planetId AND universe = :Universe;";
			Database::get()->update($sql, array(
				':galaxy'			=> $galaxyr,
				':system'			=> $systemr,
				':planet'       	=> $planetsr,
				':planetId'       	=> $PLANET['id'],
				':temp_min'       	=> $minTemperature,
				':temp_max'       	=> $maxTemperature,
				':timeStamp'		=> TIMESTAMP,
				':Universe'       	=> Universe::current()
			));
			
			if(!empty($PLANET['id_luna'])){
				$sql	= "UPDATE %%PLANETS%% SET last_relocate = :timeStamp, galaxy = :galaxy, system = :system, planet = :planet, temp_min = :minTemperature, temp_max = :maxTemperature WHERE id = :lunaId AND universe = :Universe;";
				Database::get()->update($sql, array(
					':timeStamp'		=> TIMESTAMP,
					':galaxy'			=> $galaxyr,
					':system'			=> $systemr,
					':planet'       	=> $planetsr,
					':minTemperature'	=> $minTemperature,
					':maxTemperature'	=> $maxTemperature,
					':lunaId'       	=> $PLANET['id'],
					':Universe'       	=> Universe::current()
				));
			}
			
			if($USER['id_planet'] == $PLANET['id']){
				$sql	= "UPDATE %%USERS%% SET galaxy = :galaxy, system = :system, planet = :planet WHERE id = :userId AND universe = :Universe;";
				Database::get()->update($sql, array(
					':galaxy'			=> $galaxyr,
					':system'			=> $systemr,
					':planet'       	=> $planetsr,
					':userId'       	=> $USER['id'],
					':Universe'       	=> Universe::current()
				));
			}
			
			$USER['darkmatter'] -= $cost_tp;
			$this->printMessage($LNG['planeta_12'], true, array('game.php?page=planetarium', 2));
		}	
	} 
	
	function GenerateName() 
	{
		$Names		= file('botnames.txt');
		$NamesCount	= count($Names);
		$Rand		= mt_rand(0, $NamesCount);
		$UserName 	= trim($Names[$Rand]);
		
		$this->sendJSON(array('message' => $UserName));
	}
	
	function rename() 
	{
		global $LNG, $PLANET;

		$newname        = HTTP::_GP('name', '', UTF8_SUPPORT);
		if (!empty($newname))
		{
			if (!PlayerUtil::isNameValid($newname)) {
				$this->sendJSON(array('message' => $LNG['ov_newname_specialchar'], 'error' => true));
			} else {
				$db = Database::get();
                $sql = "UPDATE %%PLANETS%% SET name = :newName WHERE id = :planetID;";
                $db->update($sql, array(
                    ':newName'  => $newname,
                    ':planetID' => $PLANET['id']
                ));

                $this->sendJSON(array('message' => $LNG['ov_newname_done'], 'error' => false));
			}
		}
	}
	
	function delete() 
	{
		global $LNG, $PLANET, $USER;
		$del_name	= HTTP::_GP('name', '', UTF8_SUPPORT);
		
		if (!empty($del_name))
		{
            $db = Database::get();
            $sql = "SELECT COUNT(*) as state FROM %%FLEETS%% WHERE
                      (fleet_owner = :userID AND (fleet_start_id = :planetID OR fleet_start_id = :lunaID)) OR
                      (fleet_target_owner = :userID AND (fleet_end_id = :planetID OR fleet_end_id = :lunaID));";
            $IfFleets = $db->selectSingle($sql, array(
                ':userID'   => $USER['id'],
                ':planetID' => $PLANET['id'],
                ':lunaID'   => $PLANET['id_luna']
            ), 'state');
			if (empty($del_name)) {
				$this->sendJSON(array('message' => 'Enter the planet name'));
			} elseif ($IfFleets > 0) {
				$this->sendJSON(array('message' => $LNG['ov_abandon_planet_not_possible']));
			} elseif ($USER['id_planet'] == $PLANET['id']) {
				$this->sendJSON(array('message' => $LNG['ov_principal_planet_cant_abanone']));
			} elseif ($del_name != $PLANET['name']) {
				$this->sendJSON(array('message' => 'The name is incorrect'));
			} else {
                if($PLANET['planet_type'] == 1) {
                    $sql = "UPDATE %%PLANETS%% SET destruyed = :time WHERE id = :planetID;";
                    $db->update($sql, array(
                        ':time'   => TIMESTAMP+ 86400,
                        ':planetID' => $PLANET['id'],
                    ));
                    $sql = "DELETE FROM %%PLANETS%% WHERE id = :lunaID;";
                    $db->delete($sql, array(
                        ':lunaID' => $PLANET['id_luna']
                    ));
                } else {
                    $sql = "UPDATE %%PLANETS%% SET id_luna = 0 WHERE id_luna = :planetID;";
                    $db->update($sql, array(
                        ':planetID' => $PLANET['id'],
                    ));
                    $sql = "DELETE FROM %%PLANETS%% WHERE id = :planetID;";
                    $db->delete($sql, array(
                        ':planetID' => $PLANET['id'],
                    ));
                }
				$session	= Session::load();
                $session->planetId     = $USER['id_planet'];
				$this->sendJSON(array('ok' => true, 'message' => $LNG['ov_planet_abandoned']));
			}
		}
	}
}
