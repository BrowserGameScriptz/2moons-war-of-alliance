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


class ShowTourneyPage extends AbstractGamePage 
{
	public static $requireModule = 0;
	
	function __construct() 
	{
		parent::__construct();
	}
	
	function show() 
	{
		global $USER, $USETT, $LNG;
		$sql = "SELECT * FROM %%TOURNEY%%;";
		$tourneyDetail = database::get()->select($sql, array());
		
		$Tourneys = array();
		
		foreach($tourneyDetail as $Tourney){
			$Tourneys[$Tourney['tourneyId']] = array(
				'tourneyName'	=> $Tourney['tourneyName'],
				'priceOne'		=> $Tourney['priceOne'],
				'priceTwo'		=> $Tourney['priceTwo'],
				'priceThree'	=> $Tourney['priceThree'],
				'typeReward'	=> $Tourney['typeReward'],
			);
		}
		
		//$sql	= "SELECT SUM(desunits) as desunits, ally_id FROM %%USERS%% GROUP BY ally_id HAVING COUNT(*)>=1 AND ally_id != 0 ORDER BY desunits;";
		$sql	= "SELECT SUM(user.desunits) as desunits, user.ally_id, alliance.ally_name, alliance.ally_tag FROM %%USERS%% as user LEFT JOIN %%ALLIANCE%% as alliance ON alliance.id = user.ally_id WHERE alliance.allianceDivision = 1 GROUP BY user.ally_id HAVING COUNT(*)>=1 AND user.ally_id != 0 ORDER BY user.desunits DESC;";
		$alphaResult = database::get()->select($sql, array());
		$TournayAlpha 	= array();
		foreach($alphaResult as $AllianceResult){
			$TournayAlpha[$AllianceResult['ally_id']] = array(
				'desunits' => $AllianceResult['desunits'],
				'ally_name'=> $AllianceResult['ally_name'],
				'ally_tag' => $AllianceResult['ally_tag'],
			);
		}
		
		$sql	= "SELECT SUM(user.desunits) as desunits, user.ally_id, alliance.ally_name, alliance.ally_tag FROM %%USERS%% as user LEFT JOIN %%ALLIANCE%% as alliance ON alliance.id = user.ally_id WHERE alliance.allianceDivision = 2 GROUP BY user.ally_id HAVING COUNT(*)>=1 AND user.ally_id != 0 ORDER BY user.desunits DESC;";
		$betaResult = database::get()->select($sql, array());
		$TournayBeta 	= array();
		foreach($betaResult as $AllianceResult){
			$TournayBeta[$AllianceResult['ally_id']] = array(
				'desunits' => $AllianceResult['desunits'],
				'ally_name'=> $AllianceResult['ally_name'],
				'ally_tag' => $AllianceResult['ally_tag'],
			);
		}
		
		$sql	= "SELECT SUM(user.desunits) as desunits, user.ally_id, alliance.ally_name, alliance.ally_tag FROM %%USERS%% as user LEFT JOIN %%ALLIANCE%% as alliance ON alliance.id = user.ally_id WHERE alliance.allianceDivision = 3 GROUP BY user.ally_id HAVING COUNT(*)>=1 AND user.ally_id != 0 ORDER BY user.desunits DESC;";
		$gammaResult = database::get()->select($sql, array());
		$TournayGamma 	= array();
		foreach($gammaResult as $AllianceResult){
			$TournayGamma[$AllianceResult['ally_id']] = array(
				'desunits' => $AllianceResult['desunits'],
				'ally_name'=> $AllianceResult['ally_name'],
				'ally_tag' => $AllianceResult['ally_tag'],
			);
		}
		
		$sql	= "SELECT SUM(user.desunits) as desunits, user.ally_id, alliance.ally_name, alliance.ally_tag FROM %%USERS%% as user LEFT JOIN %%ALLIANCE%% as alliance ON alliance.id = user.ally_id WHERE alliance.allianceDivision = 4 GROUP BY user.ally_id HAVING COUNT(*)>=1 AND user.ally_id != 0 ORDER BY user.desunits DESC;";
		$deltaResult = database::get()->select($sql, array());
		$TournayDelta 	= array();
		foreach($deltaResult as $AllianceResult){
			$TournayDelta[$AllianceResult['ally_id']] = array(
				'desunits' => $AllianceResult['desunits'],
				'ally_name'=> $AllianceResult['ally_name'],
				'ally_tag' => $AllianceResult['ally_tag'],
			);
		}
		
		$sql	= "SELECT SUM(user.desunits) as desunits, user.ally_id, alliance.ally_name, alliance.ally_tag FROM %%USERS%% as user LEFT JOIN %%ALLIANCE%% as alliance ON alliance.id = user.ally_id WHERE alliance.allianceDivision = 5 GROUP BY user.ally_id HAVING COUNT(*)>=1 AND user.ally_id != 0 ORDER BY user.desunits DESC;";
		$epsilonResult = database::get()->select($sql, array());
		$TournayEpsilon 	= array();
		foreach($epsilonResult as $AllianceResult){
			$TournayEpsilon[$AllianceResult['ally_id']] = array(
				'desunits' => $AllianceResult['desunits'],
				'ally_name'=> $AllianceResult['ally_name'],
				'ally_tag' => $AllianceResult['ally_tag'],
			);
		}
		
		
		$this->assign(array(
			'Tourneys'		=> $Tourneys,
			'TournayAlpha'	=> $TournayAlpha,
			'TournayBeta'	=> $TournayBeta,
			'TournayGamma'	=> $TournayGamma,
			'TournayDelta'	=> $TournayDelta,
			'TournayEpsilon'=> $TournayEpsilon,
			'tourneyEnd'	=> config::get()->tourneyEnd - TIMESTAMP,
		));
		
		$this->display('page.tourney.default.tpl');
	} 
}
