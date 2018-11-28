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
 * @version 1.7.3 (2013-05-19)
 * @info $Id: ShowIndexPage.php 2632 2013-03-18 19:05:14Z slaver7 $
 * @link http://2moons.cc/
 */

function ShowIndexPage()
{
	global $CONF, $LNG;
	
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
		'game_name'		=> config::get()->game_name,
		'adm_cp_title'	=> $LNG['adm_cp_title'],
		'adminName'		=> $USER['username'],
		'domainHost'	=> $_SERVER['HTTP_HOST'],
		'membersOnline'	=> pretty_number($CountQuery['total']),
		'serverLoad'	=> round($memory_usage,2),
	));
	
	$template->display('adm/ShowIndexPage.tpl');
}