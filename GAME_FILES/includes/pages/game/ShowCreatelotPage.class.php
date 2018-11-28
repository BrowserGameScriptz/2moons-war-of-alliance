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

class ShowCreatelotPage extends AbstractGamePage
{
	public static $requireModule = 0;

	function __construct() 
	{	
		parent::__construct();
	}
	
	function resources() 
	{
		$this->setWindow('popup');
		
		global $USER, $PLANET, $LNG, $USETT, $resource;
		
		$production = round((16667 * $PLANET[$resource[16]] * pow((1.50), $PLANET[$resource[16]])) * (0.1 * 1.2));
				
		$production *= Config::get()->resource_multiplier;
		$production *= STORAGE_FACTOR;
		
		$this->assign(array(
			'maxSale'		=> $production, 
		));
		
		$this->display('page.createlot.default.tpl');
	}
	
	function sendresources() 
	{
		global $USER, $LNG, $USETT, $PLANET, $resource;
		
		$ajax	= HTTP::_GP('ajax', 0);
		$gi		= HTTP::_GP('gi', 0);
		$gc		= HTTP::_GP('gc', 0);
		$ri		= HTTP::_GP('ri', 0);
		$rc		= HTTP::_GP('rc', 0);
		$result = array();
		$resarr = array(901,902,903);
		
		$production = round((16667 * $PLANET[$resource[16]] * pow((1.50), $PLANET[$resource[16]])) * (0.1 * 1.2));
				
		$production *= Config::get()->resource_multiplier;
		$production *= STORAGE_FACTOR;
		
		$sql	= "SELECT * FROM %%MARKETRES%% WHERE soldBy = :soldBy AND saleClaimed = 0;";
		$saleCount = database::get()->select($sql, array(
			':soldBy'     => $USER['id']
		));
		
		if($ajax != 1 || !in_array($gi, $resarr) || !in_array($ri, $resarr) || $gc < 1 || $rc < 1){
			$result = array("0" => false, "1" => $LNG['market_17']);
			echo json_encode($result);
		}elseif(count($saleCount) >= 5){
			$result = array("0" => false, "1" => $LNG['market_19']);
			echo json_encode($result);
		}elseif($PLANET[$resource[$gi]] < $gc){
			$result = array("0" => false, "1" => $LNG['market_6']);
			echo json_encode($result);
		}elseif($production < $gc || $production < $rc){
			$result = array("0" => false, "1" => $LNG['market_16']);
			echo json_encode($result);
		}elseif($gc/$rc > 10 || $gc/$rc < 0.1){
			$result = array("0" => false, "1" => $LNG['market_15']);
			echo json_encode($result);
		}else{
			$sql = "INSERT INTO %%MARKETRES%% SET
                soldType	= :soldType,
                soldAmount	= :soldAmount,
                buyType		= :buyType,
                buyAmount	= :buyAmount,
                soldBy		= :soldBy,
                inputTime	= :inputTime;";

			database::get()->insert($sql, array(
				':soldType'		=> $gi,
				':soldAmount'	=> $gc,
				':buyType'		=> $ri,
				':buyAmount'	=> $rc,
				':soldBy'		=> $USER['id'],
				':inputTime'	=> TIMESTAMP
			));
			
			$PLANET[$resource[$gi]] -= $gc;
			$sql	= "UPDATE %%PLANETS%% SET ".$resource[$gi]." = ".$resource[$gi]." - :resourcegi WHERE id = :planetId;";
			database::get()->update($sql, array(
				':resourcegi'   => $gc,
				':planetId'     => $PLANET['id']
			));
			
			$result = array("0" => true, "1" => $LNG['market_18']);
			echo json_encode($result);
		}
	}
	
	/* function show() 
	{
		global $USER, $PLANET, $LNG, $USETT, $resource;
		
		$production = round((16667 * $PLANET[$resource[16]] * pow((1.50), $PLANET[$resource[16]])) * (0.1 * 1.2));
				
		$production *= Config::get()->resource_multiplier;
		$production *= STORAGE_FACTOR;
		
		$this->assign(array(
			'maxSale'		=> $production, 
		));
		
		$this->display('page.createlot.default.tpl');
	} */
}
