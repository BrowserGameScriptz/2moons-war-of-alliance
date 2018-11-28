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

class ShowBonusPage extends AbstractGamePage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
		$this->setWindow('popup');
		$this->initTemplate();
	}
	
	function entryreward(){
		
		global $USER, $LNG, $USETT, $PLANET, $resource;
		
		$this->assign(array(
			
		));
		
		$this->display('page.entryreward.default.tpl');
	}
	
	function levelup()
	{
		global $USER, $LNG, $USETT, $PLANET, $resource;
		
		if($USER['commanderExpe'] < 1000) $this->redirectTo('frame.php');
		
		//missing 22
		
		$rewardArray = array("1" => array(901 => 10000, 902 => 10000, 903 => 5000), "2" => array(901 => 25000, 902 => 20000, 903 => 5000), "3" => array(901 => 50000, 902 => 25000, 903 => 10000, 202 => 5), "4" => array(901 => 65000, 902 => 30000, 903 => 12500, 202 => 5), "5" => array(901 => 80000, 902 => 35000, 903 => 15000, 202 => 10, 204 => 20), "6" => array(901 => 100000, 902 => 50000, 903 => 20000, 204 => 20, 206 => 20), "7" => array(901 => 100000, 902 => 50000, 903 => 25000, 204 => 50, 206 => 30), "8" => array(901 => 100000, 902 => 75000, 903 => 25000, 204 => 50, 208 => 1), "9" => array(901 => 100000, 902 => 100000, 903 => 25000, 202 => 25, 207 => 50), "10" => array(901 => 150000, 902 => 125000, 903 => 30000, 203 => 4), "11" => array(901 => 200000, 902 => 150000, 903 => 40000, 407 => 2), "12" => array(901 => 250000, 902 => 175000, 903 => 50000, 226 => 50), "13" => array(901 => 300000, 902 => 200000, 903 => 60000, 204 => 200), "14" => array(901 => 350000, 902 => 225000, 903 => 70000), "15" => array(901 => 400000, 902 => 250000, 903 => 80000, 407 => 3), "16" => array(901 => 475000, 902 => 275000, 903 => 90000, 226 => 50), "17" => array(901 => 50000, 902 => 300000, 903 => 100000, 225 => 30), "18" => array(901 => 700000, 902 => 400000, 903 => 150000, 203 => 15), "19" => array(901 => 1000000, 902 => 500000, 903 => 200000, 213 => 60), "20" => array(901 => 1400000, 902 => 700000, 903 => 350000, 921 => 200), "21" => array(901 => 1600000, 902 => 800000, 903 => 400000, 211 => 25), "22" => array(901 => 1800000, 902 => 900000, 903 => 450000), "23" => array(901 => 2000000, 902 => 1000000, 903 => 500000, 228 => 5), "24" => array(901 => 2200000, 902 => 1100000, 903 => 550000, 227 => 5), "25" => array(901 => 2400000, 902 => 1200000, 903 => 600000, 921 => 250), "26" => array(901 => 2600000, 902 => 1300000, 903 => 650000, 204 => 600), "27" => array(901 => 2800000, 902 => 1400000, 903 => 700000, 206 => 700), "28" => array(901 => 3000000, 902 => 1500000, 903 => 750000, 226 => 500), "29" => array(901 => 3300000, 902 => 1650000, 903 => 825000, 207 => 600), "30" => array(901 => 3600000, 902 => 1800000, 903 => 900000, 226 => 350), "31" => array(901 => 4000000, 902 => 2000000, 903 => 1000000, 225 => 125), "32" => array(901 => 4400000, 902 => 2200000, 903 => 1100000, 213 => 100), "33" => array(901 => 4800000, 902 => 2400000, 903 => 1200000, 211 => 40), "34" => array(901 => 5200000, 902 => 2600000, 903 => 1300000, 226 => 15), "35" => array(901 => 5600000, 902 => 2800000, 903 => 1400000, 228 => 10), "36" => array(901 => 6000000, 902 => 3000000, 903 => 1500000, 227 => 10), "37" => array(901 => 6500000, 902 => 3250000, 903 => 1625000, 218 => 4), "38" => array(901 => 7000000, 902 => 3500000, 903 => 1750000, 222 => 2), "39" => array(901 => 7600000, 902 => 3800000, 903 => 1900000, 226 => 2), "40" => array(901 => 8200000, 902 => 4100000, 903 => 2050000, 204 => 2250), "41" => array(901 => 8800000, 902 => 4400000, 903 => 2200000, 206 => 2250), "42" => array(901 => 9400000, 902 => 4700000, 903 => 2350000, 226 => 1500), "43" => array(901 => 10000000, 902 => 5000000, 903 => 2500000, 207 => 1750), "44" => array(901 => 10600000, 902 => 5300000, 903 => 2650000, 226 => 1250), "45" => array(901 => 11400000, 902 => 5700000, 903 => 2850000, 921 => 450, 225 => 400), "46" => array(901 => 12200000, 902 => 6100000, 903 => 3050000, 213 => 300), "47" => array(901 => 12800000, 902 => 6400000, 903 => 3200000, 211 => 100), "48" => array(901 => 13800000, 902 => 6900000, 903 => 3450000, 226 => 20), "49" => array(901 => 14400000, 902 => 7200000, 903 => 3600000, 216 => 20), "50" => array(901 => 15400000, 902 => 7700000, 903 => 3850000, 942 => 1, 227 => 17));
		
		$finalArray = $rewardArray[$USER['commanderLevel']+1];
		$templateAr = array();
		$planetSql  = " ";
		$usersSSql  = " ";
		foreach($finalArray as $elementId => $count){
			if(isset($USER[$resource[$elementId]])){
				$templateAr[$elementId] 	 = $count;
				$usersSSql  				 .= ", ".$resource[$elementId]." = ".$USER[$resource[$elementId]]." + ".$count;
				$USER[$resource[$elementId]] += $count;
			}elseif(isset($PLANET[$resource[$elementId]])){
				$templateAr[$elementId] 	 = $count;
				$planetSql  				 .= ",".$resource[$elementId]." = ".$PLANET[$resource[$elementId]]." + ".$count;
				$PLANET[$resource[$elementId]] += $count;
			}
		}
		
		if($USER['commanderLevel'] + 1 == 2){
			$sql	= 'UPDATE %%USETT%% SET specialOffer = :specialOffer WHERE id = :userId';
			database::get()->update($sql, array(
				':specialOffer'	=> TIMESTAMP,
				':userId'		=> $USER['id']
			)); 
		}
			
		$newExperienceUser = $USER['commanderExpe'] - 1000;
		$sql	= 'UPDATE %%USERS%% SET commanderExpe = :commanderExpe, commanderLevel = commanderLevel + 1'.$usersSSql.' WHERE id = :userId';
		database::get()->update($sql, array(
			':commanderExpe'=> $newExperienceUser,
			':userId'		=> $USER['id']
		)); 
		
		$sql	= 'UPDATE %%PLANETS%% SET name = :name'.$planetSql.' WHERE id = :planetId';
		database::get()->update($sql, array(
			':name'			=> $PLANET['name'],
			':planetId'		=> $PLANET['id']
		)); 
		
		$this->assign(array(
			'newLevelReached' => $USER['commanderLevel'] + 1,
			'templateAr' 	  => $templateAr
		));
		
		$this->display('page.levelup.default.tpl');
		
	}
	function offerbuy()
	{
		global $USER, $LNG, $USETT, $PLANET;
					
		if($USETT['specialOffer'] >= TIMESTAMP - 48 * 3600){
			if($USER['antimatter'] >= 200){
				$sql	= 'UPDATE %%USETT%% SET specialOffer = 0, specialOfferIsSeen = 0 WHERE id = :userId';
				database::get()->update($sql, array(
					':userId'		=> $USER['id']
				)); 
				
				$USER['antimatter']	-= 200;
				$USER['darkmatter']	+= 1000;
				$sql	= 'UPDATE %%USERS%% SET darkmatter = darkmatter + 1000, antimatter = antimatter - 200, microprocessors_tech = 5, mining_tech = 5, spy_tech = 5, energy_tech = 10, astrophysics_tech = 3, colonisation_tech = 1 WHERE id = :userId';
				database::get()->update($sql, array(
					':userId'		=> $USER['id']
				)); 
				
				$sql	= 'UPDATE %%PLANETS%% SET metal_mine = 25, crystal_mine = 25, deuterium_sintetizer = 20, solar_plant = 27, fusion_plant = 12, laboratory = 20, robot_factory = 10, nano_factory = 1, space_port = 3, colonizer = colonizer + 1, light_hunter = light_hunter + 2500, recycler = recycler + 100, crusher = crusher + 1000, big_ship_cargo = big_ship_cargo + 50, battle_ship = battle_ship + 1000 WHERE id = :planetId';
				database::get()->update($sql, array(
					':planetId'		=> $PLANET['id']
				)); 
				$this->printMessage($LNG['specialof_4']);
			}else{
				$this->printMessage($LNG['premium_6']);	
			}
		}else{
			$this->printMessage($LNG['specialof_3']);	
		}
	}

	function offer()
	{
		global $USER, $LNG, $USETT;		
		$this->assign(array());
		$this->display('page.specialoffer.default.tpl');
	}
}
