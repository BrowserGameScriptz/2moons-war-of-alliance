<?php

define('MODE', 'INGAME');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);

require 'includes/common.php';

$attack = HTTP::_GP('attack', 0);
$destr	= HTTP::_GP('destr', 0);
$ajax	= HTTP::_GP('ajax', 0);

//MESSAGE PART
$totalUnread = "";
$sql	= 'SELECT COUNT(*) as count FROM %%MESSAGES%% WHERE message_owner = :userId AND message_unread = 1;';
$totalUnread	= Database::get()->selectSingle($sql, array(
	':userId'	=> $USER['id'],
));

$totalUnread = $totalUnread['count'];	

//END MESSAGE PART

//ATTACK PART
$sql	= 'SELECT COUNT(*) as count FROM %%FLEETS%% WHERE fleet_target_owner = :userId AND fleet_mission = 1 AND fleet_mess = 0';
$totalAttacks	= Database::get()->selectSingle($sql, array(
	':userId'	=> $USER['id']
));

$totalAttacks = $totalAttacks['count'];	

//END ATTACK PART

//unic PART
$sql	= 'SELECT COUNT(*) as count FROM %%FLEETS%% WHERE fleet_target_owner = :userId AND fleet_mission = 9 AND fleet_mess = 0';
$unicAttacks	= Database::get()->selectSingle($sql, array(
	':userId'	=> $USER['id']
));

$unicAttacks = $unicAttacks['count'];	

//END unic PART

$db = database::get();
$sql = "SELECT COUNT(*) as count FROM %%FLEETS%% WHERE fleet_owner = :userID AND fleet_mission <> 10 ORDER BY fleet_end_time ASC;";
$activeFleetSlots = $db->selectSingle($sql, array(
	':userID'   => $USER['id']
));

$techExpedition      = $USER[$resource[154]];

$activeExpedition 	= 0;
if ($techExpedition >= 1)
{
	$activeExpedition   = FleetFunctions::GetCurrentFleets($USER['id'], 15, true);
}

$sql = "SELECT * FROM %%FLEETS%% WHERE fleet_owner = :userID AND fleet_mission = 15 ORDER BY fleet_end_time ASC LIMIT 1;";
$totalExpeResult = $db->selectSingle($sql, array(
	':userID'   => $USER['id']
));

$variableTime = 0;
if(!empty($totalExpeResult))
	$variableTime = $totalExpeResult['fleet_end_time']-TIMESTAMP;

$arr	= array("F"=>array("a"=>$totalAttacks,"d"=>$unicAttacks,"no"=>array(),"c"=>$activeFleetSlots['count'],"e"=>$activeExpedition,"at"=>0,"dt"=>0,"et"=>$variableTime),"GM"=>0,"M"=>"".$totalUnread."");

echo json_encode($arr);