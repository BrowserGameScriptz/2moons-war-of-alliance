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

require_once('includes/classes/class.GalaxyRows.php');

class ShowGalaxyPage extends AbstractGamePage
{
    public static $requireModule = MODULE_RESEARCH;

	function __construct() 
	{
		parent::__construct();
	}
	
	public function show()
	{
		global $USER, $PLANET, $resource, $LNG, $reslist;
		$config			= Config::get();

		$action 		= HTTP::_GP('action', '');
		$galaxyLeft		= HTTP::_GP('galaxyLeft', '');
		$galaxyRight	= HTTP::_GP('galaxyRight', '');
		$systemLeft		= HTTP::_GP('systemLeft', '');
		$systemRight	= HTTP::_GP('systemRight', '');
		$galaxy			= min(max(HTTP::_GP('sleeve', (int) $PLANET['galaxy']), 1), $config->max_galaxy);
		$system			= min(max(HTTP::_GP('system', (int) $PLANET['system']), 1), $config->max_system);
		$planet			= min(max(HTTP::_GP('planet', (int) $PLANET['planet']), 1), $config->max_planets);
		$type			= HTTP::_GP('type', 1);
		$current		= HTTP::_GP('current', 0);
		
        if (!empty($galaxyLeft))
            $galaxy	= max($galaxy - 1, 1);
        elseif (!empty($galaxyRight))
            $galaxy	= min($galaxy + 1, $config->max_galaxy);

        if (!empty($systemLeft))
            $system	= max($system - 1, 1);
        elseif (!empty($systemRight))
            $system	= min($system + 1, $config->max_system);


        $targetDefensive    = $reslist['defense'];
        $targetDefensive[]	= 502;
		$missileSelector[0]	= $LNG['gl_all_defenses'];
		
		foreach($targetDefensive as $Element)
		{	
			$missileSelector[$Element] = $LNG['tech'][$Element];
		}
		$sql	= 'SELECT total_points
		FROM %%STATPOINTS%%
		WHERE id_owner = :userId AND stat_type = :statType';

		$USER	+= Database::get()->selectSingle($sql, array(
			':userId'	=> $USER['id'],
			':statType'	=> 1
		));
		
		$spyCount = 1;
		if(isset($_COOKIE['spycount']))
			$spyCount = $_COOKIE['spycount'];
		
		$sql	= 'UPDATE %%USERS%% SET spio_anz = :spycount WHERE id = :userId;';
		Database::get()->update($sql, array(
			':userId'	=> $USER['id'],
			':spycount'	=> $spyCount
		));
		
		$sql	= 'SELECT * FROM %%USERS%% WHERE id = :userId;';
		$Google = Database::get()->selectSingle($sql, array(
			':userId'	=> $USER['id']
		));

		$galaxyRows	= new GalaxyRows;
		$galaxyRows->setGalaxy($galaxy);
		$galaxyRows->setSystem($system);
		$Result	= $galaxyRows->getGalaxyData();
		
		$array1 = array("1" => "-16.8% ~ -25.3%", "2" => "-8.3% ~ -16.8%", "3" => "+0.2% ~ -8.3%", "4" => "+8.7% ~ +0.2%", "5" => "+17.2 ~ +8.7%", "6" => "+25.7% ~ +12.2%", "7" => "+25.7% ~ +25.7%", "8" => "+17.2% ~ +25.7%", "9" => "+8.7% ~ +17.2%", "10" => "+0.2% ~ -8.7%", "11" => "-8.3% ~ 0.2%", "12" => "-16.8% ~ -8.3%");
		$array2 = array("1" => "-42.6% ~ -50.4%", "2" => "-34.9% ~ -42.6%", "3" => "-27.1% ~ -34.9%", "4" => "-19.4% ~ -27.1%", "5" => "-11.6 ~ -19.4%", "6" => "-3.9% ~ -11.6%", "7" => "+3.9% ~ -3.9%", "8" => "+11.6% ~ +3.9%", "9" => "+19.4% ~ +11.6%", "10" => "+27.1% ~ +19.4%", "11" => "+34.9% ~ +27.1%", "12" => "+42.6% ~ +34.9%");
		$array3 = array("1" => "+42.6% ~ +50.4%", "2" => "+34.9% ~ +42.6%", "3" => "+27.1% ~ +34.9%", "4" => "+19.4% ~ +27.1%", "5" => "+11.6 ~ +19.4%", "6" => "+3.9% ~ +11.6%", "7" => "-3.9% ~ +3.9%", "8" => "-11.6% ~ -3.9%", "9" => "-19.4% ~ -11.6%", "10" => "-27.1% ~ -19.4%", "11" => "-34.9% ~ -27.1%", "12" => "-42.6% ~ -34.9%");

        //$this->tplObj->loadscript('galaxy.js');
        $this->assign(array(
			'GalaxyRows'				=> $Result,
			'planetcount'				=> sprintf($LNG['gl_populed_planets'], count($Result)),
			'action'					=> $action,
			'galaxy'					=> $galaxy,
			'system'					=> $system,
			'planet'					=> $planet,
			'type'						=> $type,
			'current'					=> $current,
			'array1'					=> $array1,
			'array2'					=> $array2,
			'array3'					=> $array3,
			'maxfleetcount'				=> FleetFunctions::GetCurrentFleets($USER['id']),
			'fleetmax'					=> FleetFunctions::GetMaxFleetSlots($USER),
			'currentmip'				=> $PLANET[$resource[503]],
			'grecyclers'   				=> $PLANET[$resource[219]],
			'coloships'   				=> $PLANET[$resource[208]],
			'recyclers'   				=> $PLANET[$resource[209]],
			'spyprobes'   				=> $PLANET[$resource[210]],
			'missile_count'				=> sprintf($LNG['gl_missil_to_launch'], $PLANET[$resource[503]]),
			'spyShips'					=> array(210 => $Google['spio_anz']),
			'spyShips2'					=> $Google['spio_anz'],
			'settings_fleetactions'		=> $USER['settings_fleetactions'],
			'current_galaxy'			=> $PLANET['galaxy'],
			'current_system'			=> $PLANET['system'],
			'current_planet'			=> $PLANET['planet'],
			'planet_type' 				=> $PLANET['planet_type'],
            'max_galaxy'                => $config->max_galaxy,
            'max_system'                => $config->max_system,
            'max_planets'               => $config->max_planets,
			'missileSelector'			=> $missileSelector,
			'ShortStatus'				=> array(
				'vacation'					=> $LNG['gl_short_vacation'],
				'banned'					=> $LNG['gl_short_ban'],
				'inactive'					=> $LNG['gl_short_inactive'],
				'longinactive'				=> $LNG['gl_short_long_inactive'],
				'noob'						=> $LNG['gl_short_newbie'],
				'strong'					=> $LNG['gl_short_strong'],
				'enemy'						=> $LNG['gl_short_enemy'],
				'friend'					=> $LNG['gl_short_friend'],
				'member'					=> $LNG['gl_short_member'],
			),
		));
		
		$this->display('page.galaxy.default.tpl');
	}
}