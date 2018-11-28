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


class ShowPlayerCardPage extends AbstractGamePage
{
    public static $requireModule = MODULE_PLAYERCARD;
	
	protected $disableEcoSystem = true;

	function __construct() 
	{
		parent::__construct();
		$this->setWindow('popup');
	}
	
	function factor ()
	{
		global $USER, $LNG, $USETT, $resource;
		
		$PlayerID 	= HTTP::_GP('id', $USER['id']);
		
		$fleetPointsExtra = 0;
		for($i = 0; $i < $USER[$resource[124]]; $i++)
		{
			$fleetPointsExtra 	= 100 * 2;
		}
		
		$this->assign(array(
			'id'				=> $PlayerID,
			'yourid'			=> $USER['id'],
			'expeSend'			=> $USETT['expeSend'],
			'expeResFound'		=> $USETT['expeResFound'],
			'expeDmFound'		=> $USETT['expeDmFound'],
			'expeFleetFound'	=> $USETT['expeFleetFound'],
			'expeStelarFound'	=> $USETT['expeStelarFound'],
			'bonusAttackPlayer'	=> 3 * $USER[$resource[109]],
			'bonusShieldPlayer'	=> 3 * $USER[$resource[110]],
			'bonusArmorPlayer'	=> 3 * $USER[$resource[111]],
			'bonusSlotsPlayer'	=> $USER[$resource[101]],
			'bonusSpyinPlayer'	=> $USER[$resource[106]],
			'bonusExpeSlPlayer'	=> $USER[$resource[154]],
			'bonusLaserPlayer'	=> 5 * $USER[$resource[120]],
			'bonusIonsPlayer'	=> 5 * $USER[$resource[121]],
			'bonusLighAPlayer'	=> 5 * $USER[$resource[141]],
			'bonusLighSPlayer'	=> 5 * $USER[$resource[171]],
			'bonusJetEnPlayer'	=> 5 * $USER[$resource[151]],
			'bonusResourPlayer'	=> 5 * $USER[$resource[102]],
			'bonusEnergyPlayer'	=> 5 * $USER[$resource[113]],
			'bonusSpeedFPlayer'	=> 3 * $USER[$resource[105]],
			'bonusSavingPlayer'	=> 2 * $USER[$resource[165]],
			'bonusConstruPlayer'=> 2 * $USER[$resource[605]],
			'bonusLighS1Player'	=> 0.25 * $USER[$resource[171]],
			'bonusFleetPoPlayer'=> $fleetPointsExtra,
		));
		
		$this->display('page.playerCard.factor.tpl');
	}
	
	function show()
	{
		global $USER, $LNG, $USETT, $reslist, $resource;
		$db = Database::get();

		$PlayerID 	= HTTP::_GP('id', $USER['id']);
		
		if($_POST){
			$p_name 		= HTTP::_GP('p_name', '', UTF8_SUPPORT);
			$p_country 		= HTTP::_GP('p_country', '', UTF8_SUPPORT);
			$p_city 		= HTTP::_GP('p_city', '', UTF8_SUPPORT);
			$p_age 			= HTTP::_GP('p_age', 0);
			
			$sql	= "UPDATE %%USETT%% SET p_name = :p_name, p_country = :p_country, p_city = :p_city, p_age = :p_age WHERE id = :userID;";
			$db->update($sql, array(
				':p_name'		=> $p_name,
				':p_country'	=> $p_country,
				':p_city'		=> $p_city,
				':p_age'		=> $p_age,
				':userID'		=> $USER['id']
			));
		}
		
		$select_achiev		=	'';
				
		foreach($reslist['achievements'] as $Achiev){
			$select_achiev	.= " usett.".$resource[$Achiev].",";
		}
		
		$sql = "SELECT 
				u.username, u.register_time, u.commanderLevel, u.commanderExpe, u.CommanderExpeMax, u.galaxy, u.system, u.planet, u.wons, u.loos, u.draws, u.kbmetal, u.kbcrystal, u.lostunits, u.desunits, u.ally_id,
				".$select_achiev." usett.p_name, usett.p_country, usett.p_city, usett.p_age, usett.pointofwar, usett.displayname, usett.expe_barbar, usett.expe_pirat, usett.expe_ancie, usett.expe_ruin,
				usett.hostileLost, usett.hostileGain, usett.expeSend, usett.expeResFound, usett.expeDmFound, usett.expeFleetFound, usett.expeStelarFound, p.name,
				s.tech_rank, s.tech_old_rank, s.tech_points, s.build_rank, s.build_old_rank, s.build_points, s.armement_rank, s.armement_old_rank, s.armement_points, s.defs_rank, s.defs_old_rank, s.defs_points, s.fleet_rank, s.fleet_old_rank, s.fleet_points, s.total_rank, s.total_old_rank, s.total_points,
				a.ally_name
				FROM %%USERS%% u
				INNER JOIN %%PLANETS%% p ON p.id = u.id_planet
				INNER JOIN %%USETT%% usett ON usett.id = u.id
				LEFT JOIN %%STATPOINTS%% s ON s.id_owner = u.id AND s.stat_type = 1
				LEFT JOIN %%ALLIANCE%% a ON a.id = u.ally_id
				WHERE u.id = :playerID AND u.universe = :universe;";
		$query = $db->selectSingle($sql, array(
			':universe'	=> Universe::current(),
			':playerID'	=> $PlayerID
		));
		
		$ranking5	= $query['tech_old_rank'] - $query['tech_rank'];
		$ranking2	= $query['build_old_rank'] - $query['build_rank'];
		$ranking4	= $query['defs_old_rank'] - $query['defs_rank'];
		$ranking3	= $query['fleet_old_rank'] - $query['fleet_rank'];
		$ranking1	= $query['armement_old_rank'] - $query['armement_rank'];
		
		if($ranking1 == 0){
			$position1 = "";
		}elseif($ranking1 < 0){
			$position1 = "<span class='c-red'>⇓".$ranking1."</span>";
		}elseif ($ranking1 > 0){
			$position1 = "<span class='c-green'>⇑+".$ranking1."</span>";
		}
		
		if($ranking2 == 0){
			$position2 = "";
		}elseif($ranking2 < 0){
			$position2 = "<span class='c-red'>⇓".$ranking2."</span>";
		}elseif ($ranking2 > 0){
			$position2 = "<span class='c-green'>⇑+".$ranking2."</span>";
		}
		
		if($ranking3 == 0){
			$position3 = "";
		}elseif($ranking3 < 0){
			$position3 = "<span class='c-red'>⇓".$ranking3."</span>";
		}elseif ($ranking3 > 0){
			$position3 = "<span class='c-green'>⇑+".$ranking3."</span>";
		}
		
		if($ranking4 == 0){
			$position4 = "";
		}elseif($ranking4 < 0){
			$position4 = "<span class='c-red'>⇓".$ranking4."</span>";
		}elseif ($ranking4 > 0){
			$position4 = "<span class='c-green'>⇑+".$ranking4."</span>";
		}
		
		if($ranking5 == 0){
			$position5 = "";
		}elseif($ranking5 < 0){
			$position5 = "<span class='c-red'>⇓".$ranking5."</span>";
		}elseif ($ranking5 > 0){
			$position5 = "<span class='c-green'>⇑+".$ranking5."</span>";
		}

		$totalfights = $query['wons'] + $query['loos'] + $query['draws'];
		
		if ($totalfights == 0) {
			$siegprozent                = 0;
			$loosprozent                = 0;
			$drawsprozent               = 0;
		} else {
			$siegprozent                = 100 / $totalfights * $query['wons'];
			$loosprozent                = 100 / $totalfights * $query['loos'];
			$drawsprozent               = 100 / $totalfights * $query['draws'];
		}
		
		$totalUnits = $query['lostunits'] + $query['desunits'];
		$varLost	= $totalUnits / 100 * $query['lostunits'];
		$varDest	= $totalUnits / 100 * $query['desunits'];
		
		$totalUnits = $query['hostileGain'] + $query['hostileLost'];
		$hosLost	= $totalUnits / 100 * $query['hostileLost'];
		$hosDest	= $totalUnits / 100 * $query['hostileGain'];
		
		$achievArray= array();
		
		foreach($reslist['achievements'] as $Achiev){
			if($query[$resource[$Achiev]] < 5) continue;
			
			$achievArray[$Achiev] = array(
				'level' => $query[$resource[$Achiev]]
			);
		}
				
		$this->assign(array(
			'id'			=> $PlayerID,
			'achievArray'	=> $achievArray,
			'p_name'		=> $query['p_name'],
			'expe_barbar'	=> $query['expe_barbar'],
			'expe_pirat'	=> $query['expe_pirat'],
			'expe_ancie'	=> $query['expe_ancie'],
			'expe_ruin'		=> $query['expe_ruin'],
			'newPosArm'		=> $position1,
			'newPosBui'		=> $position2,
			'newPosFle'		=> $position3,
			'newPosDef'		=> $position4,
			'newPosResa'	=> $position5,
			'p_country'		=> $query['p_country'],
			'p_city'		=> $query['p_city'],
			'p_age'			=> $query['p_age'],
			'yourid'		=> $USER['id'],
			'name'			=> $query['displayname'],
			'registered_on'	=> _date($LNG['php_tdformat'], $query['register_time'], $USER['timezone']),
			'commanderLevel'=> $query['commanderLevel'],
			'commanderPirce'=> min((100 / 1000 * $query['commanderExpe']), 100),
			'homeplanet'	=> $query['name'],
			'galaxy'		=> $query['galaxy'],
			'pointofwar'	=> $query['pointofwar'],
			'system'		=> $query['system'],
			'planet'		=> $query['planet'],
			'allyid'		=> $query['ally_id'],
			'armement_rank' => pretty_number($query['armement_rank']),
			'armement_points'=> pretty_number($query['armement_points']),
			'tech_rank'     => pretty_number($query['tech_rank']),
			'tech_points'   => pretty_number($query['tech_points']),
			'build_rank'    => pretty_number($query['build_rank']),
			'build_points'  => pretty_number($query['build_points']),
			'defs_rank'     => pretty_number($query['defs_rank']),
			'defs_points'   => pretty_number($query['defs_points']),
			'fleet_rank'    => pretty_number($query['fleet_rank']),
			'fleet_points'  => pretty_number($query['fleet_points']),
			'total_rank'    => pretty_number($query['total_rank']),
			'total_points'  => pretty_number($query['total_points']),
			'allyname'		=> $query['ally_name'],
			'playerdestory' => sprintf($LNG['pl_destroy'], $query['displayname']),
			'wons'          => pretty_number($query['wons']),
			'loos'          => pretty_number($query['loos']),
			'draws'         => pretty_number($query['draws']),
			'kbmetal'       => pretty_number($query['kbmetal']),
			'kbcrystal'     => pretty_number($query['kbcrystal']),
			'lostunits'     => pretty_number($query['lostunits']),
			'desunits'      => pretty_number($query['desunits']),
			'hostileLost'   => pretty_number($query['hostileLost']),
			'hostileGain'   => pretty_number($query['hostileGain']),
			'totalfights'   => pretty_number($totalfights),
			'siegprozent'   => round($siegprozent, 2),
			'loosprozent'   => round($loosprozent, 2),
			'drawsprozent'  => round($drawsprozent, 2),
			'lostunits1'    => max(1,$query['lostunits']),
			'desunits1'     => max(1,$query['desunits']),
			'hostileLost1'  => max(1,$query['hostileLost']),
			'hostileGain1'  => max(1,$query['hostileGain']),
			'varLost'    	=> min(100,$varLost),
			'varDest'    	=> min(100,$varDest),
			'hosLost'    	=> min(100,$hosLost),
			'hosDest'    	=> min(100,$hosDest),
		));
		
		$this->display('page.playerCard.default.tpl');
	}
}