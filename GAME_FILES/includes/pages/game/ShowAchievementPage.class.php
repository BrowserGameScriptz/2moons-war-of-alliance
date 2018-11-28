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

class ShowAchievementPage extends AbstractGamePage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}
	
	function getCount($varId) 
	{
		global $USER, $PLANET, $LNG, $USETT;
		
		$statArray = array(801,802,803,804);
		$expeArray = array(805,807,814,813,817,825);
		$userArray = array(822);
		
		if(in_array($varId, $statArray)){
			if($varId == 801) $Query = "build_points";
			elseif($varId == 802) $Query = "defs_points";
			elseif($varId == 803) $Query = "fleet_points";
			elseif($varId == 804) $Query = "tech_points";
			$sql = "SELECT ".$Query." FROM %%STATPOINTS%% WHERE `id_owner` = :id_owner AND stat_type = 1;";
			$Points = database::get()->selectSingle($sql, array(
				':id_owner'	=> $USER['id'],
			));
			
		}elseif(in_array($varId, $expeArray)){
			if($varId == 805) $Query = "ach_expe_res_count";
			elseif($varId == 807) $Query = "ach_expe_fleet_count";
			elseif($varId == 814) $Query = "ach_rise_ruins_count";
			elseif($varId == 813) $Query = "ach_conquer_ruins_count";
			elseif($varId == 817) $Query = "ach_market_count";
			elseif($varId == 825) $Query = "ach_mercenary_count";
			$sql = "SELECT ".$Query." FROM %%USETT%% WHERE `id` = :id_owner;";
			$Points = database::get()->selectSingle($sql, array(
				':id_owner'	=> $USER['id'],
			));
			
		}elseif(in_array($varId, $userArray)){
			if($varId == 822) $Query = "desunits";
			$sql = "SELECT ".$Query." FROM %%USERS%% WHERE `id` = :id_owner;";
			$Points = database::get()->selectSingle($sql, array(
				':id_owner'	=> $USER['id'],
			));
			
		}
		
		return $Points[$Query];

	}
	
	function show() 
	{
		global $USER, $PLANET, $LNG, $USETT, $pricelist, $requeriments, $resource;

		$AchievementList = array();
		
		$AchievementOrder = array(801,802,803,804,817,825,805,807,814,822,813);
		foreach($AchievementOrder as $achievement){
			
			if (!BuildFunctions::isTechnologieAccessible($USER, $PLANET, $achievement))
				continue;
			
			$AchievementList[$achievement]	= array(
				'level'				=> $USETT[$resource[$achievement]],
				'count'				=> pretty_number($this->getCount($achievement)),
				'bonus800'			=> $pricelist[$achievement]['bonus800'],
				'bonusExpe'			=> $pricelist[$achievement]['bonusExpe'],
				'bonus921'			=> $pricelist[$achievement]['bonus921'],
			);
		}
		
		$this->assign(array(
			'achievements'		=> $USER['achievements'],
			'AchievementList'	=> $AchievementList,

		));
		
		$this->display('page.achievement.default.tpl');
	}
}
