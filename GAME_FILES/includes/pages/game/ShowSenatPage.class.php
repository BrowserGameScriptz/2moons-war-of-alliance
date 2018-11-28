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

class ShowSenatPage extends AbstractGamePage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}
	
	public function UpdateOfficierLevel($Element)
	{
		global $PLANET, $USER, $resource, $pricelist;
		
		$arrayElements		= $this->getArray($Element);
		$apPrice 			= $arrayElements['priceApArray'][$USER[$resource[$Element]]+1];
		if ($apPrice > $USER[$resource[800]] || $pricelist[$Element]['max'] <= $USER[$resource[$Element]]) {
			return;
		}
				
		$USER[$resource[$Element]]	= min($pricelist[$Element]['max'], $USER[$resource[$Element]]+1);
			
		$USER[$resource[800]]		-= $apPrice;

		$sql	= 'UPDATE %%USERS%% SET
				'.$resource[$Element].' = :newLevel, achievements = achievements - :resource800, achievements_used = achievements_used + :resource800
				WHERE
				id = :userId;';

		Database::get()->update($sql, array(
			':newLevel'		=> $USER[$resource[$Element]],
			':resource800'	=> $apPrice,
			':userId'		=> $USER['id']
		));
		
		$this->redirectTo('game.php?page=senat');
		exit();
	}
	
	public function UpdateOfficier($Element, $days)
	{
		global $PLANET, $USER, $resource, $pricelist;
		
		$arrayElements		= $this->getArray($Element);
		$dmPrice 			= $arrayElements['priceDMArray'][$USER[$resource[$Element]]]*$days;
		if ($dmPrice > $USER['darkmatter'] || $days < 0) {
			return;
		}
			
		$USER[$resource[$Element].'_time']	= max($USER[$resource[$Element].'_time'], TIMESTAMP) + 24*3600*$days;
			
		$USER[$resource[921]]		-= $dmPrice;

		$sql	= 'UPDATE %%USERS%% SET
				'.$resource[$Element].'_time = :newTime
				WHERE
				id = :userId;';

		Database::get()->update($sql, array(
			':newTime'	=> $USER[$resource[$Element].'_time'],
			':userId'	=> $USER['id']
		));
		
		$this->redirectTo('game.php?page=senat');
		exit();
	}
	
	public function show()
	{
		global $USER, $PLANET, $resource, $reslist, $LNG, $pricelist, $USETT;
		$updateID	  = HTTP::_GP('id', 0);
		$updateUPID	  = HTTP::_GP('upid', 0);
				
		if (!empty($updateID) && $_SERVER['REQUEST_METHOD'] === 'POST' && $USER['urlaubs_modus'] == 0)
		{
			$days	  	  = HTTP::_GP('days', 0);
			if(isModuleAvailable(MODULE_OFFICIER) && in_array($updateID, $reslist['officier'])) {
				$this->UpdateOfficier($updateID, $days);
			}
		}elseif (!empty($updateUPID) && $_SERVER['REQUEST_METHOD'] === 'POST' && $USER['urlaubs_modus'] == 0)
		{
			if(isModuleAvailable(MODULE_OFFICIER) && in_array($updateUPID, $reslist['officier'])) {
				$this->UpdateOfficierLevel($updateUPID);
			}
		}
		
		$officierList	= array();
		$officierSena	= array();
		
		if(isModuleAvailable(MODULE_OFFICIER))
		{
			$officerIds = array(602,608,609,601,603,604,613,610,606,605);
			foreach($officerIds as $Element)
			{
				$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
				$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
				$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
				$elementBonus		= BuildFunctions::getAvalibleBonus($Element);
								
				$arrayElements		= $this->getArray($Element);
				$officierList[$Element]	= array(
					'maxLevel'			=> $pricelist[$Element]['max'],
					'priceAP'			=> $arrayElements['priceApArray'],
					'priceDM'			=> $arrayElements['priceDMArray'],
					'bonus'				=> $arrayElements['priceBoArray'],
				);
				
				$officierSena[$Element]	= array(
					'timeLeft'			=> max(0,$USER[$resource[$Element].'_time']-TIMESTAMP),
					'costDM'			=> $arrayElements['priceDMArray'][$USER[$resource[$Element]]],
					'costDMup'			=> $arrayElements['priceDMArray'][$USER[$resource[$Element]]+1]-$arrayElements['priceDMArray'][$USER[$resource[$Element]]],
					'buyableDM'			=> $USER['darkmatter'] >= $arrayElements['priceDMArray'][$USER[$resource[$Element]]] ? true : false,
					'costOverDM'		=> $USER['darkmatter'] >= $arrayElements['priceDMArray'][$USER[$resource[$Element]]] ? 0 : $arrayElements['priceDMArray'][$USER[$resource[$Element]]] - $USER['darkmatter'],
					'costAP'			=> $arrayElements['priceApArray'][$USER[$resource[$Element]]+1],
					'buyableAP'			=> $USER['achievements'] >= $arrayElements['priceApArray'][$USER[$resource[$Element]]+1] ? true : false,
					'costOverAP'		=> $USER['achievements'] >= $arrayElements['priceApArray'][$USER[$resource[$Element]]+1] ? 0 : $arrayElements['priceApArray'][$USER[$resource[$Element]]+1] - $USER['achievements'],
					'RowSeant'			=> array("MaxLevel" => $pricelist[$Element]['max'], "priceAP" => $arrayElements['priceApArray'], "priceDM" => $arrayElements['priceDMArray'], "bonus" => $arrayElements['priceBoArray']),
					'elementName'		=> "dm".$Element,
					'level'				=> $USER[$resource[$Element]],
				);
			}
		}
		
		$this->assign(array(
			'resour800'			=> $USER[$resource[800]],
			'resour800Usado'	=> $USER[$resource[800].'_used'],
			'officierList'		=> $officierList,
			'officierSena'		=> $officierSena,
			'of_dm_trade'		=> sprintf($LNG['of_dm_trade'], $LNG['tech'][921]),
		));
		
		$this->display('page.senat.default.tpl');
	}
	
	function getArray($officerId){
		
		global $resource, $reslist, $pricelist;
		$priceApArray = array("602" => array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20), "608" => array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20), "609" => array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20), "601" => array(0,1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10,11,11,12,12,13), "603" => array(0,1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10,11,11,12,12,13), "604" => array(0,1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10,11,11,12,12,13), "613" => array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20), "610" => array(0,5,25,50,100,150), "606" => array(0,1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10,11,11,12,12,13), "605" => array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15));
		$priceDMArray = array("602" => array(2,4,6,8,10,20,30,40,50,60,80,100,120,140,180,220,260,300,340,380,420), "608" => array(2,4,6,8,10,20,30,40,50,60,80,100,120,140,180,220,260,300,340,380,420), "609" => array(2,4,6,8,10,20,30,40,50,60,80,100,120,140,180,220,260,300,340,380,420), "601" => array(2,4,6,8,10,20,30,40,50,60,80,100,120,140,180,220,260,300,340,380,420,460,500,540,580,620), "603" => array(1,2,3,4,5,10,15,20,25,30,40,50,60,70,90,110,130,150,170,190,210,230,250,270,290,300), "604" => array(20,40,60,80,100,120,140,160,180,200,240,280,320,360,400,440,480,520,560,600,640,680,720,760,800,840), "613" => array(4,8,12,16,20,40,60,80,100,120,160,200,240,280,360,440,520,600,680,760,840), "610" => array(200,400,600,800,1000), "606" => array(2,4,6,8,10,20,30,40,50,60,80,100,120,140,180,220,260,300,340,380,420,460,500,540,580,620), "605" => array(30,60,90,120,150,200,250,300,350,400,500,600,700,800,900,1000));
		$priceBoArray = array("602" => array("Attack"=>array("bonus"=>array(0.02,0.04,0.06,0.08,0.1,0.12,0.14,0.16,0.18,0.2,0.22,0.24,0.26,0.28,0.3,0.32,0.34,0.36,0.38,0.4,0.4),"gener"=>100),"AccuracyShot"=>array("bonus"=>array(0,0,0,0,0,0.025,0.025,0.025,0.025,0.025,0.05,0.05,0.05,0.05,0.05,0.075,0.075,0.075,0.075,0.075,0.1),"gener"=>100)),"608" => array("Armor"=>array("bonus"=>array(0.02,0.04,0.06,0.08,0.1,0.12,0.14,0.16,0.18,0.2,0.22,0.24,0.26,0.28,0.3,0.32,0.34,0.36,0.38,0.4,0.4),"gener"=>100),"ArmorActive"=>array("bonus"=>array(0,0,0,0,0,0.025,0.025,0.025,0.025,0.025,0.05,0.05,0.05,0.05,0.05,0.075,0.075,0.075,0.075,0.075,0.1),"gener"=>100)), "609" => array("Shield"=>array("bonus"=>array(0.02,0.04,0.06,0.08,0.1,0.12,0.14,0.16,0.18,0.2,0.22,0.24,0.26,0.28,0.3,0.32,0.34,0.36,0.38,0.4,0.4),"gener"=>100),"ShieldReg"=>array("bonus"=>array(0,0,0,0,0,0.025,0.025,0.025,0.025,0.025,0.05,0.05,0.05,0.05,0.05,0.075,0.075,0.075,0.075,0.075,0.1),"gener"=>100)), "601" => array("Resource"=>array("bonus"=>array(0.02,0.04,0.06,0.08,0.1,0.12,0.14,0.16,0.18,0.2,0.22,0.24,0.26,0.28,0.3,0.32,0.34,0.36,0.38,0.4,0.42,0.44,0.46,0.48,0.5,0.52),"gener"=>100),"ResourceStorage"=>array("bonus"=>array(0.02,0.04,0.06,0.08,0.1,0.12,0.14,0.16,0.18,0.2,0.22,0.24,0.26,0.28,0.3,0.32,0.34,0.36,0.38,0.4,0.42,0.44,0.46,0.48,0.5,0.52),"gener"=>100)), "603" => array("Energy"=>array("bonus"=>array(0.02,0.04,0.06,0.08,0.1,0.12,0.14,0.16,0.18,0.2,0.22,0.24,0.26,0.28,0.3,0.32,0.34,0.36,0.38,0.4,0.42,0.44,0.46,0.48,0.5,0.52),"gener"=>100)), "604" => array("Resource941"=>array("bonus"=>array(0.01,0.02,0.03,0.04,0.05,0.06,0.07,0.08,0.09,0.1,0.11,0.12,0.13,0.14,0.15,0.16,0.17,0.18,0.19,0.2,0.21,0.22,0.23,0.24,0.25,0.26),"gener"=>100)), "613" => array("SpeedFleet"=>array("bonus"=>array(0.02,0.04,0.06,0.08,0.1,0.12,0.14,0.16,0.18,0.2,0.22,0.24,0.26,0.28,0.3,0.32,0.34,0.36,0.38,0.4,0.4),"gener"=>100),"MotorEconomy"=>array("bonus"=>array(0,0,0,0,0,0.025,0.025,0.025,0.025,0.025,0.05,0.05,0.05,0.05,0.05,0.075,0.075,0.075,0.075,0.075,0.1),"gener"=>100)), "610" => array("Espionage"=>array("bonus"=>array(0.01,0.02,0.03,0.04,0.05),"gener"=>100)), "606" => array("ShipStorage"=>array("bonus"=>array(0.02,0.04,0.06,0.08,0.1,0.12,0.14,0.16,0.18,0.2,0.22,0.24,0.26,0.28,0.3,0.32,0.34,0.36,0.38,0.4,0.42,0.44,0.46,0.48,0.5,0.55),"gener"=>100),"FleetSlots"=>array("bonus"=>array(0,0,0,0,0,1,1,1,1,1,2,2,2,2,2,3,3,3,3,3,4,4,4,4,4,5),"gener"=>1)), "605" => array("MoonCreat"=>array("bonus"=>array(0.01,0.02,0.03,0.04,0.05,0.06,0.07,0.08,0.09,0.1,0.11,0.12,0.13,0.14,0.15,0.16),"gener"=>100)));
		
		return array("priceApArray" => $priceApArray[$officerId], "priceDMArray" => $priceDMArray[$officerId], "priceBoArray" => $priceBoArray[$officerId]);
	}
}
