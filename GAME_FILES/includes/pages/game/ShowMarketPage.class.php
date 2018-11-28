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

class ShowMarketPage extends AbstractGamePage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}
	
	function show() 
	{
		global $USER, $LNG, $USETT, $PLANET, $resource;
		$this->display('page.market.default.tpl');
	}
	
	function getresourceslots() 
	{
		global $USER, $LNG, $USETT, $PLANET, $resource;
		
		$lotId = HTTP::_GP('id', 0);
		
		$sql	= "SELECT * FROM %%MARKETRES%% WHERE soldBy = :soldBy AND saleId = :saleId;";
		$saleData = database::get()->selectSingle($sql, array(
			':soldBy'     => $USER['id'],
			':saleId'     => $lotId
		));
		
		if(empty($saleData) || $saleData['boughtBy'] != 0 && $saleData['saleClaimed'] == 1 || $saleData['inputTime'] < TIMESTAMP - 3600 * 24 * 3 && $saleData['boughtBy'] == 0)
			$this->printMessage($LNG['market_25'], true, array('game.php?page=market&mode=yourlots', 2));
		elseif($saleData['boughtBy'] == 0)
			$this->printMessage("", true, array('game.php?page=market&mode=yourlots', 2));
		elseif($saleData['boughtBy'] != 0 && $saleData['saleClaimed'] == 0){
			//UPDATE DATABASE TO DISABLE SECOND REQUEST
			$sql	= "UPDATE %%MARKETRES%% SET saleClaimed = :saleClaim WHERE saleId = :saleId;";
			database::get()->update($sql, array(
				':saleClaim'  => TIMESTAMP,
				':saleId'     => $lotId
			));
			//UPDATE PLAYER PLANET WITH RESOURCE BOUGHT
			$PLANET[$resource[$saleData['buyType']]] += $saleData['buyAmount'];
			$sql	= "UPDATE %%PLANETS%% SET ".$resource[$saleData['buyType']]." = ".$resource[$saleData['buyType']]." + :resourcegi WHERE id = :planetId;";
			database::get()->update($sql, array(
				':resourcegi'   => $saleData['buyAmount'],
				':planetId'     => $PLANET['id']
			));

			$this->printMessage(sprintf($LNG['market_26'], pretty_number($saleData['buyAmount']), $LNG['tech'][$saleData['buyType']]), true, array('game.php?page=market&mode=yourlots', 2));	
		}
	}
	
	function delresourceslots() 
	{
		global $USER, $LNG, $USETT, $PLANET, $resource;
		
		$lotId = HTTP::_GP('id', 0);
		
		$sql	= "SELECT * FROM %%MARKETRES%% WHERE soldBy = :soldBy AND saleId = :saleId;";
		$saleData = database::get()->selectSingle($sql, array(
			':soldBy'     => $USER['id'],
			':saleId'     => $lotId
		));
		
		if(empty($saleData)){
			$this->printMessage($LNG['market_25'], true, array('game.php?page=market&mode=yourlots', 2));
		}else{
			//avoid to start second request if slow site
			$sql	= "DELETE FROM %%MARKETRES%% WHERE soldBy = :soldBy AND saleId = :saleId;";
			database::get()->delete($sql, array(
				':soldBy'     => $USER['id'],
				':saleId'     => $lotId
			));
			//update planet with 50% of resource in sale
			$PLANET[$resource[$saleData['soldType']]] += $saleData['soldAmount']/2;
			$sql	= "UPDATE %%PLANETS%% SET ".$resource[$saleData['soldType']]." = ".$resource[$saleData['soldType']]." + :resourcegi WHERE id = :planetId;";
			database::get()->update($sql, array(
				':resourcegi'   => $saleData['soldAmount']/2,
				':planetId'     => $PLANET['id']
			));
			
			$this->printMessage(sprintf($LNG['market_26'], pretty_number($saleData['soldAmount']/2), $LNG['tech'][$saleData['soldType']]), true, array('game.php?page=market&mode=yourlots', 2));
		}
		
	}
	
	function yourlots() 
	{
		global $USER, $LNG, $USETT, $PLANET, $resource;
		
		$sql	= "SELECT * FROM %%MARKETRES%% WHERE soldBy = :soldBy AND saleClaimed = 0;";
		$saleCount = database::get()->select($sql, array(
			':soldBy'     => $USER['id']
		));
		
		$saleArray = array();
		$Count	   = 0;
		
		foreach($saleCount as $sale){
			$Count++;
			$saleArray[$sale['saleId']] = array(
				'soldType'		=> $sale['soldType'],
				'soldAmount'	=> $sale['soldAmount'],
				'buyType'		=> $sale['buyType'],
				'buyAmount'		=> $sale['buyAmount'],
				'buyRatio'		=> "1/".round($sale['buyAmount'] / $sale['soldAmount'],3),
				'inputTime'		=> _date('d. F Y, H:i:s', $sale['inputTime']),
				'showExpired'	=> $sale['inputTime'] < TIMESTAMP - 3600 * 24 * 3 && $sale['boughtBy'] == 0 ? 1 : 0,
				'showAttribute'	=> $sale['saleClaimed'] == 0 && $sale['boughtBy'] != 0 ? 1 : 0,
				'Count'			=> sprintf($LNG['market_23'], $Count, '%'),
			);
		}
		
		$this->assign(array(
			'titleSale'	=> sprintf($LNG['market_11'], count($saleCount)),
			'saleArray'	=> $saleArray,
		));
		
		$this->display('page.yourlots.default.tpl');
	}
}
