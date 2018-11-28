<?php

define('MODE', 'LOGIN');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);
require 'includes/common.php';

$phase  = HTTP::_GP('phase', 0);


if($phase == 16){
	$session = session::load();
	if(!$session->isValidSession()){
		exit;
	}
	
	$avatarId  = HTTP::_GP('id', 0);
	
	$sql = "SELECT avatar, avatar_change FROM %%USETT%% WHERE id = :userId;";
	$ajaxData = database::get()->selectSingle($sql, array(
		':userId' 		=> $session->userId,
	));
	
	if($ajaxData['avatar_change'] > TIMESTAMP){
		$Data = "You can change your avatar only one time per week.";
	}else{
		$sql = "UPDATE %%USETT%% SET avatar = :avatar, avatar_change = :avatar_change WHERE id = :userId;";
		database::get()->update($sql, array(
			':avatar' 		=> $avatarId == 0 ? "logo_avatar.jpg" : "rookie_avatar_".($avatarId+1).".jpg",
			':avatar_change'=> TIMESTAMP + 604800,
			':userId' 		=> $session->userId,
		));
		$Data = "OK";
	}
	echo $Data;
}