<?php

define('MODE', 'BANNER');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);

require 'includes/common.php';


if ($_POST["key"] == "5xoRdPx57")
{
	$already_voted 	= $_POST["already_voted"];
	$ip 			= $_POST["ip"];
	$custom 		= $_POST["custom"];
		 
	if($already_voted == 0 && !empty($custom)){
		$sql	= "UPDATE %%USETT%% SET gametoorTime = :time WHERE id = :userId;";
		database::get()->update($sql, array(
			':time'			=> TIMESTAMP,
			':userId'		=> $custom
		));	
		$sql	= "UPDATE %%USERS%% SET darkmatter = darkmatter + 25 WHERE id = :userId;";
		database::get()->update($sql, array(
			':userId'		=> $custom
		));	
	}
}	
?> 