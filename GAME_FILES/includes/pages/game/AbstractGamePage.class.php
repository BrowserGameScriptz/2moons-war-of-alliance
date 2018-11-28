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

abstract class AbstractGamePage
{
	/**
	 * reference of the template object
	 * @var template
	 */
	protected $tplObj;

	/**
	 * reference of the template object
	 * @var ResourceUpdate
	 */
	protected $ecoObj;
	protected $window;
	protected $disableEcoSystem = false;

	protected function __construct() {

		//if(!AJAX_REQUEST)
		//{
			
			$siteArray = array('page=chat', 'page=chat&mode=rooms', 'page=chat&mode=roomsActions');
			if(!in_array($this->getQueryString(), $siteArray)) 
				$this->setWindow('full');
			else
				$this->setWindow('chat');
			
			if(!$this->disableEcoSystem)
			{
				$this->ecoObj	= new ResourceUpdate();
				$this->ecoObj->CalcResource();
			}
			$this->initTemplate();
		//} else {
		//	$this->setWindow('ajax');
		//}
	}

	protected function initTemplate() {
		if(isset($this->tplObj))
			return true;

		$this->tplObj	= new template;
		list($tplDir)	= $this->tplObj->getTemplateDir();
		$this->tplObj->setTemplateDir($tplDir.'game/');
		return true;
	}

	protected function setWindow($window) {
		$this->window	= $window;
	}

	protected function getWindow() {
		return $this->window;
	}

	protected function getQueryString() {
		$queryString	= array();
		$page			= HTTP::_GP('page', '');

		if(!empty($page)) {
			$queryString['page']	= $page;
		}

		$mode			= HTTP::_GP('mode', '');
		if(!empty($mode)) {
			$queryString['mode']	= $mode;
		}

		return http_build_query($queryString);
	}

	protected function getCronjobsTodo()
	{
		require_once 'includes/classes/Cronjob.class.php';

		$this->assign(array(
			'cronjobs'		=> Cronjob::getNeedTodoExecutedJobs()
		));
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

	protected function getNavigationData()
	{
		global $PLANET, $LNG, $USER, $THEME, $resource, $reslist, $USETT;

		$config			= Config::get();

		$PlanetSelect	= array();

		if(isset($USER['PLANETS'])) {
			$USER['PLANETS']	= getPlanets($USER);
		}

		foreach($USER['PLANETS'] as $PlanetQuery)
		{
			$PlanetSelect[$PlanetQuery['id']]	= $PlanetQuery['name'].(($PlanetQuery['planet_type'] == 3) ? " (" . $LNG['fcm_moon'] . ")":"")." [".$PlanetQuery['galaxy'].":".$PlanetQuery['system'].":".$PlanetQuery['planet']."]";
		}

		$resourceTable	= array();
		$resourceSpeed	= $config->resource_multiplier;
		foreach($reslist['resstype'][1] as $resourceID)
		{
			if(isset($PLANET[$resource[$resourceID]])){
				$resourceTable[$resourceID]['name']			= $resource[$resourceID];
				$resourceTable[$resourceID]['current']		= $PLANET[$resource[$resourceID]];
				$resourceTable[$resourceID]['max']			= $PLANET[$resource[$resourceID].'_max'];
				if($USER['urlaubs_modus'] == 1 || $PLANET['planet_type'] != 1)
				{
					$resourceTable[$resourceID]['production']	= $PLANET[$resource[$resourceID].'_perhour'];
				}
				else
				{
					$resourceTable[$resourceID]['production']	= $PLANET[$resource[$resourceID].'_perhour'] + $config->{$resource[$resourceID].'_basic_income'} * $resourceSpeed;
				}
			}elseif(isset($USER[$resource[$resourceID]])){
				$resourceTable[$resourceID]['name']			= $resource[$resourceID];
				$resourceTable[$resourceID]['current']		= $USER[$resource[$resourceID]];
				$resourceTable[$resourceID]['max']			= $USER[$resource[$resourceID].'_max'];
				if($USER['urlaubs_modus'] == 1)
				{
					$resourceTable[$resourceID]['production']	= 0;
				}
				else
				{
					$resourceTable[$resourceID]['production']	= $USER[$resource[$resourceID].'_perhour'] + $config->{$resource[$resourceID].'_basic_income'} * $resourceSpeed;
				}
			}
		}

		foreach($reslist['resstype'][2] as $resourceID)
		{
			$resourceTable[$resourceID]['name']			= $resource[$resourceID];
			$resourceTable[$resourceID]['used']			= $PLANET[$resource[$resourceID].'_used'];
			$resourceTable[$resourceID]['max']			= $PLANET[$resource[$resourceID]];
		}

		foreach($reslist['resstype'][3] as $resourceID)
		{
			$resourceTable[$resourceID]['name']			= $resource[$resourceID];
			$resourceTable[$resourceID]['current']		= $USER[$resource[$resourceID]];
		}

		$themeSettings	= $THEME->getStyleSettings();

		$pircentMetal		= min($PLANET[$resource[901]] * 100 / $PLANET[$resource[901].'_max'],100);
		$pircentCrystal		= min($PLANET[$resource[902]] * 100 / $PLANET[$resource[902].'_max'],100);
		$pircentDeuterium	= min($PLANET[$resource[903]] * 100 / $PLANET[$resource[903].'_max'],100);

		$getMaxBuilds	  	= BuildFunctions::getMaxElementsToList($PLANET);
		$getMaxTech	  		= BuildFunctions::getMaxElementsResearch($PLANET);
		$getMaxNaval	  	= BuildFunctions::getMaxElementsNaval($PLANET);

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
		
		$premiumInfoAll = getPremiumIcons($USETT);
		
		$offerDataAbs = array(0);
		if($USER['commanderLevel'] >= 2 && $USETT['specialOffer'] >= TIMESTAMP - 48 * 3600){
			if(empty($USETT['specialOfferIsSeen'])){
				$sql	= 'UPDATE %%USETT%% SET specialOfferIsSeen = 1 WHERE id = :userId';
				database::get()->update($sql, array(
					':userId'	=> $USER['id']
				));
				$offerDataAbs = array("1",($USETT['specialOffer'] + 48 * 3600)-TIMESTAMP,200,"".$LNG['specialof_2']."",true);
			}else{
				$offerDataAbs = array("1",($USETT['specialOffer'] + 48 * 3600)-TIMESTAMP,200,"".$LNG['specialof_2']."",false);
			}
		}
		
		$EndEventAbs = config::get()->tourneyEnd - TIMESTAMP;
		$levelUpCommanAbs = $USER['commanderExpe'] >= 1000 ? true : false;	
		$planetSizeAbs	 = round(100/250*CalculateMaxPlanetFields($PLANET));

		$varEntryAbs = "";
		if($USER['trainingStep'] == 1 && $this->getQueryString() == "page=buildings"){
			if($PLANET[$resource[1]] < 1)
				$varEntryAbs = "parent.$('.a-pointer').remove();$('.a-pointer').remove();AddArrow('#build_1 .btn:first', 't');AddArrow('.queue-block:first .btn-transp:first', 'r');";
			elseif($PLANET[$resource[1]] == 0 && !empty($queueBuild) && $queueBuild['element'] == 1)
				$varEntryAbs = "parent.$('.a-pointer').remove();$('.a-pointer').remove();AddArrow('.queue-block:first .btn-transp:first', 'r');";
			elseif($PLANET[$resource[2]] < 1)
				$varEntryAbs = "parent.$('.a-pointer').remove();$('.a-pointer').remove();AddArrow('#build_2 .btn:first', 't');AddArrow('.queue-block:first .btn-transp:first', 'r');";
			elseif($PLANET[$resource[2]] == 0 && !empty($queueBuild) && $queueBuild['element'] == 2)
				$varEntryAbs = "parent.$('.a-pointer').remove();$('.a-pointer').remove();AddArrow('.queue-block:first .btn-transp:first', 'r');";
		}elseif($USER['trainingStep'] == 1 && ($PLANET[$resource[1]] < 1 || $PLANET[$resource[2]] < 1) && $this->getQueryString() != "page=buildings"){
			$varEntryAbs = "parent.$('.a-pointer').remove();$('.a-pointer').remove();parent.AddArrow('#iframe-box .i-bb:first', 'l');";
		}elseif($USER['entryReward'] < TIMESTAMP && $USER['commanderLevel'] >= 5){
			$sql	= 'UPDATE %%USERS%% SET entryReward = :entryReward WHERE id = :userId';
			database::get()->update($sql, array(
				':entryReward'	=> TIMESTAMP + 24 * 3600,
				':userId'		=> $USER['id']
			));
			$varEntryAbs = "Dialog.EntryReward();";
		}

		$this->assign(array(
			'varEntryAbs'		=> $varEntryAbs,
			'planetSizeAbs'		=> $planetSizeAbs,
			'levelUpCommanAbs'	=> $levelUpCommanAbs,
			'premiumTextAb'		=> $premiumInfoAll['premiumText'],
			'premiumInfoCount'	=> $premiumInfoAll['countPremium'],
			'premiumInfoTime'	=> max(0,$premiumInfoAll['ShowFastFinishPremium'] - TIMESTAMP),
			'lolExpedition'		=> $maxExpedition,
			'EndEventAbs'		=> $EndEventAbs,
			'offerDataAbs'		=> $offerDataAbs,
			'lol1'				=> $lol1,
			'lol2'				=> $lol2,
			'lol3'				=> $lol3,
			'b'					=> $b,
			'ft'				=> $ft,
			'ActualCountBuild'	=> $ActualCountBuild,
			'CountNaval'		=> $CountNaval,
			'queueBuild'		=> $queueBuild,
			'queueNaval'		=> $queueNaval,
			'queueResearch'		=> $queueResearch,
			'getMaxBuilds'		=> $getMaxBuilds,
			'PlanetTrack'		=> $PlanetTrack,
			'getMaxTech'		=> $USER['research_perhour']+15,
			'getMaxNaval'		=> $getMaxNaval,
			'pircentMetal'		=> $pircentMetal,
			'pircentCrystal'	=> $pircentCrystal,
			'pircentDeuterium'	=> $pircentDeuterium,
			'new_message' 		=> $USER['messages'],
			'vacation'			=> $USER['urlaubs_modus'] ? _date($LNG['php_tdformat'], $USER['urlaubs_until'], $USER['timezone']) : false,
			'delete'			=> $USER['db_deaktjava'] ? sprintf($LNG['tn_delete_mode'], _date($LNG['php_tdformat'], $USER['db_deaktjava'] + ($config->del_user_manually * 86400)), $USER['timezone']) : false,
			'darkmatter'		=> $USER['darkmatter'],
			'antimatter'		=> $USER['antimatter'],
			'commanderLevel'	=> $USER['commanderLevel'],
			'commanderExpe'		=> $USER['commanderExpe'],
			'CommanderExpeMax'	=> $USER['CommanderExpeMax'],
			'stellarore'		=> $USETT['stellarore'],
			'current_pid'		=> $PLANET['id'],
			'maxFS'				=> FleetFunctions::GetMaxFleetSlots($USER),
			'current_pluna'		=> $PLANET['id_luna'],
			'image'				=> $PLANET['image'],
			'current_pname'		=> $PLANET['name'],
			'current_puni'		=> $PLANET['universe'],
			'current_pgal'		=> $PLANET['galaxy'],
			'current_psys'		=> $PLANET['system'],
			'current_ppla'		=> $PLANET['planet'],
			'current_dmem'		=> $PLANET['der_metal'],
			'current_dcry'		=> $PLANET['der_crystal'],
			'current_sum'		=> $PLANET['der_metal'] + $PLANET['der_crystal'],
			'current_ptype'		=> $PLANET['planet_type'],
			'current_tmin'		=> $PLANET['temp_min'],
			'current_tmax'		=> $PLANET['temp_max'],
			'current_pdiam'		=> $PLANET['diameter'],
			'current_fcurr'		=> $PLANET['field_current'],
			'current_pmetal'	=> $PLANET['metal'],
			'current_pcry'		=> $PLANET['crystal'],
			'current_pdeu'		=> $PLANET['deuterium'],
			'current_pmetalm'	=> $PLANET['metal_max'],
			'current_pcrym'		=> $PLANET['crystal_max'],
			'current_pdeum'		=> $PLANET['deuterium_max'],
			'current_pene'		=> $PLANET['energy'],
			'current_peneu'		=> $PLANET['energy_used'],
			'OverviewNewsFrame'	=> config::get()->OverviewNewsFrame,
			'current_fmax'		=> CalculateMaxPlanetFields($PLANET),
			'resourceTable'		=> $resourceTable,
			'shortlyNumber'		=> $themeSettings['TOPNAV_SHORTLY_NUMBER'],
			'closed'			=> !$config->game_disable,
			'hasBoard'			=> filter_var($config->forum_url, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED),
			'hasAdminAccess'	=> !empty(Session::load()->adminAccess),
			'hasGate'			=> $PLANET[$resource[43]] > 0
		));
	}

	protected function getPageData()
	{
		global $USER, $THEME, $USETT;

		if($this->getWindow() === 'full' || $this->getWindow() === 'frame' || $this->getWindow() === 'popup') {
			$this->getNavigationData();
			$this->getCronjobsTodo();
		}

		$dateTimeServer		= new DateTime("now");
		if(isset($USER['timezone'])) {
			try {
				$dateTimeUser	= new DateTime("now", new DateTimeZone($USER['timezone']));
			} catch (Exception $e) {
				$dateTimeUser	= $dateTimeServer;
			}
		} else {
			$dateTimeUser	= $dateTimeServer;
		}

		$config	= Config::get();

		$this->assign(array(
			'animation'			=> $_COOKIE['animation'],
			'vmode'				=> $USER['urlaubs_modus'],
			'authlevel'			=> $USER['authlevel'],
			'userID'			=> $USER['id'],
			'bodyclass'			=> $this->getWindow(),
			'game_name'			=> $config->game_name,
			'uni_name'			=> $config->uni_name,
			'ga_active'			=> $config->ga_active,
			'ga_key'			=> $config->ga_key,
			'debug'				=> $config->debug,
			'VERSION'			=> $config->VERSION,
			'date'				=> explode("|", date('Y\|n\|j\|G\|i\|s\|Z', TIMESTAMP)),
			'isPlayerCardActive' => isModuleAvailable(MODULE_PLAYERCARD),
			'REV'				=> "r=1.0",
			'Offset'			=> $dateTimeUser->getOffset() - $dateTimeServer->getOffset(),
			'queryString'		=> $this->getQueryString(),
			'themeSettings'		=> $THEME->getStyleSettings(),
			'AlarmHeader'		=> $USETT['settingAlarm'],	
		));
	}
	protected function printMessage($message, $redirectButtons = NULL, $redirect = NULL, $fullSide = true)
	{
		$this->assign(array(
			'message'			=> $message,
			'redirectButtons'	=> $redirectButtons,
		));

		if(isset($redirect)) {
			$this->tplObj->gotoside($redirect[0], $redirect[1]);
		}


		if(!$fullSide) {
			$this->setWindow('popup');
		}
		
		$this->display('error.default.tpl');
	}

	protected function save() {
		if(isset($this->ecoObj)) {
			$this->ecoObj->SavePlanetToDB();
		}
	}

	protected function assign($array, $nocache = true) {
		$this->tplObj->assign_vars($array, $nocache);
	}

	protected function display($file) {
		global $THEME, $LNG;

		$this->save();

		if($this->getWindow() !== 'ajax') {
			$this->getPageData();
		}

		$this->assign(array(
			'lang'    		=> $LNG->getLanguage(),
			'dpath'			=> $THEME->getTheme(),
			'scripts'		=> $this->tplObj->jsscript,
			'execscript'	=> implode("\n", $this->tplObj->script),
			'basepath'		=> PROTOCOL.HTTP_HOST.HTTP_BASE,
		));

		$this->assign(array(
			'LNG'			=> $LNG,
		), false);

		$this->tplObj->display('extends:layout.'.$this->getWindow().'.tpl|'.$file);
		exit;
	}

	protected function sendJSON($data) {
		$this->save();
		echo json_encode($data);
		exit;
	}

	protected function redirectTo($url) {
		$this->save();
		HTTP::redirectTo($url);
		exit;
	}
}