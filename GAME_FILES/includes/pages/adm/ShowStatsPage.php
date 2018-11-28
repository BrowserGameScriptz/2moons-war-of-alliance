<?php

/**
 *  2Moons
 *  Copyright (C) 2012 Jan Kröpke
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package 2Moons
 * @author Jan Kröpke <info@2moons.cc>
 * @copyright 2012 Jan Kröpke <info@2moons.cc>
 * @license http://www.gnu.org/licenses/gpl.html GNU GPLv3 License
 * @version 1.7.2 (2013-03-18)
 * @info $Id$
 * @link http://2moons.cc/
 */

if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) throw new Exception("Permission error!");

function ShowStatsPage() 
{
	global $LNG, $USER;

	$CONF	= Config::getAll(NULL, $_SESSION['adminuni']);

	if ($_POST)
	{
		$config_before = array(
			'stat_settings' 	=> $CONF['stat_settings'], 
			'stat' 				=> $CONF['stat'],
			'stat_level' 		=> $CONF['stat_level'],
		);
		
		$stat_settings				= HTTP::_GP('stat_settings', 0);
		$stat 						= HTTP::_GP('stat', 0);
		$stat_level					= HTTP::_GP('stat_level', 0);
		
		$config_after = array(
			'stat_settings'		=> $stat_settings, 
			'stat'				=> $stat,
			'stat_level' 		=> $stat_level
		);

		Config::update($config_after, $_SESSION['adminuni']);
		$CONF	= Config::getAll(NULL, $_SESSION['adminuni']);
		
		$LOG = new Log(3);
		$LOG->target = 2;
		$LOG->old = $config_before;
		$LOG->new = $config_after;
		$LOG->save();
	}
	
	$free = shell_exec('free');
	$free = (string)trim($free);
	$free_arr = explode("\n", $free);
	$mem = explode(" ", $free_arr[1]);
	$mem = array_filter($mem);
	$mem = array_merge($mem);
	$memory_usage = $mem[2]/$mem[1]*100;
		
	$QueryCSearch	 = "SELECT COUNT(id) AS total FROM ".USERS." ";
	$QueryCSearch	.= "WHERE onlinetime >= '".(TIMESTAMP - 15 * 60)."';";
	$CountQuery		= $GLOBALS['DATABASE']->getFirstRow($QueryCSearch);
	
	$template	= new template();
	$template->assign_vars(array(	
		'stat_level'		=> $CONF['stat_level'],
		'stat'				=> $CONF['stat'],
		'stat_settings'		=> $CONF['stat_settings'],
		'Selector'			=> array(1 => $LNG['cs_yes'], 2 => $LNG['cs_no_view'], 0 => $LNG['cs_no']),
		'adminName'			=> $USER['username'],
		'domainHost'		=> $_SERVER['HTTP_HOST'],
		'membersOnline'		=> pretty_number($CountQuery['total']),
		'serverLoad'		=> round($memory_usage,2),
	));
		
	$template->show('StatsPage.tpl');
}