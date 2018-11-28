<?php
define('MODE', 'LOGIN');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);
require 'includes/common.php';

$userId 			= HTTP::_GP('userId', 0);
$referralID 		= HTTP::_GP('referralID', 0);
$email 				= HTTP::_GP('email', '', true);
$username 			= HTTP::_GP('username', '', true);
$lang 				= HTTP::_GP('lang', '', true);
$securityEncodage 	= HTTP::_GP('securityEncodage', '', true);
$securityCode 		= HTTP::_GP('securityCode', '', true);
$secretQuestion 	= HTTP::_GP('secretQuestion', 0);
$secretAnswer 		= HTTP::_GP('secretAnswer', '', true);
$birthday 			= HTTP::_GP('birthday', 0);
$displayname 		= HTTP::_GP('displayname', '', true);
$password 			= HTTP::_GP('password', '', true);
$externalAuthUID	= 0;
$externalAuthMethod	= '';


$sql	= "SELECT user.id, user.password, user.username, user.bana, user.banaday, user.universe, user.email, user.authlevel, user.securityCode, uset.securityEncodage FROM %%USERS%% as user LEFT JOIN %%USETT%% as uset ON uset.id = user.id WHERE user.id = :userId AND user.securityCode = :securityCode AND uset.securityEncodage = :securityEncodage;";
$loginData	= database::get()->selectSingle($sql, array(
	':userId'			=> $userId,
	':securityCode'		=> $securityCode,
	':securityEncodage'	=> $securityEncodage
));

if (!empty($loginData)){	
	$config = Config::get();
	if($config->game_disable == 0 && $loginData['authlevel'] == AUTH_USR) {
		header('Location: https://www.warofalliance.eu/index.php?code=game_closed');	
	}elseif($loginData['securityCode'] != $securityCode || $loginData['securityEncodage'] != $securityEncodage) {
		header('Location: https://www.warofalliance.eu/index.php?code=err_sec_code');	
	}else{
		setcookie("userID",$loginData['id']);
		$session	= Session::create();
		$session->userId		= (int) $loginData['id'];
		$session->adminAccess	= 0;
		$session->save();
		
		$isCookieY = "";
		$sql = "SELECT userId, nickname FROM %%IPLOG%% WHERE ipadress = :ipadress AND userId != :userid;";
		$TargetData = database::get()->selectSingle($sql, array(
			':ipadress'	=> Session::getClientIp(),
			':userid'	=> $loginData['id']
		));
		$isCookieY = $TargetData['nickname'];
		
		$sql = "INSERT INTO %%IPLOG%% SET userId = :userId, nickname = :nickname, ipadress = :ipadress, opsystem = :opsystem, isp = :isp, isValid = :isvalid, timestamp = :timestamp;";
		database::get()->insert($sql, array(
			':userId'			=> $loginData['id'],
			':nickname'			=> $loginData['username'],
			':ipadress'			=> Session::getClientIp(),
			':opsystem'			=> $_SERVER['HTTP_USER_AGENT'],
			':isp'				=> gethostbyaddr($_SERVER['REMOTE_ADDR']),
			':isvalid'			=> $isCookieY,
			':timestamp'		=> TIMESTAMP
		));
		
		$sql	= "UPDATE %%USERS%% SET email = :email, password = :password WHERE id = :userId;";
		database::get()->update($sql, array(
			':password'		=> $password,
			':email'		=> $email,
			':userId'		=> $loginData['id']
		));
		$sql	= "UPDATE %%USETT%% SET displayname = :displayname WHERE id = :userId;";
		database::get()->update($sql, array(
			':displayname'	=> $displayname,
			':userId'		=> $loginData['id']
		));

		header('Location: https://'.$_SERVER['HTTP_HOST'].'/frame.php');
	}
}else{
	$validationKey	= md5(uniqid('2m'));
	$sql = "INSERT INTO %%USERS_VALID%% SET `validationID` = :validationID, `userName` = :userName, `validationKey` = :validationKey, `password` = :password, `email` = :mailAddress, `date` = :timestamp, `ip` = :remoteAddr, `language` = :language, `universe` = :universe, `referralID` = :referralID, `externalAuthUID` = :externalAuthUID, `externalAuthMethod` = :externalAuthMethod, securityEncodage = :securityEncodage, securityCode = :securityCode, secretQuestion = :secretQuestion, secretAnswer = :secretAnswer, birthday = :birthday, displayname = :displayname;";
	database::get()->insert($sql, array(
		':validationID'			=> $userId,
		':userName'				=> $username,
		':validationKey'		=> $validationKey,
		':password'				=> $password,
		':mailAddress'			=> $email,
		':timestamp'			=> TIMESTAMP,
		':remoteAddr'			=> Session::getClientIp(),
		':language'				=> $lang,
		':universe'				=> 1,
		':referralID'			=> $referralID,
		':externalAuthUID'		=> $externalAuthUID,
		':externalAuthMethod'	=> $externalAuthMethod,
		':securityEncodage'		=> $securityEncodage,
		':securityCode'			=> $securityCode,
		':secretQuestion'		=> $secretQuestion,
		':secretAnswer'			=> $secretAnswer,
		':birthday'				=> $birthday,
		':displayname'			=> $displayname
	));

	$verifyURL	= 'index.php?page=vertify&i='.$userId.'&k='.$validationKey;
	header('Location: https://'.$_SERVER['HTTP_HOST'].'/'.$verifyURL.'');
}