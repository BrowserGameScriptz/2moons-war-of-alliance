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


class ShowPremiumPage extends AbstractGamePage 
{
	public static $requireModule = 0;
	
	function __construct() 
	{
		parent::__construct();
	}
	
	function buyres() 
	{
		global $USER, $USETT, $LNG, $resource, $PLANET;
		
		$item		= HTTP::_GP('item', 0);
		$count		= HTTP::_GP('count', 0);
		$allowedItem= array(901,902,903);
		
		if(!in_array($item, $allowedItem)){
			$this->printMessage($LNG['playercar_27'], true, array('game.php?page=premium', 2));
		}elseif($USER['antimatter'] < $count){
			$this->printMessage($LNG['premium_6'], true, array('game.php?page=premium', 2));
		}else{
			$sql = "SELECT resValue FROM %%PREMIUM%% WHERE orderCol = :orderCol;";
			$premiumSkill = database::get()->selectSingle($sql, array(
				':orderCol' 	=> $item,
			));
			
			$resValue = $count * $premiumSkill['resValue'];
			
			$USER['antimatter'] -= $count;
			$sql = "UPDATE %%USERS%% set antimatter = antimatter - :antimatter WHERE id = :userId;";
			database::get()->update($sql, array(
				':antimatter' 	=> $count,
				':userId' 		=> $USER['id']
			));
			
			$PLANET[$resource[$item]] += $resValue;
			$sql = "UPDATE %%PLANETS%% set ".$resource[$item]." = ".$resource[$item]." + :resvalue WHERE id = :planetId;";
			database::get()->update($sql, array(
				':resvalue' 	=> $resValue,
				':planetId' 	=> $PLANET['id']
			));
			
			$this->printMessage($LNG['premium_12'], true, array('game.php?page=premium', 2));
		}
	}
	
	function buydm() 
	{
		global $USER, $USETT, $LNG;
		
		$item		= HTTP::_GP('item', 0);
		$darkArray 	= array("1" => 10, "2" => 110, "3" => 300, "4" => 1300, "5" => 7500);
		$darkPrice 	= array("1" => 1, "2" => 10, "3" => 25, "4" => 100, "5" => 500);
		
		if(!isset($darkArray[$item]) || !isset($darkPrice[$item])){
			$this->printMessage($LNG['playercar_27'], true, array('game.php?page=premium', 2));
		}elseif($USER['antimatter'] < $darkPrice[$item]){
			$this->printMessage($LNG['premium_6'], true, array('game.php?page=premium', 2));
		}else{
			$USER['darkmatter'] += $darkArray[$item];
			$USER['antimatter'] -= $darkPrice[$item];
			$sql = "UPDATE %%USERS%% set antimatter = antimatter - :antimatter, darkmatter = darkmatter + :darkmatter WHERE id = :userId;";
			database::get()->update($sql, array(
				':antimatter' 	=> $darkPrice[$item],
				':darkmatter' 	=> $darkArray[$item],
				':userId' 		=> $USER['id']
			));
			$this->printMessage($LNG['premium_5'], true, array('game.php?page=premium', 2));
		}
	}
	
	function addprem() 
	{
		global $USER, $USETT, $LNG;
		
		$pack		= HTTP::_GP('pack', ""); // pvp - pve
		$item		= HTTP::_GP('item', 0); // 1-5
		$days		= HTTP::_GP('days', 0); // 0-3
		
		$packArray 	= array("pvp", "pve", "extra");
		$itemArray 	= array(1,2,3,4,5,6);
		$daysArray 	= array(0,1,2,3,4,5);
		
		$daysTimer	= array("0" => 1, "1" => 3, "2" => 9, "3" => 27, "4" => 7, "5" => 14);
		
		if(!in_array($pack, $packArray) || !in_array($item, $itemArray) || !in_array($days, $daysArray)){
			$this->printMessage($LNG['playercar_27'], true, array('game.php?page=premium', 2));
		}else{
			$priceArray = array("0" => "priceOne", "1" => "priceTree", "2" => "priceNine", "3" => "priceTwentySev", "4" => "priceSeven", "5" => "priceFourteen");
			
			$sql = "SELECT * FROM %%PREMIUM%% WHERE class = :class;";
			$premiumSkill = database::get()->selectSingle($sql, array(
				':class' 	=> $pack.$item,
			));
			
			$premiumOne 	= !empty($USETT['premiumOne']) ? explode(",", $USETT['premiumOne']) : "";
			$premiumTwo 	= !empty($USETT['premiumTwo']) ? explode(",", $USETT['premiumTwo']) : "";
			$premiumTree 	= !empty($USETT['premiumTree']) ? explode(",", $USETT['premiumTree']) : "";
				
			$ReducePrice = 0;
			if(!empty($premiumOne) && $premiumOne[0] != $premiumSkill['orderCol'] && $premiumSkill['type'] == 1 && $premiumOne[1] >= TIMESTAMP){
				$ReducePrice = $premiumOne[2] / $premiumOne[3] * ($premiumOne[1] - TIMESTAMP);
			}elseif(!empty($premiumTwo) && $premiumTwo[0] != $premiumSkill['orderCol'] && $premiumSkill['type'] == 2 && $premiumTwo[1] >= TIMESTAMP)
				$ReducePrice = $premiumTwo[2] / $premiumTwo[3] * ($premiumTwo[1] - TIMESTAMP);
			elseif(!empty($premiumTree) && $premiumTree[0] != $premiumSkill['orderCol'] && $premiumSkill['type'] == 4 && $premiumTree[1] >= TIMESTAMP && $item > 3)
				$ReducePrice = $premiumTree[2] / $premiumTree[3] * ($premiumTree[1] - TIMESTAMP);
			
			$Price = $premiumSkill[$priceArray[$days]];
			$Price = round(max(0,$Price - $ReducePrice/1.3));

			if($USER['antimatter'] < $Price){
				$this->printMessage($LNG['premium_6'], true, array('game.php?page=premium', 2));
			}else{
				
				$premiumOneActive 	= "";
				$premiumOneTime 	= "";
				$premiumOnePrice 	= "";
				$premiumOneTtime 	= "";
				
				$premiumTwoActive 	= "";
				$premiumTwoTime 	= "";
				$premiumTwoPrice 	= "";
				$premiumTwoTtime 	= "";
				
				$premiumTreeActive 	= "";
				$premiumTreeTime 	= "";
				$premiumTreePrice 	= "";
				$premiumTreeTtime 	= "";
				
				if(!empty($premiumOne) && $premiumSkill['type'] == 1 && $premiumOne[0] == $premiumSkill['orderCol']){
					$premiumOneActive = !empty($premiumOne) ? $premiumOne[0] : "";
					$premiumOneTime	  = !empty($premiumOne) ? $premiumOne[1] : 0;
					$premiumOnePrice  = !empty($premiumOne) ? $premiumOne[2] : 0;
					$premiumOneTtime  = !empty($premiumOne) ? $premiumOne[3] : 0;
				}elseif(!empty($premiumTwo) && $premiumSkill['type'] == 2 && $premiumTwo[0] == $premiumSkill['orderCol']){
					$premiumTwoActive = !empty($premiumTwo) ? $premiumTwo[0] : "";
					$premiumTwoTime   = !empty($premiumTwo) ? $premiumTwo[1] : 0;
					$premiumTwoPrice  = !empty($premiumTwo) ? $premiumTwo[2] : 0;
					$premiumTwoTtime  = !empty($premiumTwo) ? $premiumTwo[3] : 0;
				}elseif(!empty($premiumTree) && $premiumSkill['type'] == 4 && $premiumTree[0] == $premiumSkill['orderCol'] && $item > 3){
					$premiumTreeActive= !empty($premiumTree) ? $premiumTree[0] : "";
					$premiumTreeTime  = !empty($premiumTree) ? $premiumTree[1] : 0;
					$premiumTreePrice = !empty($premiumTree) ? $premiumTree[2] : 0;
					$premiumTreeTtime = !empty($premiumTree) ? $premiumTree[3] : 0;
				}
			
				$USER['antimatter'] -= $Price;
				$sql = "UPDATE %%USERS%% set antimatter = antimatter - :antimatter WHERE id = :userId;";
				database::get()->update($sql, array(
					':antimatter' 	=> $Price,
					':userId' 		=> $USER['id']
				));
				
				if($pack == "pvp"){
					if($premiumOneTime > TIMESTAMP && !empty($premiumOne)){
						$endTime	= $premiumOneTime + ($daysTimer[$days] * 24 * 60 * 60);
					}else{
						$endTime	= TIMESTAMP + ($daysTimer[$days] * 24 * 60 * 60);
					}
					$premiumOnePrice += $Price;
					$premiumOneTtime += ($daysTimer[$days] * 24 * 60 * 60);
					$sql = "UPDATE %%USETT%% set premiumOne = :premiumOne WHERE id = :userId;";
					database::get()->update($sql, array(
						':premiumOne' 	=> $pack == "pvp" && $item != 0 ? $item.",".$endTime.",".$premiumOnePrice.",".$premiumOneTtime : "",
						':userId' 		=> $USER['id']
					));
				}elseif($pack == "pve"){
					if($premiumTwoTime > TIMESTAMP && !empty($premiumTwo)){
						$endTime	= $premiumTwoTime + ($daysTimer[$days] * 24 * 60 * 60);
					}else{
						$endTime	= TIMESTAMP + ($daysTimer[$days] * 24 * 60 * 60);
					}
					$premiumTwoPrice += $Price;
					$premiumTwoTtime += ($daysTimer[$days] * 24 * 60 * 60);
					$sql = "UPDATE %%USETT%% set premiumTwo = :premiumTwo WHERE id = :userId;";
					database::get()->update($sql, array(
						':premiumTwo' 	=> $pack == "pve" && $item != 0 ? $item.",".$endTime.",".$premiumTwoPrice.",".$premiumTwoTtime : "",
						':userId' 		=> $USER['id']
					));
				}elseif($pack == "extra"){
					if($premiumTreeTime > TIMESTAMP && !empty($premiumTree)){
						$endTime	= $premiumTreeTime + ($daysTimer[$days] * 24 * 60 * 60);
					}else{
						$endTime	= TIMESTAMP + ($daysTimer[$days] * 24 * 60 * 60);
					}
					$premiumTreePrice += $Price;
					$premiumTreeTtime += ($daysTimer[$days] * 24 * 60 * 60);
					$sql = "UPDATE %%USETT%% set premiumTree = :premiumTree WHERE id = :userId;";
					database::get()->update($sql, array(
						':premiumTree' 	=> $pack == "extra" && $item != 0 ? $item.",".$endTime.",".$premiumTreePrice.",".$premiumTreeTtime : "",
						':userId' 		=> $USER['id']
					));
				}
				$this->printMessage($LNG['premium_7'], true, array('game.php?page=premium', 2));
			}
		}		
	}
	
	function show() 
	{
		global $USER, $USETT, $LNG;
		$Bonuses = array();
		
		$sql = "SELECT * FROM %%PREMIUM%%;";
		$premiumSkills = database::get()->select($sql, array());
		
		$premiumOne = !empty($USETT['premiumOne']) ? explode(",", $USETT['premiumOne']) : "";
		$premiumTwo = !empty($USETT['premiumTwo']) ? explode(",", $USETT['premiumTwo']) : "";
		$premiumTree= !empty($USETT['premiumTree']) ? explode(",", $USETT['premiumTree']) : "";
		$premiumOnePrice  = !empty($premiumOne) ? $premiumOne[2] : 0;
		$premiumOneTtime  = !empty($premiumOne) ? $premiumOne[3] : 0;
		$premiumTwoPrice  = !empty($premiumTwo) ? $premiumTwo[2] : 0;
		$premiumTwoTtime  = !empty($premiumTwo) ? $premiumTwo[3] : 0;
		$premiumTreePrice = !empty($premiumTree) ? $premiumTree[2] : 0;
		$premiumTreeTtime = !empty($premiumTree) ? $premiumTree[3] : 0;
		
		foreach($premiumSkills as $Bonus){
			$premiumOneActive 	= "";
			$premiumOneTime 	= "";
			$premiumTwoActive 	= "";
			$premiumTwoTime 	= "";
			$premiumTreeActive 	= "";
			$premiumTreeTime 	= "";
				
			if(!empty($premiumOne) && $Bonus['type'] == 1 && $premiumOne[0] == $Bonus['orderCol']){
				$premiumOneActive = !empty($premiumOne) ? $premiumOne[0] : "";
				$premiumOneTime	  = !empty($premiumOne) ? $premiumOne[1] : "";
			}elseif(!empty($premiumTwo) && $Bonus['type'] == 2 && $premiumTwo[0] == $Bonus['orderCol']){
				$premiumTwoActive = !empty($premiumTwo) ? $premiumTwo[0] : "";
				$premiumTwoTime   = !empty($premiumTwo) ? $premiumTwo[1] : "";
			}elseif(!empty($premiumTree) && $Bonus['type'] == 4 && $premiumTree[0] == $Bonus['orderCol'] && $Bonus['orderCol'] > 3){
				$premiumTreeActive= !empty($premiumTree) ? $premiumTree[0] : "";
				$premiumTreeTime  = !empty($premiumTree) ? $premiumTree[1] : "";
			}
			
			$ReducePrice = 0;
			if(!empty($premiumOne) && $premiumOne[0] != $Bonus['orderCol'] && $Bonus['type'] == 1 && $premiumOne[1] >= TIMESTAMP){
				$ReducePrice = $premiumOne[2] / $premiumOne[3] * ($premiumOne[1] - TIMESTAMP);
			}elseif(!empty($premiumTwo) && $premiumTwo[0] != $Bonus['orderCol'] && $Bonus['type'] == 2 && $premiumTwo[1] >= TIMESTAMP)
				$ReducePrice = $premiumTwo[2] / $premiumTwo[3] * ($premiumTwo[1] - TIMESTAMP);
			elseif(!empty($premiumTree) && $premiumTree[0] != $Bonus['orderCol'] && $Bonus['type'] == 4 && $premiumTree[1] >= TIMESTAMP && $Bonus['orderCol'] > 3)
				$ReducePrice = $premiumTree[2] / $premiumTree[3] * ($premiumTree[1] - TIMESTAMP);
				
			$Bonuses[$Bonus['premiumId']] = array(
				'priceOne'		=> round(max(0,$Bonus['priceOne'] - $ReducePrice/1.3)),
				'priceTree'		=> round(max(0,$Bonus['priceTree'] - $ReducePrice/1.3)),
				'priceSeven'	=> round(max(0,$Bonus['priceSeven'] - $ReducePrice/1.3)),
				'priceNine'		=> pretty_number(round(max(0,$Bonus['priceNine'] - $ReducePrice/1.3))),
				'priceFourteen'	=> pretty_number(round(max(0,$Bonus['priceFourteen'] - $ReducePrice/1.3))),
				'priceTwentySev'=> pretty_number(round(max(0,$Bonus['priceTwentySev'] - $ReducePrice/1.3))),
				'name'			=> $LNG['premName'][$Bonus['premiumId']],
				'type'			=> $Bonus['type'],
				'orderCol'		=> $Bonus['orderCol'],
				'resValue'		=> $Bonus['resValue'],
				'bonuses'		=> $LNG['premExp'][$Bonus['premiumId']],
				'premiumActId1'	=> $premiumOneTime - TIMESTAMP > 0 ? $premiumOneActive : -1,
				'premiumActTim1'=> $premiumOneTime - TIMESTAMP,
				'premiumActId2'	=> $premiumTwoTime - TIMESTAMP > 0 ? $premiumTwoActive : -1,
				'premiumActTim2'=> $premiumTwoTime - TIMESTAMP,
				'premiumActId3'	=> $premiumTreeTime - TIMESTAMP > 0 ? $premiumTreeActive : -1,
				'premiumActTim3'=> $premiumTreeTime - TIMESTAMP,
			);
		}
		
		$this->assign(array(
			'Bonuses'		=> $Bonuses,
			'gametoorTime'	=> TIMESTAMP - 12 * 3600 <= $USETT['gametoorTime'] ? $USETT['gametoorTime'] + 12 * 3600 - TIMESTAMP : 0,
		));
		
		$this->display('page.premium.default.tpl');
	} 
}
