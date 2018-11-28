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
 

class ShowShipyardPage extends AbstractGamePage
{
	public static $requireModule = 0;
	
	public static $defaultController = 'show';

	function __construct() 
	{
		parent::__construct();
	}
	
	private function FinishShipyardToQueue($Frame)
	{
		global $USER, $PLANET, $pricelist, $resource;
		
		if (empty($PLANET['b_hangar_id'])) {
            return false;
        }
		
		$CancelArray	= HTTP::_GP('building', 0);
		$listid			= HTTP::_GP('listid', 0);
		$isAllRequest	= HTTP::_GP('all', 0);
		
		$CurrentQueue	= unserialize($PLANET['b_hangar_id']);
		
		if($isAllRequest == 0){
			$Element      	= $CurrentQueue[$listid-1][0];
			$Amount      	= $CurrentQueue[$listid-1][1];

			$DMprice	= round(max(1,($pricelist[$Element]['cost']['901']) * $Amount / 125000));
			$DMprice	+= round(max(1,($pricelist[$Element]['cost']['902']) * $Amount / 85000));
			$DMprice	+= round(max(1,($pricelist[$Element]['cost']['903']) * $Amount / 45000));
			
			if($USER['darkmatter'] >= $DMprice){
				$sql	= "UPDATE %%PLANETS%% SET ".$resource[$Element]." = ".$resource[$Element]." + :amount WHERE id = :planetId;";
				database::get()->update($sql, array(
					':amount'		=> $Amount, 
					':planetId'		=> $PLANET['id'] 
				));
				unset($CurrentQueue[$listid-1]);
				if(empty($CurrentQueue)) {
					$PLANET['b_hangar_id']	= '';
				} else {
					$PLANET['b_hangar_id']	= serialize(array_values($CurrentQueue));
				}
				$USER['darkmatter']		-= $DMprice;
				$sql	= "UPDATE %%USERS%% SET darkmatter = darkmatter - :darkmatter WHERE id = :userId;";
				database::get()->update($sql, array(
					':darkmatter'	=> $DMprice, 
					':userId'		=> $USER['id'] 
				));
			}
		}elseif($isAllRequest == 1){
			$DMprice  = 0;
			$sqlQuery = "";
			foreach($CurrentQueue as $ElementArray)
			{
				$DMprice	+= round(max(1,($pricelist[$ElementArray[0]]['cost']['901']) * $ElementArray[1] / 125000));
				$DMprice	+= round(max(1,($pricelist[$ElementArray[0]]['cost']['902']) * $ElementArray[1] / 85000));
				$DMprice	+= round(max(1,($pricelist[$ElementArray[0]]['cost']['903']) * $ElementArray[1] / 45000));
				$DMprice	+= round(max(1,($pricelist[$ElementArray[0]]['cost']['921']) * $ElementArray[1]));
				$sqlQuery	.= ", ".$resource[$ElementArray[0]]." = ".$resource[$ElementArray[0]]." + ".$ElementArray[1];
			}
			
			if($USER['darkmatter'] >= $DMprice){
				$PLANET['b_hangar_id']	= '';
				$USER['darkmatter']		-= $DMprice;
				$sql	= "UPDATE %%PLANETS%% SET image = :image".$sqlQuery." WHERE id = :planetId;";
				database::get()->update($sql, array(
					':image'		=> $PLANET['image'], 
					':planetId'		=> $PLANET['id'], 
				));
				$sql	= "UPDATE %%USERS%% SET darkmatter = darkmatter - :darkmatter WHERE id = :userId;";
				database::get()->update($sql, array(
					':darkmatter'	=> $DMprice, 
					':userId'		=> $USER['id'] 
				));
			}
		}
		
		if($Frame == 1){
			$this->redirectTo('game.php?frame=1');
		}
	}
	
	private function CancelAuftr() 
	{
		global $USER, $PLANET, $resource;
		$ElementQueue = unserialize($PLANET['b_hangar_id']);
		
		$CancelArray	= HTTP::_GP('building', 0);
		$listid			= HTTP::_GP('listid', 0);
		
		
		if(!isset($ElementQueue[$CancelArray])) {
			return false;
		}
			
		if($CancelArray == 0) {
			$PLANET['b_hangar']	= 0;
		}
			
		$Element		= $CancelArray;
		$Count			= $ElementQueue[$CancelArray][1];
			
		$costResources	= BuildFunctions::getElementPrice($USER, $PLANET, $Element, false, $Count);
		
		if(isset($costResources[901])) { $PLANET[$resource[901]]	+= $costResources[901] * FACTOR_CANCEL_SHIPYARD; }
		if(isset($costResources[902])) { $PLANET[$resource[902]]	+= $costResources[902] * FACTOR_CANCEL_SHIPYARD; }
		if(isset($costResources[903])) { $PLANET[$resource[903]]	+= $costResources[903] * FACTOR_CANCEL_SHIPYARD; }
		if(isset($costResources[921])) { $USER[$resource[921]]		+= $costResources[921] * FACTOR_CANCEL_SHIPYARD; }
			
		unset($ElementQueue[$CancelArray]);
		
		
		if(empty($ElementQueue)) {
			$PLANET['b_hangar_id']	= '';
		} else {
			$PLANET['b_hangar_id']	= serialize(array_values($ElementQueue));
		}

		return true;
	}
	
	private function BuildAuftr($fmenge)
	{
		global $USER, $PLANET, $reslist, $resource;
		
		$Missiles	= array(
			502	=> $PLANET[$resource[502]],
			503	=> $PLANET[$resource[503]],
		);

		foreach($fmenge as $Element => $Count)
		{
			if(empty($Count)
				|| !in_array($Element, array_merge($reslist['fleet'], $reslist['defense'], $reslist['missile']))
				|| !BuildFunctions::isTechnologieAccessible($USER, $PLANET, $Element)
			) {
				continue;
			}
			
			$MaxElements 	= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element);
			$Count			= is_numeric($Count) ? round($Count) : 0;
			$Count 			= max(min($Count, Config::get()->max_fleet_per_build), 0);
			$Count 			= min($Count, $MaxElements);
			
			$BuildArray    	= !empty($PLANET['b_hangar_id']) ? unserialize($PLANET['b_hangar_id']) : array();
			if (in_array($Element, $reslist['missile']))
			{
				$MaxMissiles		= BuildFunctions::getMaxConstructibleRockets($USER, $PLANET, $Missiles);
				$Count 				= min($Count, $MaxMissiles[$Element]);

				$Missiles[$Element] += $Count;
			} elseif(in_array($Element, $reslist['one'])) {
				$InBuild	= false;
				foreach($BuildArray as $ElementArray) {
					if($ElementArray[0] == $Element) {
						$InBuild	= true;
						break;
					}
				}
				
				if ($InBuild)
					continue;

				if($Count != 0 && $PLANET[$resource[$Element]] == 0 && $InBuild === false)
					$Count =  1;
			}

			if(empty($Count))
				continue;
				
			$costResources	= BuildFunctions::getElementPrice($USER, $PLANET, $Element, false, $Count);
		
			if(isset($costResources[901])) { $PLANET[$resource[901]]	-= $costResources[901]; }
			if(isset($costResources[902])) { $PLANET[$resource[902]]	-= $costResources[902]; }
			if(isset($costResources[903])) { $PLANET[$resource[903]]	-= $costResources[903]; }
			if(isset($costResources[921])) { $USER[$resource[921]]		-= $costResources[921]; }
			
			$BuildArray[]			= array($Element, $Count);
			$PLANET['b_hangar_id']	= serialize($BuildArray);
		}
	}
	
	private function getShipData()
	{
		global $LNG, $PLANET, $USER, $pricelist;
		
		$scriptData		= array();
		$quickinfo		= array();
		
		if ($PLANET['b_hangar_id'] == "")
			return array('queue' => $scriptData, 'quickinfo' => $quickinfo);
		
		$buildQueue		= unserialize($PLANET['b_hangar_id']);
		
		foreach($buildQueue as $BuildArray) {
			$ElementTime  	= BuildFunctions::getBuildingTime($USER, $PLANET, $BuildArray[0]);
			$QueueTime   	= $ElementTime * $BuildArray[1];
			//if ($QueueTime - $PLANET['b_hangar'] < TIMESTAMP)
				//continue;
			
			$quickinfo[$BuildArray[0]]	= $BuildArray[1];
			
			$DMprice	= round(max(1,($pricelist[$BuildArray[0]]['cost']['901']) * $BuildArray[1] / 125000));
			$DMprice	+= round(max(1,($pricelist[$BuildArray[0]]['cost']['902']) * $BuildArray[1] / 85000));
			$DMprice	+= round(max(1,($pricelist[$BuildArray[0]]['cost']['903']) * $BuildArray[1] / 45000));
			$DMprice	+= round(max(1,($pricelist[$BuildArray[0]]['cost']['921']) * $BuildArray[1]));
			
			$scriptData[] = array(
				'element'	=> $BuildArray[0], 
				'amount'	=> $BuildArray[1], 
				'timeque'	=> max($QueueTime - $PLANET['b_hangar'],0),
				'DMprice'	=> $DMprice,
				
			);
		}
		
		return array('queue' => $scriptData, 'quickinfo' => $quickinfo);
	}
	
	public function show()
	{
		global $USER, $PLANET, $LNG, $resource, $reslist, $requeriments, $pricelist;
		
		$buildTodo	= HTTP::_GP('fmenge', array());
		$action		= HTTP::_GP('action', '');
								
		$NotBuilding = true;
		if (!empty($PLANET['b_building_id']))
		{
			$CurrentQueue 	= unserialize($PLANET['b_building_id']);
			foreach($CurrentQueue as $ElementArray)
			{
				if($ElementArray[0] == 21 || $ElementArray[0] == 15) {
					$NotBuilding = false;
					break;
				}
			}
		}
		
		$ElementQueue 	= unserialize($PLANET['b_hangar_id']);
		if(empty($ElementQueue))
			$Count	= 0;
		else
			$Count	= count($ElementQueue);
			
		if($USER['urlaubs_modus'] == 0 && $NotBuilding == true)
		{
			if (!empty($buildTodo))
			{
				$maxBuildQueue	= BuildFunctions::getMaxElementsNaval($PLANET);
				if ($maxBuildQueue != 0 && $Count >= $maxBuildQueue)
				{
					$this->printMessage(sprintf($LNG['bd_max_builds'], $maxBuildQueue));
				}

				$this->BuildAuftr($buildTodo);
			}
					
			if ($action == "delete")
			{
				$this->CancelAuftr();
			}elseif ($action == "complete")
			{
				$Frame    = HTTP::_GP('frame', 0);
				$this->FinishShipyardToQueue($Frame);
			}
		}
		
		$elementInQueue	= array();
		$ElementQueue 	= unserialize($PLANET['b_hangar_id']);
		$buildList		= array();
		$elementList	= array();
		$elementList1F	= array();
		$elementList1D	= array();
		$elementList2F	= array();
		$elementList2D	= array();
		$elementList3F	= array();
		$elementList3D	= array();
		$elementList4F	= array();
		$elementList4D	= array();
		$elementList1P	= array();
		$elementList2P	= array();
		$fullPrice		= 0;
		$fullTimeS		= 0;
		if(!empty($ElementQueue))
		{
			$Shipyard		= array();
			$QueueTime		= 0;
			
			foreach($ElementQueue as $Element)
			{
				if (empty($Element))
					continue;
				
				$DMprice	= round(max(1,($pricelist[$Element[0]]['cost']['901']) * $Element[1] / 125000));
				$DMprice	+= round(max(1,($pricelist[$Element[0]]['cost']['902']) * $Element[1] / 85000));
				$DMprice	+= round(max(1,($pricelist[$Element[0]]['cost']['903']) * $Element[1] / 45000));
				$DMprice	+= round(max(1,($pricelist[$Element[0]]['cost']['921']) * $Element[1]));
				$fullPrice  += $DMprice;
			
				$elementInQueue[$Element[0]]	= true;
				$ElementTime  	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element[0]);
				$QueueTime   	+= $ElementTime * $Element[1];
				$fullTimeS   	+= $ElementTime * $Element[1];
				$Shipyard[]		= array($LNG['tech'][$Element[0]], $Element[1], $ElementTime, $Element[0], $DMprice, $ElementTime * $Element[1]);	// 0 = cost instant		
			}

			$buildList	= array(
				'Shipyard' 				=> $Shipyard,
				'FullCost' 				=> $fullPrice,
				'Hangar' 				=> $QueueTime - max($QueueTime - $PLANET['b_hangar'],0),
				//'Time' 					=> $QueueTime,
				'Time' 					=> max($QueueTime - $PLANET['b_hangar'],0),
			);
		}
		
		$mode		= HTTP::_GP('mode', 'fleet');
	
		$elementIDs				= array_merge($reslist['fleet'], $reslist['defense'], $reslist['missile']);
		$elementShowFirstF 		= array(210,212,202,209,208,203);
		$elementShowFirstD 		= array(402,405,403,406,414,407);
		$elementShowSecondF 	= array(204,206,205,207,213);
		$elementShowSecondD 	= array(404,410,423,413,418,416,408);
		$elementShowThirdF 		= array(225,215,211,216,232,218);
		$elementShowThirdD 		= array(430,412,419,417,434,435,409);
		$elementShowFourthF 	= array(235,214,226,233,222,221);
		$elementShowFourthD		= array();
		$elementShowFiftF 		= array(229,224,231,230);
		$elementShowFiftD	 	= array(420,421,422,443);
		//$elementShowFiftF 		= array();
		//$elementShowFiftD	 	= array();
		$Missiles	= array();
		
		foreach($reslist['missile'] as $elementID)
		{
			$Missiles[$elementID]	= $PLANET[$resource[$elementID]];
		}
		
		$MaxMissiles	= BuildFunctions::getMaxConstructibleRockets($USER, $PLANET, $Missiles);
		
		foreach($elementShowFiftD as $Element)
		{
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
			$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element, $costResources);
			$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
			$maxBuildable		= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element, $costResources);

			if(isset($MaxMissiles[$Element])) {
				$maxBuildable	= min($maxBuildable, $MaxMissiles[$Element]);
			}
			
			$AlreadyBuild		= in_array($Element, $reslist['one']) && (isset($elementInQueue[$Element]) || $PLANET[$resource[$Element]] != 0);
			
			$techTreeList		= array();
			$requirementsList	= array();
            if(isset($requeriments[$Element]))
            {
				foreach($requeriments[$Element] as $requireID => $RedCount)
				{
					$requirementsList[$requireID]	= array(
						'count' => $RedCount,
						'own'   => isset($PLANET[$resource[$requireID]]) ? $PLANET[$resource[$requireID]] : $USER[$resource[$requireID]]
					);
				}
            }

            $techTreeList[$Element]	= $requirementsList;
			
			$elementList2P[$Element]	= array(
				'id'				=> $Element,
				'available'			=> $PLANET[$resource[$Element]],
				'costResources'		=> $costResources,
				'costOverflow'		=> $costOverflow,
				'elementTime'    	=> $elementTime,
				'buyable'			=> $buyable,
				'maxBuildable'		=> floatToString($maxBuildable),
				'AlreadyBuild'		=> $AlreadyBuild,
				'AllTech'			=> $techTreeList,
				'techacc'			=> BuildFunctions::isTechnologieAccessible($USER, $PLANET, $Element),
			);
		}
		
		foreach($elementShowFiftF as $Element)
		{
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
			$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element, $costResources);
			$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
			$maxBuildable		= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element, $costResources);

			if(isset($MaxMissiles[$Element])) {
				$maxBuildable	= min($maxBuildable, $MaxMissiles[$Element]);
			}
			
			$AlreadyBuild		= in_array($Element, $reslist['one']) && (isset($elementInQueue[$Element]) || $PLANET[$resource[$Element]] != 0);
			
			$techTreeList		= array();
			$requirementsList	= array();
            if(isset($requeriments[$Element]))
            {
				foreach($requeriments[$Element] as $requireID => $RedCount)
				{
					$requirementsList[$requireID]	= array(
						'count' => $RedCount,
						'own'   => isset($PLANET[$resource[$requireID]]) ? $PLANET[$resource[$requireID]] : $USER[$resource[$requireID]]
					);
				}
            }

            $techTreeList[$Element]	= $requirementsList;
			
			$elementList1P[$Element]	= array(
				'id'				=> $Element,
				'available'			=> $PLANET[$resource[$Element]],
				'costResources'		=> $costResources,
				'costOverflow'		=> $costOverflow,
				'elementTime'    	=> $elementTime,
				'buyable'			=> $buyable,
				'maxBuildable'		=> floatToString($maxBuildable),
				'AlreadyBuild'		=> $AlreadyBuild,
				'AllTech'			=> $techTreeList,
				'techacc'			=> BuildFunctions::isTechnologieAccessible($USER, $PLANET, $Element),
			);
		}
		
		foreach($elementShowFourthF as $Element)
		{
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
			$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element, $costResources);
			$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
			$maxBuildable		= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element, $costResources);

			if(isset($MaxMissiles[$Element])) {
				$maxBuildable	= min($maxBuildable, $MaxMissiles[$Element]);
			}
			
			$AlreadyBuild		= in_array($Element, $reslist['one']) && (isset($elementInQueue[$Element]) || $PLANET[$resource[$Element]] != 0);
			
			$techTreeList		= array();
			$requirementsList	= array();
            if(isset($requeriments[$Element]))
            {
				foreach($requeriments[$Element] as $requireID => $RedCount)
				{
					$requirementsList[$requireID]	= array(
						'count' => $RedCount,
						'own'   => isset($PLANET[$resource[$requireID]]) ? $PLANET[$resource[$requireID]] : $USER[$resource[$requireID]]
					);
				}
            }

            $techTreeList[$Element]	= $requirementsList;
			
			$elementList4F[$Element]	= array(
				'id'				=> $Element,
				'available'			=> $PLANET[$resource[$Element]],
				'costResources'		=> $costResources,
				'costOverflow'		=> $costOverflow,
				'elementTime'    	=> $elementTime,
				'buyable'			=> $buyable,
				'maxBuildable'		=> floatToString($maxBuildable),
				'AlreadyBuild'		=> $AlreadyBuild,
				'AllTech'			=> $techTreeList,
				'techacc'			=> BuildFunctions::isTechnologieAccessible($USER, $PLANET, $Element),
			);
		}
		
		foreach($elementShowFourthD as $Element)
		{
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
			$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element, $costResources);
			$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
			$maxBuildable		= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element, $costResources);

			if(isset($MaxMissiles[$Element])) {
				$maxBuildable	= min($maxBuildable, $MaxMissiles[$Element]);
			}
			
			$AlreadyBuild		= in_array($Element, $reslist['one']) && (isset($elementInQueue[$Element]) || $PLANET[$resource[$Element]] != 0);
			
			$techTreeList		= array();
			$requirementsList	= array();
            if(isset($requeriments[$Element]))
            {
				foreach($requeriments[$Element] as $requireID => $RedCount)
				{
					$requirementsList[$requireID]	= array(
						'count' => $RedCount,
						'own'   => isset($PLANET[$resource[$requireID]]) ? $PLANET[$resource[$requireID]] : $USER[$resource[$requireID]]
					);
				}
            }

            $techTreeList[$Element]	= $requirementsList;
			
			$elementList4D[$Element]	= array(
				'id'				=> $Element,
				'available'			=> $PLANET[$resource[$Element]],
				'costResources'		=> $costResources,
				'costOverflow'		=> $costOverflow,
				'elementTime'    	=> $elementTime,
				'buyable'			=> $buyable,
				'maxBuildable'		=> floatToString($maxBuildable),
				'AlreadyBuild'		=> $AlreadyBuild,
				'AllTech'			=> $techTreeList,
				'techacc'			=> BuildFunctions::isTechnologieAccessible($USER, $PLANET, $Element),
			);
		}
		
		foreach($elementShowThirdF as $Element)
		{
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
			$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element, $costResources);
			$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
			$maxBuildable		= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element, $costResources);

			if(isset($MaxMissiles[$Element])) {
				$maxBuildable	= min($maxBuildable, $MaxMissiles[$Element]);
			}
			
			$AlreadyBuild		= in_array($Element, $reslist['one']) && (isset($elementInQueue[$Element]) || $PLANET[$resource[$Element]] != 0);
			
			$techTreeList		= array();
			$requirementsList	= array();
            if(isset($requeriments[$Element]))
            {
				foreach($requeriments[$Element] as $requireID => $RedCount)
				{
					$requirementsList[$requireID]	= array(
						'count' => $RedCount,
						'own'   => isset($PLANET[$resource[$requireID]]) ? $PLANET[$resource[$requireID]] : $USER[$resource[$requireID]]
					);
				}
            }

            $techTreeList[$Element]	= $requirementsList;
			
			$elementList3F[$Element]	= array(
				'id'				=> $Element,
				'available'			=> $PLANET[$resource[$Element]],
				'costResources'		=> $costResources,
				'costOverflow'		=> $costOverflow,
				'elementTime'    	=> $elementTime,
				'buyable'			=> $buyable,
				'maxBuildable'		=> floatToString($maxBuildable),
				'AlreadyBuild'		=> $AlreadyBuild,
				'AllTech'			=> $techTreeList,
				'techacc'			=> BuildFunctions::isTechnologieAccessible($USER, $PLANET, $Element),
			);
		}
		
		foreach($elementShowThirdD as $Element)
		{
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
			$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element, $costResources);
			$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
			$maxBuildable		= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element, $costResources);

			if(isset($MaxMissiles[$Element])) {
				$maxBuildable	= min($maxBuildable, $MaxMissiles[$Element]);
			}
			
			$AlreadyBuild		= in_array($Element, $reslist['one']) && (isset($elementInQueue[$Element]) || $PLANET[$resource[$Element]] != 0);
			
			$techTreeList		= array();
			$requirementsList	= array();
            if(isset($requeriments[$Element]))
            {
				foreach($requeriments[$Element] as $requireID => $RedCount)
				{
					$requirementsList[$requireID]	= array(
						'count' => $RedCount,
						'own'   => isset($PLANET[$resource[$requireID]]) ? $PLANET[$resource[$requireID]] : $USER[$resource[$requireID]]
					);
				}
            }

            $techTreeList[$Element]	= $requirementsList;
			
			$elementList3D[$Element]	= array(
				'id'				=> $Element,
				'available'			=> $PLANET[$resource[$Element]],
				'costResources'		=> $costResources,
				'costOverflow'		=> $costOverflow,
				'elementTime'    	=> $elementTime,
				'buyable'			=> $buyable,
				'maxBuildable'		=> floatToString($maxBuildable),
				'AlreadyBuild'		=> $AlreadyBuild,
				'AllTech'			=> $techTreeList,
				'techacc'			=> BuildFunctions::isTechnologieAccessible($USER, $PLANET, $Element),
			);
		}
		
		foreach($elementShowSecondF as $Element)
		{
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
			$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element, $costResources);
			$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
			$maxBuildable		= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element, $costResources);

			if(isset($MaxMissiles[$Element])) {
				$maxBuildable	= min($maxBuildable, $MaxMissiles[$Element]);
			}
			
			$AlreadyBuild		= in_array($Element, $reslist['one']) && (isset($elementInQueue[$Element]) || $PLANET[$resource[$Element]] != 0);
			
			$techTreeList		= array();
			$requirementsList	= array();
            if(isset($requeriments[$Element]))
            {
				foreach($requeriments[$Element] as $requireID => $RedCount)
				{
					$requirementsList[$requireID]	= array(
						'count' => $RedCount,
						'own'   => isset($PLANET[$resource[$requireID]]) ? $PLANET[$resource[$requireID]] : $USER[$resource[$requireID]]
					);
				}
            }

            $techTreeList[$Element]	= $requirementsList;
			
			$elementList2F[$Element]	= array(
				'id'				=> $Element,
				'available'			=> $PLANET[$resource[$Element]],
				'costResources'		=> $costResources,
				'costOverflow'		=> $costOverflow,
				'elementTime'    	=> $elementTime,
				'buyable'			=> $buyable,
				'maxBuildable'		=> floatToString($maxBuildable),
				'AlreadyBuild'		=> $AlreadyBuild,
				'AllTech'			=> $techTreeList,
				'techacc'			=> BuildFunctions::isTechnologieAccessible($USER, $PLANET, $Element),
			);
		}
		
		foreach($elementShowSecondD as $Element)
		{
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
			$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element, $costResources);
			$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
			$maxBuildable		= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element, $costResources);

			if(isset($MaxMissiles[$Element])) {
				$maxBuildable	= min($maxBuildable, $MaxMissiles[$Element]);
			}
			
			$AlreadyBuild		= in_array($Element, $reslist['one']) && (isset($elementInQueue[$Element]) || $PLANET[$resource[$Element]] != 0);
			
			$techTreeList		= array();
			$requirementsList	= array();
            if(isset($requeriments[$Element]))
            {
				foreach($requeriments[$Element] as $requireID => $RedCount)
				{
					$requirementsList[$requireID]	= array(
						'count' => $RedCount,
						'own'   => isset($PLANET[$resource[$requireID]]) ? $PLANET[$resource[$requireID]] : $USER[$resource[$requireID]]
					);
				}
            }

            $techTreeList[$Element]	= $requirementsList;
			
			$elementList2D[$Element]	= array(
				'id'				=> $Element,
				'available'			=> $PLANET[$resource[$Element]],
				'costResources'		=> $costResources,
				'costOverflow'		=> $costOverflow,
				'elementTime'    	=> $elementTime,
				'buyable'			=> $buyable,
				'maxBuildable'		=> floatToString($maxBuildable),
				'AlreadyBuild'		=> $AlreadyBuild,
				'AllTech'			=> $techTreeList,
				'techacc'			=> BuildFunctions::isTechnologieAccessible($USER, $PLANET, $Element),
			);
		}
		
		foreach($elementShowFirstF as $Element)
		{
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
			$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element, $costResources);
			$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
			$maxBuildable		= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element, $costResources);

			if(isset($MaxMissiles[$Element])) {
				$maxBuildable	= min($maxBuildable, $MaxMissiles[$Element]);
			}
			
			$AlreadyBuild		= in_array($Element, $reslist['one']) && (isset($elementInQueue[$Element]) || $PLANET[$resource[$Element]] != 0);
			
			$techTreeList		= array();
			$requirementsList	= array();
            if(isset($requeriments[$Element]))
            {
				foreach($requeriments[$Element] as $requireID => $RedCount)
				{
					$requirementsList[$requireID]	= array(
						'count' => $RedCount,
						'own'   => isset($PLANET[$resource[$requireID]]) ? $PLANET[$resource[$requireID]] : $USER[$resource[$requireID]]
					);
				}
            }

            $techTreeList[$Element]	= $requirementsList;
			
			$elementList1F[$Element]	= array(
				'id'				=> $Element,
				'available'			=> $PLANET[$resource[$Element]],
				'costResources'		=> $costResources,
				'costOverflow'		=> $costOverflow,
				'elementTime'    	=> $elementTime,
				'buyable'			=> $buyable,
				'maxBuildable'		=> floatToString($maxBuildable),
				'AlreadyBuild'		=> $AlreadyBuild,
				'AllTech'			=> $techTreeList,
				'techacc'			=> BuildFunctions::isTechnologieAccessible($USER, $PLANET, $Element),
			);
		}
		
		foreach($elementShowFirstD as $Element)
		{
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
			$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element, $costResources);
			$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
			$maxBuildable		= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element, $costResources);

			if(isset($MaxMissiles[$Element])) {
				$maxBuildable	= min($maxBuildable, $MaxMissiles[$Element]);
			}
			
			$AlreadyBuild		= in_array($Element, $reslist['one']) && (isset($elementInQueue[$Element]) || $PLANET[$resource[$Element]] != 0);
			
			$techTreeList		= array();
			$requirementsList	= array();
            if(isset($requeriments[$Element]))
            {
				foreach($requeriments[$Element] as $requireID => $RedCount)
				{
					$requirementsList[$requireID]	= array(
						'count' => $RedCount,
						'own'   => isset($PLANET[$resource[$requireID]]) ? $PLANET[$resource[$requireID]] : $USER[$resource[$requireID]]
					);
				}
            }

            $techTreeList[$Element]	= $requirementsList;
			
			$elementList1D[$Element]	= array(
				'id'				=> $Element,
				'available'			=> $PLANET[$resource[$Element]],
				'costResources'		=> $costResources,
				'costOverflow'		=> $costOverflow,
				'elementTime'    	=> $elementTime,
				'buyable'			=> $buyable,
				'maxBuildable'		=> floatToString($maxBuildable),
				'AlreadyBuild'		=> $AlreadyBuild,
				'AllTech'			=> $techTreeList,
				'techacc'			=> BuildFunctions::isTechnologieAccessible($USER, $PLANET, $Element),
			);
		}
		
		foreach($elementIDs as $Element)
		{
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $Element);
			$costOverflow		= BuildFunctions::getRestPrice($USER, $PLANET, $Element, $costResources);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element, $costResources);
			$buyable			= BuildFunctions::isElementBuyable($USER, $PLANET, $Element, $costResources);
			$maxBuildable		= BuildFunctions::getMaxConstructibleElements($USER, $PLANET, $Element, $costResources);

			if(isset($MaxMissiles[$Element])) {
				$maxBuildable	= min($maxBuildable, $MaxMissiles[$Element]);
			}
			
			$AlreadyBuild		= in_array($Element, $reslist['one']) && (isset($elementInQueue[$Element]) || $PLANET[$resource[$Element]] != 0);
			
			$elementList[$Element]	= array(
				'id'				=> $Element,
				'available'			=> $PLANET[$resource[$Element]],
				'costResources'		=> $costResources,
				'costOverflow'		=> $costOverflow,
				'elementTime'    	=> $elementTime,
				'buyable'			=> $buyable,
				'maxBuildable'		=> floatToString($maxBuildable),
				'AlreadyBuild'		=> $AlreadyBuild,
			);
		}
		
		
		$queueShipData	 			= $this->getShipData();
		$queueConstruction	 		= $queueShipData['queue'];
	
		$this->assign(array(
			'queueConstruction'	=> $queueConstruction,
			'queueConstruction1'=> count($queueConstruction),
			'elementList'		=> $elementList,
			'elementList1F'		=> $elementList1F,
			'elementList1D'		=> $elementList1D,
			'elementList2F'		=> $elementList2F,
			'elementList2D'		=> $elementList2D,
			'elementList3F'		=> $elementList3F,
			'elementList3D'		=> $elementList3D,
			'elementList4F'		=> $elementList4F,
			'elementList4D'		=> $elementList4D,
			'elementList1P'		=> $elementList1P,
			'elementList2P'		=> $elementList2P,
			'NotBuilding'		=> $NotBuilding,
			'BuildList'			=> $buildList,
			'maxlength'			=> strlen(Config::get()->max_fleet_per_build),
			'mode'				=> $mode,
			'fullPrice'			=> $fullPrice,
			'fullTimeS'			=> $fullTimeS,
			'maxBuildQueue'		=> BuildFunctions::getMaxElementsNaval($PLANET),
		));

		$this->display('page.shipyard.default.tpl');
	}
}
