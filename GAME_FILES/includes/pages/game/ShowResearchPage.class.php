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

//require_once('AbstractGamePage.class.php');

class ShowResearchPage extends AbstractGamePage
{
	public static $requireModule = MODULE_RESEARCH;

	function __construct() 
	{
		parent::__construct();
	}
	
	private function FinishResearchToQueue($Frame)
	{
		global $USER, $PLANET, $pricelist, $resource;
		
		$CurrentQueue	= unserialize($USER['b_tech_queue']);
		
		if (empty($CurrentQueue) || empty($USER['b_tech']))
		{
			$USER['b_tech_queue']	= '';
			$USER['b_tech_planet']	= 0;
			$USER['b_tech_id']		= 0;
			$USER['b_tech']			= 0;

			return false;
		}
		
		$CancelArray	= $USER['b_tech_id'];
		
		$Element      	= $CurrentQueue[0][0];
		$Level      	= $CurrentQueue[0][1];
		$BuildEndTime 	= $CurrentQueue[0][3];
		
		$DMprice	= round(max(1,($pricelist[$Element]['cost']['941']) * pow($pricelist[$Element]['factor'], $Level)));
		
		if($USER['darkmatter'] >= $DMprice){
			$sql	= "UPDATE %%USERS%% SET ".$resource[$Element]." = ".$resource[$Element]." + 1 WHERE id = :userId;";
			database::get()->update($sql, array(
				':userId'		=> $USER['id'] 
			));
			unset($CurrentQueue[0]);
			if(empty($CurrentQueue)) {
				$USER['b_tech_queue']	= '';
				$USER['b_tech_planet']	= 0;
				$USER['b_tech_id']		= 0;
				$USER['b_tech']			= 0;
			} else {
				$USER['b_tech']    			= TIMESTAMP;
				$USER['b_tech_queue'] 		= serialize($CurrentQueue);
			}
			$USER['darkmatter']		-= $DMprice;
			$sql	= "UPDATE %%USERS%% SET darkmatter = darkmatter - :darkmatter WHERE id = :userId;";
			database::get()->update($sql, array(
				':darkmatter'	=> $DMprice, 
				':userId'		=> $USER['id'] 
			));
		}
		
		if($Frame == 1){
			$this->redirectTo('game.php?frame=1');
		}
	}
	
	private function CheckLabSettingsInQueue()
	{
		global $PLANET;
		if ($PLANET['b_building'] == 0)
			return true;
			
		$CurrentQueue		= unserialize($PLANET['b_building_id']);
		foreach($CurrentQueue as $ListIDArray) {
			if($ListIDArray[0] == 6 || $ListIDArray[0] == 31)
				return false;
		}

		return true;
	}
	
	private function CancelBuildingFromQueue()
	{
		global $PLANET, $USER, $resource;
		$CurrentQueue  = unserialize($USER['b_tech_queue']);
		if (empty($CurrentQueue) || empty($USER['b_tech']))
		{
			$USER['b_tech_queue']	= '';
			$USER['b_tech_planet']	= 0;
			$USER['b_tech_id']		= 0;
			$USER['b_tech']			= 0;

			return false;
		}

		$db = Database::get();

		$elementId		= $USER['b_tech_id'];
		
		$USER['b_tech_id']			= 0;
		$USER['b_tech']      		= 0;
		$USER['b_tech_planet']		= 0;

		array_shift($CurrentQueue);

		if (count($CurrentQueue) == 0) {
			$USER['b_tech_queue']	= '';
			$USER['b_tech_planet']	= 0;
			$USER['b_tech_id']		= 0;
			$USER['b_tech']			= 0;
		} else {
			$BuildEndTime		= TIMESTAMP;
			$NewCurrentQueue	= array();
			foreach($CurrentQueue as $ListIDArray)
			{
				if($elementId == $ListIDArray[0] || empty($ListIDArray[0]))
					continue;
					
				if($ListIDArray[4] != $PLANET['id']) {
					$sql = "SELECT :resource6, :resource31, id FROM %%PLANETS%% WHERE id = :id;";
					$CPLANET = $db->selectSingle($sql, array(
						':resource6'	=> $resource[6],
						':resource31'	=> $resource[31],
						':id'			=> $ListIDArray[4]
					));
				} else
					$CPLANET		= $PLANET;
				
				$CPLANET[$resource[31].'_inter']	= $this->ecoObj->getNetworkLevel($USER, $CPLANET);
				$BuildEndTime       				+= BuildFunctions::getBuildingTime($USER, $CPLANET, NULL, $ListIDArray[0]);
				$ListIDArray[3]						= $BuildEndTime;
				$NewCurrentQueue[]					= $ListIDArray;				
			}
			
			if(!empty($NewCurrentQueue)) {
				$USER['b_tech']    			= TIMESTAMP;
				$USER['b_tech_queue'] 		= serialize($NewCurrentQueue);
				$this->ecoObj->setData($USER, $PLANET);
				$this->ecoObj->SetNextQueueTechOnTop();
				list($USER, $PLANET)		= $this->ecoObj->getData();
			} else {
				$USER['b_tech']    			= 0;
				$USER['b_tech_queue'] 		= '';
			}
		}

		return true;
	}

	private function RemoveBuildingFromQueue($QueueID)
	{
		global $USER, $PLANET, $resource;
		
		$CurrentQueue  = unserialize($USER['b_tech_queue']);
		if ($QueueID <= 1 || empty($CurrentQueue))
		{
			return false;
		}

		$ActualCount   = count($CurrentQueue);
		if ($ActualCount <= 1)
		{
			return $this->CancelBuildingFromQueue();
		}

		if(!isset($CurrentQueue[$QueueID - 2]))
		{
			return false;
		}
			
		$elementId 		= $CurrentQueue[$QueueID - 2][0];
		$BuildEndTime	= $CurrentQueue[$QueueID - 2][3];
		unset($CurrentQueue[$QueueID - 1]);
		$NewCurrentQueue	= array();
		foreach($CurrentQueue as $ID => $ListIDArray)
		{				
			if ($ID < $QueueID - 1) {
				$NewCurrentQueue[]	= $ListIDArray;
			} else {
				if($elementId == $ListIDArray[0])
					continue;

				if($ListIDArray[4] != $PLANET['id']) {
					$db = Database::get();

					$sql = "SELECT :resource6, :resource31 FROM %%PLANETS%% WHERE id = :id;";
					$CPLANET = $db->selectSingle($sql, array(
						':resource6'	=> $resource[6],
						':resource31'	=> $resource[31],
						':id'			=> $ListIDArray[4]
					));
				} else
					$CPLANET				= $PLANET;
				
				$CPLANET[$resource[31].'_inter']	= $this->ecoObj->getNetworkLevel($USER, $CPLANET);
				
				$BuildEndTime       += BuildFunctions::getBuildingTime($USER, $CPLANET, NULL, $ListIDArray[0]);
				$ListIDArray[3]		= $BuildEndTime;
				$NewCurrentQueue[]	= $ListIDArray;				
			}
		}
		
		if(!empty($NewCurrentQueue))
			$USER['b_tech_queue'] = serialize($NewCurrentQueue);
		else
			$USER['b_tech_queue'] = "";

		return true;
	}

	private function AddBuildingToQueue($elementId, $AddMode = true)
	{
		global $PLANET, $USER, $resource, $reslist, $pricelist;

		if(!in_array($elementId, $reslist['tech'])
			|| !BuildFunctions::isTechnologieAccessible($USER, $PLANET, $elementId)
			|| !$this->CheckLabSettingsInQueue($PLANET)
		)
		{
			return false;
		}

		$CurrentQueue  		= unserialize($USER['b_tech_queue']);
		
		if (!empty($CurrentQueue)) {
			$ActualCount   	= count($CurrentQueue);
		} else {
			$CurrentQueue  	= array();
			$ActualCount   	= 0;
		}

		$getMaxElementsResearch  	= BuildFunctions::getMaxElementsResearch($PLANET);
				
		if($getMaxElementsResearch != 0 && $getMaxElementsResearch <= $ActualCount)
		{
			return false;
		}

		$BuildLevel					= $USER[$resource[$elementId]];
		if($ActualCount == 0)
		{
			if($pricelist[$elementId]['max'] < $BuildLevel)
			{
				return false;
			}

			$costResources				= BuildFunctions::getElementPrice($USER, $PLANET, $elementId, !$AddMode, $BuildLevel);
			$elementTime    			= BuildFunctions::getBuildingTime($USER, $PLANET, $elementId, $costResources);
			$BuildEndTime				= TIMESTAMP + $elementTime;
			
			$USER['b_tech_queue']		= serialize(array(array($elementId, $BuildLevel, $elementTime, $BuildEndTime, $PLANET['id'])));
			$USER['b_tech']				= $BuildEndTime;
			$USER['b_tech_id']			= $elementId;
			$USER['b_tech_planet']		= $PLANET['id'];
		} else {
			$addLevel = 0;
			foreach($CurrentQueue as $QueueSubArray)
			{
				if($QueueSubArray[0] != $elementId)
					continue;
					
				$addLevel++;
			}
				
			$BuildLevel					+= $addLevel;
				
			if($pricelist[$elementId]['max'] < $BuildLevel)
			{
				return false;
			}
				
			$elementTime    			= BuildFunctions::getBuildingTime($USER, $PLANET, $elementId, NULL, !$AddMode, $BuildLevel);
			
			$BuildEndTime				= $CurrentQueue[$ActualCount - 1][3] + $elementTime;
			$CurrentQueue[]				= array($elementId, $BuildLevel, $elementTime, $BuildEndTime, $PLANET['id']);
			$USER['b_tech_queue']		= serialize($CurrentQueue);
		}
		return true;
	}

	private function getQueueData()
	{
		global $LNG, $PLANET, $USER, $pricelist;

		$scriptData		= array();
		$quickinfo		= array();
		
		if ($USER['b_tech'] == 0)
		return array('queue' => $scriptData, 'quickinfo' => $quickinfo);
		
		$CurrentQueue   = unserialize($USER['b_tech_queue']);
		
		foreach($CurrentQueue as $BuildArray) {
			if ($BuildArray[3] < TIMESTAMP)
				continue;
			
			$PlanetName	= '';
		
			$quickinfo[$BuildArray[0]]	= $BuildArray[1];
			
			if($BuildArray[4] != $PLANET['id'])
				$PlanetName		= $USER['PLANETS'][$BuildArray[4]]['name'];
			
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $BuildArray[0], false, $BuildArray[1]);
			
			$DMprice	= round(max(1,($pricelist[$BuildArray[0]]['cost']['941']) * pow($pricelist[$BuildArray[0]]['factor'], $BuildArray[1])));
			
			$scriptData = array(
				'id'		=> $BuildArray[0], 
				'level' 	=> $BuildArray[1], 
				'time' 		=> $BuildArray[2], 
				'endtime' 	=> $BuildArray[3],
				'resttime' 	=> ($BuildArray[3] - TIMESTAMP), 
				'cost' 		=> round(array_sum($costResources)),
				'dmPrice'	=> $DMprice,
			);
		}
		
		return array('queue' => $scriptData, 'quickinfo' => $quickinfo);
	}

	public function show()
	{
		global $PLANET, $USER, $LNG, $resource, $reslist, $pricelist, $requeriments;

		$TheCommand		= HTTP::_GP('cmd','');
		$elementId     	= HTTP::_GP('tech', 0);
		$ListID     	= HTTP::_GP('listid', 0);
		
		$PLANET[$resource[31].'_inter']	= ResourceUpdate::getNetworkLevel($USER, $PLANET);	

		if(!empty($TheCommand) && $_SERVER['REQUEST_METHOD'] === 'POST' && $USER['urlaubs_modus'] == 0)
		{
			switch($TheCommand)
			{
				case 'cancel':
					$this->CancelBuildingFromQueue();
				break;
				case 'remove':
					$this->RemoveBuildingFromQueue($ListID);
				break;
				case 'insert':
					$this->AddBuildingToQueue($elementId, true);
				break;
				case 'destroy':
					$this->AddBuildingToQueue($elementId, false);
				break;
				case 'complete':
					$Frame = HTTP::_GP('frame', 0);
					$this->FinishResearchToQueue($Frame);
				break;
			}
			
			$this->redirectTo('game.php?page=research');
		}
		
		$bContinue		= $this->CheckLabSettingsInQueue($PLANET);
		
		$queueData		= $this->getQueueData();
		$TechQueue		= $queueData['queue'];
		$TechQueueId	= isset($queueData['queue']['id']) ? $queueData['queue']['id'] : 0;
		$TechQueueId1	= isset($queueData['queue']['id']) ? $queueData['queue']['id'] : 101;
		$QueueCount		= count($TechQueue);
		$ResearchList	= array();
		$ResearchIds	= array(101,102,103,104,105,106,109,110,111,112,113,115,116,117,118,120,121,122,124,141,142,143,144,151,152,153,154,155,156,157,158,165,171,172,173,174,199);
		foreach($ResearchIds as $elementId)
		{
			
			$techTreeList		 = array();
			$requirementsList	= array();
			if(isset($requeriments[$elementId]))
			{
				foreach($requeriments[$elementId] as $requireID => $RedCount)
				{
					$requirementsList[$requireID]	= array(
						'count' => $RedCount,
						'own'   => isset($PLANET[$resource[$requireID]]) ? $PLANET[$resource[$requireID]] : $USER[$resource[$requireID]]
					);
				}
			}

            $techTreeList[$elementId]	= $requirementsList;
				
			if(isset($queueData['quickinfo'][$elementId]))
			{
				$levelToBuild	= $USER[$resource[$elementId]];
			}
			else
			{
				$levelToBuild	= $USER[$resource[$elementId]];
			}
			
			$sql	= "SELECT * FROM %%VARS_REQUIRE%% WHERE requireID = :requireID AND requireLevel = :requireLevel;";
			$unlockNext	= database::get()->select($sql, array(
				':requireID'	=> $elementId,
				':requireLevel'	=> $levelToBuild+1,
			));
			
			$unlockIds = array();
			
			foreach($unlockNext as $unlock){
				$unlockIds[] = $unlock['elementID'];
			}
			
			$costResources		= BuildFunctions::getElementPrice($USER, $PLANET, $elementId, false, $levelToBuild);
			$elementTime    	= BuildFunctions::getBuildingTime($USER, $PLANET, $elementId, $costResources);
			
			
			$arrayreshone		= array(106,101,103,104,112,154);
			$arrayreshtwo		= array(109,110,111,113,115,117,118,120,121,122,199,102,105,116,141,142,143,144,151,152,153,155,165,174);
			$arrayreshtree		= array(156,157,158,);
			$arrayreshfour		= array(171,172,173);
			
			if(in_array($elementId, $arrayreshone)){
				$shortTipsOne = sprintf($LNG['shortTips'][$elementId], round($pricelist[$elementId]['bonusText']*$USER[$resource[$elementId]],2));
				$shortTipsDos = sprintf($LNG['shortTips'][$elementId], round($pricelist[$elementId]['bonusText']+$pricelist[$elementId]['bonusText']*$USER[$resource[$elementId]],2));
			}elseif(in_array($elementId, $arrayreshtwo)){
				$shortTipsOne = sprintf($LNG['shortTips'][$elementId], round($pricelist[$elementId]['bonusText']*$USER[$resource[$elementId]],2), '%');
				$shortTipsDos = sprintf($LNG['shortTips'][$elementId], round($pricelist[$elementId]['bonusText']+$pricelist[$elementId]['bonusText']*$USER[$resource[$elementId]],2), '%');
			}elseif(in_array($elementId, $arrayreshtree)){
				$shortTipsOne = sprintf($LNG['shortTips'][$elementId], round($pricelist[$elementId]['bonusText']*$USER[$resource[$elementId]],2), '%', round($pricelist[$elementId]['bonusText2']*$USER[$resource[$elementId]],2));
				$shortTipsDos = sprintf($LNG['shortTips'][$elementId], round($pricelist[$elementId]['bonusText']+$pricelist[$elementId]['bonusText']*$USER[$resource[$elementId]],2), '%', round($pricelist[$elementId]['bonusText']+$pricelist[$elementId]['bonusText2']*$USER[$resource[$elementId]],2));
			}elseif(in_array($elementId, $arrayreshfour)){
				$shortTipsOne = sprintf($LNG['shortTips'][$elementId], round($pricelist[$elementId]['bonusText']*$USER[$resource[$elementId]],2), '%', round($pricelist[$elementId]['bonusText2']*$USER[$resource[$elementId]],2), '%');
				$shortTipsDos = sprintf($LNG['shortTips'][$elementId], round($pricelist[$elementId]['bonusText']+$pricelist[$elementId]['bonusText']*$USER[$resource[$elementId]],2), '%', round($pricelist[$elementId]['bonusText2']+$pricelist[$elementId]['bonusText2']*$USER[$resource[$elementId]],2), '%');
			}elseif($elementId == 124){
				$shortTipsOne = sprintf($LNG['shortTips'][$elementId], round($pricelist[$elementId]['bonusText']*$USER[$resource[$elementId]],2), round($pricelist[$elementId]['bonusText2']*$USER[$resource[$elementId]],2), '%');
				$shortTipsDos = sprintf($LNG['shortTips'][$elementId], round($pricelist[$elementId]['bonusText']+$pricelist[$elementId]['bonusText']*$USER[$resource[$elementId]],2), round($pricelist[$elementId]['bonusText2']+$pricelist[$elementId]['bonusText2']*$USER[$resource[$elementId]],2), '%');
			}
			
			$ResearchList[$elementId]	= array(
				'id'				=> $elementId,
				'level'				=> $USER[$resource[$elementId]],
				'maxLevel'			=> $pricelist[$elementId]['max'],
				'arbrePosition'		=> $pricelist[$elementId]['arbrePosition'],
				'arbrePositionSec'	=> $pricelist[$elementId]['arbrePositionSec'],
				'costResources'		=> $costResources,
				'elementTime'    	=> $elementTime,
				'levelToBuild'		=> $levelToBuild,
				'unlockIds'			=> $unlockIds,
				'AllTech'			=> $techTreeList,
				'shortTipsOne'		=> $shortTipsOne,
				'shortTipsDos'		=> $shortTipsDos,
				'techacc'			=> BuildFunctions::isTechnologieAccessible($USER, $PLANET, $elementId),
			);
		}

		$getMaxElementsResearch  	= BuildFunctions::getMaxElementsResearch($PLANET);
		
		$this->assign(array(
			'TechQueueId'	=> $TechQueueId,
			'TechQueueId1'	=> $TechQueueId1,
			'ResearchList'	=> $ResearchList,
			'IsLabinBuild'	=> !$bContinue,
			'IsFullQueue'	=> $getMaxElementsResearch == 0 || $getMaxElementsResearch == count($TechQueue),
			'Queue'			=> $TechQueue,
			'researchRes'	=> $USER['research_perhour'] + 15,
		));
		
		$this->display('page.research.default.tpl');
	}
}
