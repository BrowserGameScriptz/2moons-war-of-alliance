<?php

/**
 *  2Moons
 *  Copyright (C) 2012 Jan Kröpke
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package 2Moons
 * @author Jan Kröpke <info@2moons.cc>
 * @copyright 2012 Jan Kröpke <info@2moons.cc>
 * @license http://www.gnu.org/licenses/gpl.html GNU GPLv3 License
 * @version 1.7.2 (2013-03-18)
 * @info $Id$
 * @link http://2moons.cc/
 */

if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) throw new Exception("Permission error!");

function ShowTrackingPage()
{
	global $LNG, $USER;
	
	$id_u				= HTTP::_GP('id_u', 0);
	$trackingId			= HTTP::_GP('trackingId', 0);
	$Selector['who'] 	= array(1 => 'Game page visited', 2 => 'Disconnexion of the game', 3 => 'Hall of Fame', 4 => 'Banned', 5 => 'Support tickets', 6 => 'Purchase History', 7 => 'Credits used', 8 => 'Chat Messages', 9 => 'Profil & Options', 10 => 'Lottery logs', 11 => 'Bunker logs', 12 => 'Bank logs', 13 => 'Alliance logs', 14 => 'Search logs');
	
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
	
	if (!empty($id_u))
	{
		$Userlist	= "";
		$UserWhileLogin	= $GLOBALS['DATABASE']->query("SELECT `id`, `username`, `authlevel` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' ORDER BY `username` ASC;");
		while($UserList	= $GLOBALS['DATABASE']->fetch_array($UserWhileLogin))
		{
			$isSeletec = "";
			if($UserList['id'] == $id_u)
				$isSeletec = " selected";
			$Userlist	.= "<option value=\"".$UserList['id']."\"".$isSeletec.">".$UserList['username']."&nbsp;&nbsp;(".$LNG['rank'][$UserList['authlevel']].")</option>";
		}
		
		switch ($trackingId) {
			case 1:
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".TRACKING." WHERE `trackMode` = ".$trackingId." AND userId = ".$id_u." ORDER BY `time` DESC;");
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['trackId']] = array(
						'pageVisited'	=> $Log['pageVisited'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.visited.tpl');
			break;
			case 2:
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".TRACKING." WHERE `trackMode` = ".$trackingId." AND userId = ".$id_u." ORDER BY `time` DESC;");
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['trackId']] = array(
						'pageVisited'	=> $Log['pageVisited'],
						'data'			=> $Log['data'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.disconexion.tpl');
			break;
			case 3:
				$order = HTTP::_GP('order', 'units');
				$sort = HTTP::_GP('sort', 'desc');
				$sort = strtoupper($sort);
				
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				
				$GLOBALS['DATABASE']->query("SET @rank:=0;");
				$top = $GLOBALS['DATABASE']->query("SELECT *, (
					SELECT DISTINCT
					IF(".TOPKB_USERS.".username = '', GROUP_CONCAT(".USERS.".username SEPARATOR ' & '), GROUP_CONCAT(".TOPKB_USERS.".username SEPARATOR ' & '))
					FROM ".TOPKB_USERS."
					LEFT JOIN ".USERS." ON uid = ".USERS.".id
					WHERE ".TOPKB_USERS.".`rid` = ".TOPKB.".`rid` AND `role` = 1
				) as `attacker`,
				(
					SELECT DISTINCT
					IF(".TOPKB_USERS.".username = '', GROUP_CONCAT(".USERS.".username SEPARATOR ' & '), GROUP_CONCAT(".TOPKB_USERS.".username SEPARATOR ' & '))
					FROM ".TOPKB_USERS." INNER JOIN ".USERS." ON uid = id
					WHERE ".TOPKB_USERS.".`rid` = ".TOPKB.".`rid` AND `role` = 2
				) as `defender`  
				,@rank:=@rank+1 as rank
				FROM ".TOPKB." WHERE `universe` = '".$UNI."' ORDER BY units DESC LIMIT 100;");
				
				$TopKBList	= array();
				$i = 1;
				while($data = $GLOBALS['DATABASE']->fetch_array($top))
				{
					switch($order)
					{
						case 'date':
							$key = $data['time'];
						break;
						case 'owner':
							$key = $data['attacker'].$data['defender'];
						break;
						case 'units':
						default:
							$key = $data['units'];
						break;
					}
					
					$TopKBList[$key][$data['rank']]	= array(
						'result'	=> $data['result'],
						'date'		=> _date($LNG['php_tdformat'], $data['time'], $USER['timezone']),
						'time'		=> TIMESTAMP - $data['time'],
						'units'		=> $data['units'],
						'rid'		=> $data['rid'],
						'attacker'	=> $data['attacker'],
						'defender'	=> $data['defender'],
					);
				}
				
				$GLOBALS['DATABASE']->free_result($top);
				
				ksort($TopKBList);

				if($sort === "DESC")
				{
					$TopKBList	= array_reverse($TopKBList);
				}
				else
				{	
					$sort = "ASC";
				}
				
				$template	= new template();
				$template->assign_vars(array(
					'userNameTracked'=> $UserBlackLogin['username'],
					'adminName'		 => $USER['username'],
					'domainHost'	 => $_SERVER['HTTP_HOST'],
					'membersOnline'	 => pretty_number($CountQuery['total']),
					'serverLoad'	 => round($memory_usage,2),
					'Userlist'		 => $Userlist,
					'TopKBList'		 => $TopKBList,
					'sort'			 => $sort,
					'order'			 => $order,
					'trackingId'	 => $trackingId,
					'Selector'		 => $Selector['who'],
				));
				
				$template->show('tracking.halloffame.tpl');
			break;
			case 4:
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".BANNED." WHERE `whoId` = ".$id_u." AND `universe` = '".$_SESSION['adminuni']."' ORDER BY `time` DESC;");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['id']] = array(
						'author'		=> $Log['author'],
						'reason'		=> $Log['theme'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
						'longer'		=> _date($LNG['php_tdformat'], $Log['longer'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.banned.tpl');
			break;
			case 5:
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT t.*, COUNT(a.ticketID) as answer FROM ".TICKETS." t INNER JOIN ".TICKETS_ANSWER." a USING (ticketID) WHERE t.ownerID = ".$id_u." GROUP BY a.ticketID ORDER BY t.ticketID DESC;");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['ticketID']] = array(
						'subject'		=> $Log['subject'],
						'answer'		=> $Log['answer'],
						'status'		=> $Log['status'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.support.tpl');
			break;
			case 6:
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".PAYLOG." WHERE userID = ".$id_u." ORDER BY time DESC;");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['payID']] = array(
						'pinPrice'		=> $Log['pinPrice'],
						'pinCredits'	=> $Log['pinCredits'],
						'pinType'		=> $Log['pinType'],
						'pinCode'		=> $Log['pinCode'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.purchase.tpl');
			break;
			case 7:
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".ACHATLOG." WHERE userID = ".$id_u." ORDER BY time DESC;");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['achatID']] = array(
						'usedType'		=> $Log['message'],
						'total_cred'	=> $Log['total_cred'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.credits.shop.tpl');
			break;
			case 8:
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".MINICHAT." WHERE userID = ".$id_u." ORDER BY timestamp DESC;");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['id']] = array(
						'message'		=> $Log['message'],
						'time'			=> _date($LNG['php_tdformat'], $Log['timestamp'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.chat.tpl');
			break;
			case 9:
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".TRACKING." WHERE `trackMode` = ".$trackingId." AND userId = ".$id_u." ORDER BY `time` DESC;");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['trackId']] = array(
						'pageVisited'	=> $Log['pageVisited'],
						'data'			=> $Log['data'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.settings.tpl');
			break;
			case 10:
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".TRACKING." WHERE `trackMode` = ".$trackingId." AND userId = ".$id_u." ORDER BY `time` DESC;");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['trackId']] = array(
						'pageVisited'	=> $Log['pageVisited'],
						'data'			=> $Log['data'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.lottery.tpl');
			break;
			case 11:
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".BUNKERLOG." WHERE userID = ".$id_u." ORDER BY time DESC;");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['logID']] = array(
						'accepted'		=> $Log['type'],
						'message'		=> $Log['message'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.bunker.tpl');
			break;
			case 12:
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".TRACKING." WHERE `trackMode` = ".$trackingId." AND userId = ".$id_u." ORDER BY `time` DESC;");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['trackId']] = array(
						'pageVisited'	=> $Log['pageVisited'],
						'data'			=> $Log['data'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.bank.tpl');
			break;
			case 13:
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".TRACKING." WHERE `trackMode` = ".$trackingId." AND userId = ".$id_u." ORDER BY `time` DESC;");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['trackId']] = array(
						'pageVisited'	=> $Log['pageVisited'],
						'data'			=> $Log['data'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.alliance.tpl');
			break;
			case 14:
				$UserBlackLogin	= $GLOBALS['DATABASE']->GetFirstRow("SELECT `username` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND id = ".$id_u.";");
				$trackingLog	= $GLOBALS['DATABASE']->query("SELECT * FROM ".TRACKING." WHERE `trackMode` = ".$trackingId." AND userId = ".$id_u." ORDER BY `time` DESC;");
				$trackLog		= array();
				
				foreach($trackingLog as $Log){
					$trackLog[$Log['trackId']] = array(
						'pageVisited'	=> $Log['pageVisited'],
						'data'			=> $Log['data'],
						'time'			=> _date($LNG['php_tdformat'], $Log['time'], $USER['timezone']),
					);
				}
				
				$template	= new template();
				$template->assign_vars(array(	
					'userNameTracked'	=> $UserBlackLogin['username'],
					'adminName'			=> $USER['username'],
					'domainHost'		=> $_SERVER['HTTP_HOST'],
					'membersOnline'		=> pretty_number($CountQuery['total']),
					'serverLoad'		=> round($memory_usage,2),
					'Userlist'			=> $Userlist,
					'trackingId'		=> $trackingId,
					'trackLog'			=> $trackLog,
					'Selector'			=> $Selector['who'],
				));
				$template->show('tracking.search.tpl');
			break;
		}
		exit;
	}
	
	$Userlist	= "";
	$UserWhileLogin	= $GLOBALS['DATABASE']->query("SELECT `id`, `username`, `authlevel` FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' ORDER BY `username` ASC;");
	while($UserList	= $GLOBALS['DATABASE']->fetch_array($UserWhileLogin))
	{
		$Userlist	.= "<option value=\"".$UserList['id']."\">".$UserList['username']."&nbsp;&nbsp;(".$LNG['rank'][$UserList['authlevel']].")</option>";
	}
	
	
	$template	= new template();
	$template->assign_vars(array(	
		'adminName'			=> $USER['username'],
		'domainHost'		=> $_SERVER['HTTP_HOST'],
		'membersOnline'		=> pretty_number($CountQuery['total']),
		'serverLoad'		=> round($memory_usage,2),
		'Userlist'			=> $Userlist,
		'Selector'			=> $Selector['who'],
	));
	$template->show('tracking.tpl');
}