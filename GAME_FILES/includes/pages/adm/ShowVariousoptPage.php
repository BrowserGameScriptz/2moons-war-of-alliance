<?php

if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) throw new Exception("Permission error!");

function ShowPlayerlistPage()
{
	global $LNG, $USER;
	if ($_GET['delete'] == 'user') {
        PlayerUtil::deletePlayer((int) $_GET['user']);
        message($LNG['se_delete_succes_p'], '?page=search&search=users&minimize=on', 2);
	} elseif ($_GET['delete'] == 'planet'){
		PlayerUtil::deletePlanet((int) $_GET['planet']);
        message($LNG['se_delete_succes_p'], '?page=search&search=planet&minimize=on', 2);
    }	
	$template	= new template();
	$Minimize			= "&amp;minimize=on";
	$template->assign_vars(array(	
		'minimize'	=> 'checked = "checked"',
		'diisplaay'	=> 'style="display:none;"',
	));
	$OnlineList	= array();
	$QuerySearch	= $GLOBALS['DATABASE']->query("SELECT id,username,email_2,onlinetime,register_time,user_lastip,authlevel,bana,urlaubs_modus FROM ".USERS." 
		WHERE universe = ".ROOT_UNI." ORDER BY id ASC;");
	while ($WhileResult	= $GLOBALS['DATABASE']->fetch_array($QuerySearch)){
		$OnlineList[$WhileResult['id']]	= array(
			'username'		=> $WhileResult['username'],
			'email_2'		=> $WhileResult['email_2'],
			'onlinetime'	=> _date($LNG['php_tdformat'], $WhileResult['onlinetime'] , $USER['timezone']),
			'register_time'	=> _date($LNG['php_tdformat'], $WhileResult['register_time'] , $USER['timezone']),
			'user_lastip'	=> $WhileResult['user_lastip'],
			'authlevel'		=> $LNG['rank'][$WhileResult['authlevel']],
			'bana'			=> $WhileResult['bana'],
			'urlaubs_modus'	=> $WhileResult['urlaubs_modus'],
		);	
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
	
	$template->assign_vars(array(	
		'OnlineList'			=> $OnlineList,
		'adminName'				=> $USER['username'],
		'domainHost'			=> $_SERVER['HTTP_HOST'],
		'membersOnline'			=> pretty_number($CountQuery['total']),
		'serverLoad'			=> round($memory_usage,2),
	));
	$template->show('allplayerlist.tpl');
}

function ShowPlanetlistPage()
{
	global $LNG, $USER;
	if ($_GET['delete'] == 'user') {
        PlayerUtil::deletePlayer((int) $_GET['user']);
        message($LNG['se_delete_succes_p'], '?page=search&search=users&minimize=on', 2);
	} elseif ($_GET['delete'] == 'planet'){
		PlayerUtil::deletePlanet((int) $_GET['planet']);
        message($LNG['se_delete_succes_p'], '?page=search&search=planet&minimize=on', 2);
    }	
	$template	= new template();	
	$Minimize			= "&amp;minimize=on";
	$template->assign_vars(array(	
		'minimize'	=> 'checked = "checked"',
		'diisplaay'	=> 'style="display:none;"',
	));
	
	$OnlineList	= array();
	$QuerySearch	= $GLOBALS['DATABASE']->query("SELECT id,name,last_update,galaxy,system,planet,id_luna, id_owner FROM ".PLANETS." 
		WHERE universe = ".ROOT_UNI." AND planet_type = 1 ORDER BY id ASC;");
	while ($WhileResult	= $GLOBALS['DATABASE']->fetch_array($QuerySearch)){
		if(!empty($WhileResult['id_owner']))
			$userName	= $GLOBALS['DATABASE']->getFirstRow("SELECT id, username FROM ".USERS." WHERE id = ".$WhileResult['id_owner'].";");
		
		$OnlineList[$WhileResult['id']]	= array(
			'name'		=> $WhileResult['name'],
			'userName'		=> !empty($WhileResult['id_owner']) ? $userName['username'] : "Asteroid",
			'userID'		=> !empty($WhileResult['id_owner']) ? $userName['id'] : 9999,
			'galaxy'		=> $WhileResult['galaxy'],
			'system'		=> $WhileResult['system'],
			'planet'		=> $WhileResult['planet'],
			'lastact'		=> pretty_time(TIMESTAMP - $WhileResult['last_update']),
			'id_luna'		=> $WhileResult['id_luna'],
			
		);	
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
	
	$template->assign_vars(array(	
		'titlePage'				=> "Planets List",
		'OnlineList'			=> $OnlineList,
		'adminName'				=> $USER['username'],
		'domainHost'			=> $_SERVER['HTTP_HOST'],
		'membersOnline'			=> pretty_number($CountQuery['total']),
		'serverLoad'			=> round($memory_usage,2),
	));
	$template->show('allplanetlist.tpl');
}

function ShowPlanetalistPage()
{
	global $LNG, $USER;
	if ($_GET['delete'] == 'user') {
        PlayerUtil::deletePlayer((int) $_GET['user']);
        message($LNG['se_delete_succes_p'], '?page=search&search=users&minimize=on', 2);
	} elseif ($_GET['delete'] == 'planet'){
		PlayerUtil::deletePlanet((int) $_GET['planet']);
        message($LNG['se_delete_succes_p'], '?page=search&search=planet&minimize=on', 2);
    }	
	$template	= new template();	
	$Minimize			= "&amp;minimize=on";
	$template->assign_vars(array(	
		'minimize'	=> 'checked = "checked"',
		'diisplaay'	=> 'style="display:none;"',
	));
	
	$OnlineList	= array();
	$QuerySearch	= $GLOBALS['DATABASE']->query("SELECT id,name,last_update,galaxy,system,planet,id_luna, id_owner FROM ".PLANETS." 
		WHERE universe = 1 AND planet_type = 1 AND last_update >= ".(TIMESTAMP - 60 * 60)." ORDER BY id ASC;");
	while ($WhileResult	= $GLOBALS['DATABASE']->fetch_array($QuerySearch)){
		if(!empty($WhileResult['id_owner']))
			$userName	= $GLOBALS['DATABASE']->getFirstRow("SELECT id, username FROM ".USERS." WHERE id = ".$WhileResult['id_owner'].";");
		
		$OnlineList[$WhileResult['id']]	= array(
			'name'		=> $WhileResult['name'],
			'userName'		=> !empty($WhileResult['id_owner']) ? $userName['username'] : "Asteroid",
			'userID'		=> !empty($WhileResult['id_owner']) ? $userName['id'] : 9999,
			'galaxy'		=> $WhileResult['galaxy'],
			'system'		=> $WhileResult['system'],
			'planet'		=> $WhileResult['planet'],
			'lastact'		=> pretty_time(TIMESTAMP - $WhileResult['last_update']),
			'id_luna'		=> $WhileResult['id_luna'],
			
		);	
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
	
	$template->assign_vars(array(	
		'titlePage'			=> "Planet List - Active",
		'OnlineList'		=> $OnlineList,
		'adminName'			=> $USER['username'],
		'domainHost'		=> $_SERVER['HTTP_HOST'],
		'membersOnline'		=> pretty_number($CountQuery['total']),
		'serverLoad'		=> round($memory_usage,2),
	));
	$template->show('allplanetlist.tpl');
}

function ShowMoonlistPage()
{
	global $LNG, $USER;
	if ($_GET['delete'] == 'user') {
        PlayerUtil::deletePlayer((int) $_GET['user']);
        message($LNG['se_delete_succes_p'], '?page=search&search=users&minimize=on', 2);
	} elseif ($_GET['delete'] == 'planet'){
		PlayerUtil::deletePlanet((int) $_GET['planet']);
        message($LNG['se_delete_succes_p'], '?page=search&search=planet&minimize=on', 2);
    }	
	$template	= new template();	
	$Minimize			= "&amp;minimize=on";
	$template->assign_vars(array(	
		'minimize'	=> 'checked = "checked"',
		'diisplaay'	=> 'style="display:none;"',
	));

	$OnlineList	= array();
	$QuerySearch	= $GLOBALS['DATABASE']->query("SELECT id,name,last_update,galaxy,system,planet,id_luna, id_owner FROM ".PLANETS." 
		WHERE universe = ".ROOT_UNI." AND planet_type != 1 ORDER BY id ASC;");
	while ($WhileResult	= $GLOBALS['DATABASE']->fetch_array($QuerySearch)){
		$userName	= $GLOBALS['DATABASE']->getFirstRow("SELECT id, username FROM ".USERS." 
		WHERE id = ".$WhileResult['id_owner'].";");
		
		$OnlineList[$WhileResult['id']]	= array(
			'name'		=> $WhileResult['name'],
			'userName'		=> $userName['username'],
			'userID'		=> $userName['id'],
			'galaxy'		=> $WhileResult['galaxy'],
			'system'		=> $WhileResult['system'],
			'planet'		=> $WhileResult['planet'],
			'lastact'		=> pretty_time(TIMESTAMP - $WhileResult['last_update']),
			'id_luna'		=> $WhileResult['id_luna'],
			
		);	
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
	
	$template->assign_vars(array(	
		
		'titlePage'			=> "Moon List",
		'OnlineList'		=> $OnlineList,
		'adminName'			=> $USER['username'],
		'domainHost'		=> $_SERVER['HTTP_HOST'],
		'membersOnline'		=> pretty_number($CountQuery['total']),
		'serverLoad'		=> round($memory_usage,2),
	));
	$template->show('allplanetlist.tpl');
}

function ShowMoonalistPage()
{
	global $LNG, $USER;
	if ($_GET['delete'] == 'user') {
        PlayerUtil::deletePlayer((int) $_GET['user']);
        message($LNG['se_delete_succes_p'], '?page=search&search=users&minimize=on', 2);
	} elseif ($_GET['delete'] == 'planet'){
		PlayerUtil::deletePlanet((int) $_GET['planet']);
        message($LNG['se_delete_succes_p'], '?page=search&search=planet&minimize=on', 2);
    }	
	$template	= new template();	
	$Minimize			= "&amp;minimize=on";
	$template->assign_vars(array(	
		'minimize'	=> 'checked = "checked"',
		'diisplaay'	=> 'style="display:none;"',
	));
	
	$OnlineList	= array();
	$QuerySearch	= $GLOBALS['DATABASE']->query("SELECT id,name,last_update,galaxy,system,planet,id_luna, id_owner FROM ".PLANETS." 
		WHERE universe = ".ROOT_UNI." AND planet_type != 1 AND last_update >= ".(TIMESTAMP - 60 * 60)." ORDER BY id ASC;");
	while ($WhileResult	= $GLOBALS['DATABASE']->fetch_array($QuerySearch)){
		$userName	= $GLOBALS['DATABASE']->getFirstRow("SELECT id, username FROM ".USERS." 
		WHERE id = ".$WhileResult['id_owner'].";");
		
		$OnlineList[$WhileResult['id']]	= array(
			'name'		=> $WhileResult['name'],
			'userName'		=> $userName['username'],
			'userID'		=> $userName['id'],
			'galaxy'		=> $WhileResult['galaxy'],
			'system'		=> $WhileResult['system'],
			'planet'		=> $WhileResult['planet'],
			'lastact'		=> pretty_time(TIMESTAMP - $WhileResult['last_update']),
			'id_luna'		=> $WhileResult['id_luna'],
			
		);	
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
	
	$template->assign_vars(array(	
		
		'titlePage'			=> "Moon List - Active",
		'OnlineList'		=> $OnlineList,
		'adminName'			=> $USER['username'],
		'domainHost'		=> $_SERVER['HTTP_HOST'],
		'membersOnline'		=> pretty_number($CountQuery['total']),
		'serverLoad'		=> round($memory_usage,2),
	));
	$template->show('allplanetlist.tpl');
}