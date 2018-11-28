<?php
define('MODE', 'JSON');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);

require 'includes/chat/common_json.php';

$session    = Session::load();
if(!$session->isValidSession()){
	$session->delete();
	HTTP::redirectTo('index.php?code=3');
}
$sql	= "SELECT * FROM %%USERS%% WHERE id = :userId;";
$USER	= database::get()->selectSingle($sql, array(
':userId'	=> $session->userId
)); 
	
if(empty($USER) || $USER['chat_silence'] > TIMESTAMP || $USER['isChat'] == 1)
	exit();

$message 		= HTTP::_GP('message', '', UTF8_SUPPORT);
$messageCheck 	= HTTP::_GP('message', '', UTF8_SUPPORT);

$mystring 		= str_replace(" ", "", $messageCheck);
$mystring 		= preg_replace('/[^A-Za-z0-9\-]/', '', $mystring); // Removes special chars.
$mystring 		= strtolower($mystring);

$sql			= 'SELECT * FROM %%BLACKLIST%%;';
$blackList 		= Database::get()->select($sql, array());
$isFound 		= 0;
$blackWord 		= "";
foreach($blackList as $word){
	if(strpos($mystring, $word['blackText']) !== false){
		$isFound 	+= 1;
		$blackWord 	= $word['blackText'];
	}
}
	
if ($isFound != 0) {
    $sql = "UPDATE %%USERS%% SET isChat = :isChat, chat_silence = :chat_silence WHERE id = :userId;";
	Database::get()->update($sql, array(
		':isChat'	=> 1,
		':chat_silence'	=> TIMESTAMP + 500*3600*24,
		':userId'	=> $USER['id']
	));
}else{
	if($message == '')
		exit();
	
	$sql	= "SELECT displayname FROM %%USETT%% WHERE id = :userId;";
	$USETT	= database::get()->selectSingle($sql, array(
		':userId'	=> $session->userId
	)); 
	
	$ally_id 	= HTTP::_GP('ally', 0) == $USER['ally_id'] ? $USER['ally_id'] : 0;
	$valCusNick = empty($USETT['displayname']) ? $USER['username'] : $USETT['displayname'];
	
	$username	= $valCusNick;
	if($USER['chat_oper'] == 1)
		$username	= $valCusNick;
	if($USER['gm'] == 1)
		$username	= $valCusNick;
	if($USER['authlevel'] == 3)
		$username	= $valCusNick;

	$_SESSION['last_read'] = 0;

	$ally 	 	 = HTTP::_GP('ally', 0);
	$message 	 = HTTP::_GP('message', '', UTF8_SUPPORT);
	$msgId 		 = database::get()->lastInsertId();
	$sql 		 = "INSERT INTO %%CHAT%% SET messageid = :messageid, user = :user, iduser = :iduser, message = :message, timestamp = :timestamp, ally_id = :ally_id;";
	database::get()->insert($sql, array(
		':messageid'	=> $msgId,
		':user'			=> $valCusNick,
		':iduser'		=> $USER['id'],
		':message'		=> $USER['id'] == 1 ? $message : strtolower($message),
		':timestamp'	=> TIMESTAMP,
		':ally_id'		=> $ally_id
	));
}