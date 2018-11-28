<?php

/**
 *  2Moons 
 *   by Jan-Otto Kr�pke 2009-2016
 *
 * For the full copyright and license information, please view the LICENSE
 *
 * @package 2Moons
 * @author Jan-Otto Kr�pke <slaver7@gmail.com>
 * @copyright 2009 Lucky
 * @copyright 2016 Jan-Otto Kr�pke <slaver7@gmail.com>
 * @licence MIT
 * @version 1.8.0
 * @link https=>//github.com/jkroepke/2Moons
 */

class ShowLoadPage extends AbstractGamePage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}

	public function getQueueDataResearch()
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
			
			$DMprice	= round(max(1,($pricelist[$BuildArray[0]]['cost']['941']) * pow($pricelist[$BuildArray[0]]['factor'], $BuildArray[1])));
			
			$scriptData = array(
				'id'		=> $BuildArray[0], 
				'level' 	=> $BuildArray[1], 
				'name' 		=> $LNG['tech'][$BuildArray[0]],
				'time' 		=> $BuildArray[2], 
				'resttime' 	=> ($BuildArray[3] - TIMESTAMP), 
				'endtime' 	=> _date('U', $BuildArray[3], $USER['timezone']),
				'cost'		=> $DMprice,
			);
		}
		
		return array('queue' => $scriptData, 'quickinfo' => $quickinfo);
	}

	public function getQueueDataNaval()
	{
		global $LNG, $PLANET, $USER, $pricelist;

		$elementInQueue	= array();
		$ElementQueue 	= unserialize($PLANET['b_hangar_id']);
		$buildList		= array();

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
				
				$elementInQueue[$Element[0]]	= true;
				$ElementTime  	= BuildFunctions::getBuildingTime($USER, $PLANET, $Element[0]);
				$QueueTime   	+= $ElementTime * $Element[1];
				$Shipyard[]		= array($LNG['tech'][$Element[0]], $Element[1], $ElementTime, $Element[0], $DMprice, $ElementTime * $Element[1]);	// 0 = cost instant	
			}

			$buildList	= array(
				'Queue' 				=> $Shipyard,
				'b' 					=> $PLANET['b_hangar'],
				'ft' 					=> max($QueueTime - $PLANET['b_hangar'],0),
			);
		}

		return $buildList;
	}

	public function getQueueDataBuildings()
	{
		global $LNG, $PLANET, $USER, $pricelist;
		
		$scriptData		= array();
		$quickinfo		= array();
		
		if ($PLANET['b_building'] == 0 || $PLANET['b_building_id'] == "")
			return array('queue' => $scriptData, 'quickinfo' => $quickinfo);
		
		$buildQueue		= unserialize($PLANET['b_building_id']);
		
		foreach($buildQueue as $BuildArray) {
			if ($BuildArray[3] < TIMESTAMP)
				continue;
			
			$quickinfo[$BuildArray[0]]	= $BuildArray[1];
			
			$DMprice	= round(max(1,($pricelist[$BuildArray[0]]['cost']['901']) * pow($pricelist[$BuildArray[0]]['factor'], $BuildArray[1]) / 125000));
			$DMprice	+= round(max(1,($pricelist[$BuildArray[0]]['cost']['902']) * pow($pricelist[$BuildArray[0]]['factor'], $BuildArray[1]) / 85000));
			$DMprice	+= round(max(1,($pricelist[$BuildArray[0]]['cost']['903']) * pow($pricelist[$BuildArray[0]]['factor'], $BuildArray[1]) / 45000));
			
			$scriptData[] = array(
				'element'	=> $BuildArray[0], 
				'level' 	=> $BuildArray[1], 
				'time' 		=> $BuildArray[2], 
				'resttime' 	=> ($BuildArray[3] - TIMESTAMP), 
				'destroy' 	=> ($BuildArray[4] == 'destroy') ? 1 : 0, 
				'endtime' 	=> $BuildArray[3],
				'display' 	=> _date($LNG['php_tdformat'], $BuildArray[3], $USER['timezone']),
				'cost' 		=> $DMprice,
				'name' 		=> $LNG['tech'][$BuildArray[0]],
			);
		}
		
		return array('queue' => $scriptData, 'quickinfo' => $quickinfo);
	}
	
	function show() 
	{
		global $USER, $PLANET, $LNG, $resource, $USETT;

		$planetCp	= HTTP::_GP('cp', 0);
		$frame		= HTTP::_GP('frame', 0);

		if($frame == 0)
			return false;

		if(!empty($planetCp)){
			$sql	= "SELECT * FROM %%PLANETS%% WHERE id = :planetId;";
			$PLANET	= database::get()->selectSingle($sql, array(
				':planetId'	=> $planetCp,
			));
		}

		$CurrentMaxFields  	= CalculateMaxPlanetFields($PLANET);
		$maxFleetSlots		= FleetFunctions::GetMaxFleetSlots($USER);
		$getMaxBuilds	  	= BuildFunctions::getMaxElementsToList($PLANET);
		$getMaxTech	  		= BuildFunctions::getMaxElementsResearch($PLANET);
		$getMaxNaval	  	= BuildFunctions::getMaxElementsNaval($PLANET);
		$showMoonIcon		= $PLANET['id_luna'] == 0 ? "" : "m1";
		$pircentMetal		= min($PLANET[$resource[901]] * 100 / $PLANET[$resource[901].'_max'],100);
		$pircentCrystal		= min($PLANET[$resource[902]] * 100 / $PLANET[$resource[902].'_max'],100);
		$pircentDeuterium	= min($PLANET[$resource[903]] * 100 / $PLANET[$resource[903].'_max'],100);
		
		$CurrentQueueBuild		= unserialize($PLANET['b_building_id']);
		if (!empty($CurrentQueueBuild)) {
			$queueData	 		= $this->getQueueDataBuildings();
			$queueBuild	 		= $queueData['queue'];
			$ActualCountBuild	= count($queueBuild);
		} else {
			$CurrentQueueBuild	= array();
			$queueBuild			= array();
			$ActualCountBuild	= 0;
		}

		$ElementQueue 	= unserialize($PLANET['b_hangar_id']);
		if(!empty($ElementQueue)){
			$queueData	 		= $this->getQueueDataNaval();
			$queueNaval	 		= $queueData['Queue'];
			$CountNaval			= count($queueNaval);
			$b					= $queueData['b'];
			$ft					= $queueData['ft'];
		}else{
			$ElementQueue		= array();
			$queueNaval			= array();
			$CountNaval			= 0;
			$b					= 0;
			$ft					= 0;
		}

		$ElementResearch 	= unserialize($USER['b_tech_queue']);
		if(!empty($ElementResearch)){
			$queueData	 		= $this->getQueueDataResearch();
			$queueResearch	 	= $queueData['queue'];
		}else{
			$ElementResearch	= array();
			$queueResearch		= array('id' => 0);
		}
		
		$sql	= "SELECT * FROM %%PLANETS%% WHERE id_owner = :userId AND destruyed = 0 AND planet_type = 1;";
		$PlanetDetails	= database::get()->select($sql, array(
			':userId'	=> $USER['id'],
		));
		$PlanetTrack = array();
		
		foreach($PlanetDetails as $Details){
			$buildInfoBuild = array();
			if ($Details['b_building'] - TIMESTAMP > 0) {
				$Queue			= unserialize($Details['b_building_id']);
				$buildInfoBuild	= array(
					'build'		=> $LNG['tech'][$Queue[0][0]],
					'buildId'	=> $Queue[0][0],
					//'level'		=> $Queue[0][1],
					//'timeleft'	=> $Details['b_building'] - TIMESTAMP,
					'buildTime'	=> $Details['b_building'],
					//'starttime'	=> pretty_time($Details['b_building'] - TIMESTAMP),
				);
			}

			if (!empty($Details['b_hangar_id'])) {
				$Queue	= unserialize($Details['b_hangar_id']);
				$time	= BuildFunctions::getBuildingTime($USER, $Details, $Queue[0][0]) * $Queue[0][1];
				$buildInfoBuild	= array(
					'hangar'	=> $LNG['tech'][$Queue[0][0]],
					'hangarId'	=> $Queue[0][0],
					'hangarCount'=> $Queue[0][1],
					//'timeleft'	=> $time - $Details['b_hangar'],
					//'time'		=> $time,
					//'starttime'	=> pretty_time($time - $Details['b_hangar']),
				);
			}
		
			$PlanetTrack[] = array(
				'id'	=> $Details['id'],
				'name'	=> $Details['name'],
				'image'	=> $Details['id_luna'],
				'coord'	=> $Details['galaxy']." : ".$Details['system']." : ".$Details['planet'],
				'coorda'=> array("".$Details['universe']."","".$Details['galaxy']."","".$Details['system']."","".$Details['planet'].""),
				'id_luna'=> $Details['id_luna'],
				'debris'=> array("".$Details['der_metal']."","".$Details['der_crystal'].""),
				'moon'=> array(),
				'build'=> $buildInfoBuild,
				'df'=> 90,
			);
		}
		
		$lol1 = ($PLANET['metal_perhour'] + config::get()->{$resource[901].'_basic_income'}) / 3600;
		$lol2 = ($PLANET['crystal_perhour'] + config::get()->{$resource[902].'_basic_income'}) / 3600;
		$lol3 = ($PLANET['deuterium_perhour'] + config::get()->{$resource[903].'_basic_income'}) / 3600;		
		
		$maxExpedition      = $USER[$resource[154]];
		
		$premiumInfo = getPremiumIcons($USETT);
		
		$offerData = array(0);
		if($USER['commanderLevel'] >= 2 && $USETT['specialOffer'] >= TIMESTAMP - 48 * 3600){
			if(empty($USETT['specialOfferIsSeen'])){
				$sql	= 'UPDATE %%USETT%% SET specialOfferIsSeen = 1 WHERE id = :userId';
				database::get()->update($sql, array(
					':userId'	=> $USER['id']
				));
				$offerData = array("1",($USETT['specialOffer'] + 48 * 3600)-TIMESTAMP,200,"".$LNG['specialof_2']."",true);
			}else{
				$offerData = array("1",($USETT['specialOffer'] + 48 * 3600)-TIMESTAMP,200,"".$LNG['specialof_2']."",false);
			}
		}
		
		$levelUpCommander = $USER['commanderExpe'] >= 1000 ? true : false;
		
		$planetSize = round(100/250*$CurrentMaxFields);
		
		$varEntry = "";
		
		if(empty($USER['trainingStep'])){
			$varEntry = "Dialog.Training(1001);";
		}elseif(in_array($USER['trainingStep'], array(1001,1002,1003,1004,1))){
			$sql	= 'UPDATE %%USERS%% SET trainingStep = 1 WHERE id = :userId';
			database::get()->update($sql, array(
				':userId'		=> $USER['id']
			));
			$varEntry = "$('.a-pointer').remove();$('.a-pointer').remove();AddArrow('#ov-queue-build .queue-text:first', 'r');";
		}elseif($USER['entryReward'] < TIMESTAMP && $USER['commanderLevel'] >= 5){
			$sql	= 'UPDATE %%USERS%% SET entryReward = :entryReward WHERE id = :userId';
			database::get()->update($sql, array(
				':entryReward'	=> TIMESTAMP + 24 * 3600,
				':userId'		=> $USER['id']
			));
			$varEntry = "Dialog.EntryReward();";
		}
		
		$EndEvent = config::get()->tourneyEnd - TIMESTAMP;
		$response = array("pi"=>"".$PLANET['id']."","pd"=>array("name"=>"".$PLANET['name']."","image"=>"".$PLANET['image']."","moon"=>"".$PLANET['id_luna']."","moon_i"=>"".$showMoonIcon."","coord"=>["".$PLANET['universe']."","".$PLANET['galaxy']."","".$PLANET['system']."","".$PLANET['planet'].""],"maxFS"=>$maxFleetSlots,"debris"=>["".$PLANET['der_metal']."","".$PLANET['der_crystal'].""],"temp"=>["".$PLANET['temp_min']."","".$PLANET['temp_max'].""],"type"=>"".$PLANET['planet_type']."","diameter"=>["".$PLANET['diameter']."","".$PLANET['field_current']."",$CurrentMaxFields],"df"=>$planetSize,"moon_df"=>20,"news"=>array(1234)),"rd"=>array("901"=>[$PLANET['metal'],$PLANET['metal_max'],$lol1,$LNG['tech'][901]],"902"=>[$PLANET['crystal'],$PLANET['crystal_max'],$lol2,$LNG['tech'][902]],"903"=>[$PLANET['deuterium'],$PLANET['deuterium_max'],$lol3,$LNG['tech'][903]],"911"=>[$PLANET['energy'],$PLANET['energy_used'],0,$LNG['tech'][911]],"921"=>[$USER['darkmatter'],0,0],"931"=>[$USER['antimatter'],0,0],"942"=>[$USETT['stellarore'],0,0],"level"=>["".$USER['commanderLevel']."",$USER['commanderExpe'],1000]),"ev"=>array("expedM"=>$maxExpedition,"PD"=>array("MC"=>3,"AC"=>$premiumInfo['countPremium'],"T"=>(max(0,$premiumInfo['ShowFastFinishPremium']-TIMESTAMP)),"TXT"=>array($LNG['premName'][15],$premiumInfo['premiumText'])),"Contract"=>array(0,0,0),"TimeT"=>$EndEvent,"TimeA"=>0,"LevelUp"=>$levelUpCommander,"Offer"=>$offerData),"qb"=>array("status"=>[$ActualCountBuild,$getMaxBuilds],"queue"=>$queueBuild),"qs"=>array("status"=>[$CountNaval,$getMaxNaval],"queue"=>$queueNaval,"b"=>$b,"ft"=>$ft),"qr"=>array("status"=>15+$USER['research_perhour'],"queue"=>$queueResearch),"pl"=>$PlanetTrack,"js"=>$varEntry);
		

		
		echo json_encode($response, JSON_NUMERIC_CHECK);
	}
}