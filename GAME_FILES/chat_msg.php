<?php
define('MODE', 'CHAT');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);

require 'includes/chat/common_json.php';
require'includes/chat/cht_message_parse.php';	

$session    = Session::load();
if(!$session->isValidSession()){
	$session->delete();
	HTTP::redirectTo('index.php?code=3');
}

$sql	= "SELECT * FROM %%USERS%% WHERE id = :userId;";
$USER	= database::get()->selectSingle($sql, array(
	':userId'	=> $session->userId
)); 

$sql	= "SELECT * FROM %%USETT%% WHERE id = :userId;";
$USETT	= database::get()->selectSingle($sql, array(
	':userId'	=> $session->userId
)); 

$ally 		= HTTP::_GP('ally', 0);
	
if(HTTP::_GP('online',0) == 1)
{
	$chatonline = '';
	
	$sql	= 'SELECT COUNT(*) as count FROM %%USERS%% WHERE universe = :universe AND onlinetime > :onlineTime';
	$query	= Database::get()->selectSingle($sql, array(
		':universe'	=> Universe::current(),
		':onlineTime'	=> TIMESTAMP - 15 * 60
	));
	
	$sql	= "SELECT COUNT(*) as count FROM %%USERS%% WHERE ally_id = :ally_id AND onlinetime >= :onlinetime;";
	$query2	= database::get()->selectSingle($sql, array(
		':ally_id'		=> $USER['ally_id'],
		':onlinetime'	=> TIMESTAMP - 15 * 60
	));
	
	$chatonline = array($query['count'],$query2['count']);
}

$last_message = HTTP::_GP('last_message', 0);
$chat_line    = array();

$sql	= "SELECT * FROM %%CHAT%% WHERE ally_id = :ally_id AND messageid > :messageid ORDER BY messageid DESC LIMIT 40;";
$query	= database::get()->select($sql, array(
	':ally_id'		=> $ally,
	':messageid'	=> $last_message,
));

foreach($query as $chat_row){
	$nick_stripped = htmlentities(strip_tags($chat_row['user']), ENT_QUOTES, 'utf-8');
	$nick = str_replace(strip_tags($chat_row['user']), $nick_stripped, $chat_row['user']);
		
	$allyTag  = GetFromDatabase('USERS', 'id', $chat_row['iduser'], array('ally_id', 'authlevel', 'gm', 'chat_oper'));
	$allyTag1 = GetFromDatabase('ALLIANCE', 'id', $allyTag['ally_id'], array('ally_tag'));
	
	$nickColor = "";
	if($allyTag['authlevel'] == 3){
		$nickColor = ' style="color:#cc3232;"';
	}elseif($allyTag['gm'] == 1){
		$nickColor = ' style="color:#00cc00;"';
	}elseif($allyTag['chat_oper'] == 1){
		$nickColor = ' style="color:#ffff00;"';
	}
	
	$nick = "<span class=\"chat-name\"".$nickColor." onclick=\"addNick('(".$nick_stripped.")');\">".$nick."</span>";
	
	$chat_line[] = array(
		'TIME' 	=> _date('H:i', $chat_row['timestamp'], $USER['timezone']),
		'DATE' 	=> _date('d. M Y', $chat_row['timestamp'], $USER['timezone']),
		'NICK' 	=> $nick,
		'NICK2' => $nick,
		'ALLYT' => $allyTag['ally_id'] != 0 ? "<span class=\"chat-atag\" onclick=\"parent.Dialog.AllyInfo(".$allyTag['ally_id'].");\">[".$allyTag1['ally_tag']."]</span>" : "",
		'TEXT' 	=> cht_message_parse($chat_row['message']),
		'MSGID' => cht_message_parse($chat_row['messageid']),
		'iduser'=> $chat_row['iduser'],
	);
	$last_message = max($last_message, $chat_row['messageid']);
}

$chat['sound'] = false;

if(HTTP::_GP('last_message', 0) != 0 && HTTP::_GP('last_message', 0) < $last_message)
	$chat['sound'] = true;

if(!empty($chatonline))
	$chat['online'] = $chatonline;

$chat_line    = array_reverse($chat_line);
$chat['html'] = "";

foreach($chat_line as $ID => $row)
{	
	$chat['html'] .='<div class="chat-row"><span class="chat-time">'.$row['TIME'].'</span>&nbsp;<img src="./styles/resource/images/ico/profile.png" align="absmiddle" style="cursor:pointer;" onClick="parent.Dialog.Playercard('.$row['iduser'].');" title="" alt="" />&nbsp;'.$row['ALLYT'].'&nbsp;'.$row['NICK'].': '.$row['TEXT'].'</div>';		
}

$chat['last_message']	= $last_message;
$chat['silence'] 		= $USER['chat_silence'] - TIMESTAMP > 0 ? $USER['chat_silence'] - TIMESTAMP : 0;
$session->last_read 	= TIMESTAMP;

echo json_encode($chat);