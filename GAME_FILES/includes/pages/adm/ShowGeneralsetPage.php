<?php
if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) throw new Exception("Permission error!");



function ShowGeneralsetPage()
{
	global $LNG, $USER;
	
	$CONF	= config::get();
	
	if (!empty($_POST))
	{
		
		$game_logo			= HTTP::_GP('game_logo', '', true);
		$game_fav			= HTTP::_GP('game_fav', '', true);
		$block				= HTTP::_GP('block', 0);
		
		switch ($block) {
			case 1:
				$config_before = array(
					'site_title'	=> $CONF->site_title,
					'admin_name'	=> $CONF->admin_name,
					'admin_email'	=> $CONF->admin_email,
				);
				
				$site_title			= HTTP::_GP('site_title', '', true);
				$admin_name			= HTTP::_GP('admin_name', '', true);
				$admin_email		= HTTP::_GP('admin_email', '', true);
				
				if(strpos($_SERVER['HTTP_HOST'], 'warofalliance.com') !== false)
					$site_title = $CONF->site_title;
				
				if (!ValidateAddress($admin_email)) 
					$admin_email = $CONF->admin_email;
				
				$config_after = array(
					'site_title'	=> $site_title,
					'admin_name'	=> $admin_name,
					'admin_email'	=> $admin_email,
				);
			break;
			case 2:
				$config_before = array(
					'timezone'		=> $CONF->timezone,
					'dateFormat'	=> $CONF->dateFormat,
					'timeFormat'	=> $CONF->timeFormat,
					'isShortly'		=> $CONF->isShortly,
				);
				
				$timezone			= HTTP::_GP('timezone', '');
				$dateFormat			= HTTP::_GP('dateFormat', 1);
				$dateFormatAllowed	= array(1, 2, 3, 4, 5);
				$timeFormat			= HTTP::_GP('timeFormat', 1);
				$timeFormatAllowed	= array(1, 2, 3, 4);
				$isShortly			= HTTP::_GP('isShortly', 0);
				
				if(!in_array($dateFormat, $dateFormatAllowed))
					$dateFormat = 1;
				if(!in_array($timeFormat, $timeFormatAllowed))
					$timeFormat = 1;
				
				$config_after = array(
					'timezone'		=> $timezone,
					'dateFormat'	=> $dateFormat,
					'timeFormat'	=> $timeFormat,
					'isShortly'		=> $isShortly,
				);
			break;
			case 3:
				$config_before = array(
					'site_logo'		=> $CONF->site_logo,
					'site_favicon'	=> $CONF->site_favicon,
				);
				
				$site_logo			= HTTP::_GP('game_logo', "", true);
				$site_favicon		= HTTP::_GP('game_fav', "", true);

				$config_after = array(
					'site_logo'		=> $site_logo,
					'site_favicon'	=> $site_favicon,
				);
			break;
		}
		
		foreach($config_after as $key => $value)
		{
			$config->$key	= $value;
		}
		$config->save();
		
		$LOG = new Log(3);
		$LOG->target = 1;
		$LOG->old = $config_before;
		$LOG->new = $config_after;
		$LOG->save();
	}
	
	$isSubdomain = 0;
	if(strpos($_SERVER['HTTP_HOST'], 'makeyourgame.pro') !== false)
		$isSubdomain = 1;
	
	$TimeZones		= get_timezone_selector();
	
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
		'isSubdomain'		=> $isSubdomain, 
		'timezone'			=> $CONF->timezone, 
		'isShortly'			=> $CONF->isShortly, 
		'timeFormat'		=> $CONF->timeFormat, 
		'dateFormat'		=> $CONF->dateFormat, 
		'site_title'		=> $CONF->site_title, 
		'admin_name'		=> $CONF->admin_name,
		'admin_email'		=> $CONF->admin_email,
		'site_logo'			=> $CONF->site_logo,
		'site_favicon'		=> $CONF->site_favicon,
		'myurl'				=> $_SERVER['HTTP_HOST'],
		'adminName'			=> $USER['username'],
		'domainHost'		=> $_SERVER['HTTP_HOST'],
		'Selector'			=> array('timezone' => $TimeZones),
		'membersOnline'		=> pretty_number($CountQuery['total']),
		'serverLoad'		=> round($memory_usage,2),
		
	));
	
	$template->show('ShowGeneralSet.tpl');
}

function ShowMetaPage()
{
	global $LNG, $USER;

	$CONF	= config::get();
	
	if (!empty($_POST))
	{
		$config_before = array(
			'meta_title'	=> $CONF->meta_title,
			'meta_descrip'	=> $CONF->meta_descrip,
		);
		
		$meta_title			= HTTP::_GP('meta_title', '', true);
		$meta_descrip		= HTTP::_GP('meta_descrip', '', true);
		
		$config_after = array(
			'meta_title'	=> $meta_title,
			'meta_descrip'	=> $meta_descrip,
			'membersOnline'	=> pretty_number($CountQuery['total']),
			'serverLoad'	=> round($memory_usage,2),
		);
		
		foreach($config_after as $key => $value)
		{
			$config->$key	= $value;
		}
		$config->save();
		
		$LOG = new Log(3);
		$LOG->target = 1;
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
		'meta_title'		=> $CONF->meta_title,
		'meta_descrip'		=> $CONF->meta_descrip,
		'adminName'			=> $USER['username'],
		'domainHost'		=> $_SERVER['HTTP_HOST'],
		'membersOnline'		=> pretty_number($CountQuery['total']),
		'serverLoad'		=> round($memory_usage,2),
	));

	$template->show('ShowMetaSet.tpl');
}

