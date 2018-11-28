<?php

define('MODE', 'AJAX');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);

require 'includes/common_ajax.php';

$timestamp  = HTTP::_GP('_', 0);

$sql	= "SELECT * FROM %%CHAT%% WHERE timestamp = :timestamp;";
$chatInfo	= databaseajax::get()->select($sql, array(
	':timestamp'	=> $timestamp
)); 

$echoMsg = array();
foreach($chatInfo as $chatMsg){
	

}

$succesArray = array("global"=> [array("text"=> "Someone hospitalized dudekevin9", "secondssince"=> 0.52698400000000001, "id"=> "5960c5d15c2b94d04b8b456a")], "chat"=> [array("text"=> "Flower says: Yea I talked with Flowey and she told me to level out", "secondssince"=> 16, "id"=> "1499514305-9814213")]);

echo json_encode($succesArray);