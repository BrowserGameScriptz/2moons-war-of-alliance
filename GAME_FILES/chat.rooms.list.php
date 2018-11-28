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
$USER	= Database::get()->selectSingle($sql, array(
':userId'	=> $session->userId
));

$LNG = new Language($USER['lang']);
$LNG->includeData(array('L18N', 'BANNER', 'CUSTOM', 'INGAME'));

$name 		= HTTP::_GP('search_text', '', true);
$jsonData	= array();

$jsonData['RoomsList']	= "<table id='mytable' class='tablesorter ally_ranks lots'>";
$jsonData['RoomsList']	.= "<tr>";
$jsonData['RoomsList']	.= "<th class='gray_stripe' style='width:15px;'>ID</th>";
$jsonData['RoomsList']	.= "<th class='gray_stripe'>".$LNG['chat_msg11']."</th>";
$jsonData['RoomsList']	.= "<th class='gray_stripe'>".$LNG['chat_msg12']."</th>";
$jsonData['RoomsList']	.= "<th class='gray_stripe' style='width:15px;'>".$LNG['chat_msg17']."</th>";
$jsonData['RoomsList']	.= "<th class='gray_stripe' style='width:30px;'>&nbsp;</th>";


		$db	= Database::get();

		$sql	= 'SELECT * FROM %%CHAT_ROOMS%% WHERE name LIKE :name ORDER BY `name` ASC LIMIT 30';
		$query = $db->select($sql, array(
			':name'	=> '%'.$name.'%'
		));

		
if(!empty($query)){ // если комнат больше нуля, то надо показать их во всей красе
	foreach ($query as $Rows) // В массив $jsonData['RoomsList'] вводим список комнат
	{
		if($Rows['pass'] != '') // Есть пароль? А если найду???
			$Rows['pass'] = "<span style='color:#cf0000'>".$LNG['chat_msg13']."</span>";
		else // Точно нет?
			$Rows['pass'] = "<span style='color:#0c0'>".$LNG['chat_msg14']."</span>";
		
		$jsonData['RoomsList']	.= "<tr>";
		$jsonData['RoomsList']	.= "<td>".$Rows['id']."</td>";
		$jsonData['RoomsList']	.= "<td>".$Rows['name']."</td>";
		$jsonData['RoomsList']	.= "<td>".$Rows['name_owner']."</td>";
		$jsonData['RoomsList']	.= "<td>".$Rows['pass']."</td>";
		$jsonData['RoomsList']	.= "<td><form action='game.php?page=chat' method='POST'>";
		$jsonData['RoomsList']	.= "<input name='mode' value='roomsActions' type='hidden'>";
		$jsonData['RoomsList']	.= "<input name='action' value='login' type='hidden'>";
		$jsonData['RoomsList']	.= "<input name='room' value='".$Rows['id']."' type='hidden'>";
		$jsonData['RoomsList']	.= "<input class='cursor' value='".$LNG['chat_msg15']."' type='submit'>";
		$jsonData['RoomsList']	.= "</form></td>";
		$jsonData['RoomsList']	.= "</tr>";
	}
}else{
	$jsonData['RoomsList']	.= "<tr>";
	$jsonData['RoomsList']	.= "<td colspan=5>".$LNG['chat_msg16']."</td>";
	$jsonData['RoomsList']	.= "</tr>";
}
$jsonData['RoomsList']	.= "</table>";

echo json_encode($jsonData);