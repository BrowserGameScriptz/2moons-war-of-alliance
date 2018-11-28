<?php

/**
 *  2Moons 
 *   by Jan-Otto Kröpke 2009-2016
 *
 * For the full copyright and license information, please view the LICENSE
 *
 * @package 2Moons
 * @author Jan-Otto Kröpke <slaver7@gmail.com>
 * @copyright 2009 Lucky
 * @copyright 2016 Jan-Otto Kröpke <slaver7@gmail.com>
 * @licence MIT
 * @version 1.8.0 
 * @link https://github.com/jkroepke/2Moons
 */

class ShowChatPage extends AbstractGamePage
{
	public static $requireModule = MODULE_CHAT;

	function __construct() 
	{
		parent::__construct();
	}
	
	function rooms()
	{
		global $USER, $LNG;
		$mini_chat = HTTP::_GP('mini_chat', 0);
		
		if(isset($mini_chat) && $mini_chat == 1){
			$this->setWindow('chat');
			$this->initTemplate();
		}
		
		$action	= HTTP::_GP('action', '');
		
		if($action == "create"){
			$name	= HTTP::_GP('name', '');
			$pass	= HTTP::_GP('pass', '');
			$pass2	= HTTP::_GP('pass2', '');
			
			if($name == ""){
				$this->printMessage($LNG['chat_msg24'], true, array('game.php?page=chat&mode=roomsActions&action=create', 2));
			}elseif(($pass != "" || $pass2 != "") && $pass != $pass2){
				$this->printMessage($LNG['chat_msg25'], true, array('game.php?page=chat&mode=roomsActions&action=create', 2));
			}else{
				$db	= Database::get();	
				$lastId = $db->lastInsertId();
				$sql = "INSERT INTO %%CHAT_ROOMS%% SET id = :id, id_owner = :id_owner, name_owner = :name_owner, name = :name, pass = :pass;";
				$db->insert($sql, array(
					':id'			=> $lastId,
					':id_owner'		=> $USER['id'],
					':name_owner'	=> $USER['username'],
					':name'			=> $name,
					':pass'			=> $pass
				));
				$sql	= "SELECT * FROM %%CHAT_ROOMS%% WHERE id_owner = :userId;";
				$ROOM	= $db->selectSingle($sql, array(
				':userId'	=> $USER['id']
				));

				$sql = "UPDATE %%USERS%% SET chat_room = :chat_room WHERE id = :userId;";
				$db->update($sql, array(
						':chat_room'	=> $ROOM['id'],
						':userId'	=> $USER['id']
				));
				$this->printMessage($LNG['chat_msg26'], true, array('game.php?page=chat&mode=rooms', 2));
			}
		}elseif($action == "login"){
			$room	= HTTP::_GP('room', 0);
			$pass	= HTTP::_GP('pass', '');
			$db		= Database::get();
			$sql	= 'SELECT * FROM %%CHAT_ROOMS%% WHERE id = :id';
			$UserRoom = $db->selectSingle($sql, array(
				':id' => $room
			));
			
			if($pass != "" && $pass != $UserRoom['pass']){
				$this->printMessage($LNG['chat_msg27'], true, array('game.php?page=chat&mode=rooms', 2));
			}else{
				$sql	= "UPDATE %%USERS%% SET chat_room = :chat_room WHERE id = :userId;";
				$db->update($sql, array(
					':chat_room'	=> $room, 
					':userId'	=> $USER['id']
				));	
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/game.php?page=chat&mode=rooms');
			}
		}
		
		$ChatOnlineAll 	= 0;
		$ChatOnlineAlly	= 0;
		$ChatOnlineRoom	= 0;
		$UserRoom		= 0;
		$db	= Database::get();
		$sql	= 'SELECT * FROM %%CHAT_ROOMS%% WHERE id_owner = :userid';
		$UserRoom = $db->select($sql, array(
			':userid' => $USER['id']
		));
		
		
		$sql	= 'SELECT * FROM %%CHAT_ON%% WHERE last_time >= :last_time';
		$ChatOnlineAll = $db->select($sql, array(
			':last_time'	=> (TIMESTAMP - 60)
		));
		$sql	= 'SELECT * FROM %%CHAT_ON_ALLY%% WHERE last_time >= :last_time';
		$ChatOnlineAlly = $db->select($sql, array(
			':last_time'	=> (TIMESTAMP - 60)
		));
		$sql	= 'SELECT * FROM %%CHAT_ON_ROOMS%% WHERE last_time >= :last_time';
		$ChatOnlineRoom = $db->select($sql, array(
			':last_time'	=> (TIMESTAMP - 60)
		));
		
		$this->assign(array(
			'ally_id' 		=> $USER['ally_id'],	
			'mini_chat' 	=> $mini_chat,	
			'chat_online' 	=> array('general' => count($ChatOnlineAll), 'ally' => count($ChatOnlineAlly), 'room1' => count($ChatOnlineRoom)),	
			'user_ally' 	=> $USER['ally_id'],	
			'chat_silence' 	=> ($USER['chat_silence'] > TIMESTAMP) ? $USER['chat_silence'] : "",
			'user_color' 	=> $USER['user_color'],	
		));
		
		if(count($UserRoom) == 0 && $USER['chat_room'] == 0){
			$this->display('page.chat.room.tpl');
		}else{
			$this->display('page.chat.room.default.tpl');
		}
	
	}
	
	function roomsActions()
	{
		global $USER, $LNG;
		
		$action		= HTTP::_GP('action', '');
		$mini_chat 	= HTTP::_GP('mini_chat', 0);
		$room		= HTTP::_GP('room', 0);
		$this->setWindow('chat');
		$this->initTemplate();
		
		if($action == 'login'){
			$db	= Database::get();
			$sql	= 'SELECT * FROM %%CHAT_ROOMS%% WHERE id = :id';
			$UserRoom = $db->selectSingle($sql, array(
				':id' => $room
			));
			
			if($UserRoom['pass'] == ""){
				$sql	= "UPDATE %%USERS%% SET chat_room = :chat_room WHERE id = :userId;";
				$db->update($sql, array(
				':chat_room'	=> $room, 
				':userId'	=> $USER['id']
				));	
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/game.php?page=chat&mode=rooms');
			}else{
				$this->assign(array(
					'mini_chat' => $mini_chat,	
					'room' 		=> $room,	
				));	
				$this->display('page.chat.action.join.tpl');
			}		
		}else{
			$this->assign(array(
				'mini_chat' => $mini_chat,	
			));
			$this->display('page.chat.action.create.tpl');
		}
	}
	
	function colorselect()
	{
		global $USER, $LNG;
		$new_user_color 	= HTTP::_GP('color', '');
		$db					= Database::get();
		$sql	= "UPDATE %%USERS%% SET user_color = :user_color WHERE id = :userId;";
		$db->update($sql, array(
			':user_color'	=> $new_user_color,
			':userId'		=> $USER['id']
		));
	}
	
	function show()
	{
		global $USER, $LNG;

		$ally_id = 0;
		$action	= HTTP::_GP('chat', '');
		if($action == 'ally') {
			$ally_id = $USER['ally_id'];
		}
	
		$mini_chat = HTTP::_GP('mini_chat', 0);
		$chatsss = HTTP::_GP('chat', "");
			
		$ChatOnlineAll 	= 0;
		$ChatOnlineAlly	= 0;
		$ChatOnlineRoom	= 0;
		$db	= Database::get();
		
		$sql	= 'SELECT * FROM %%CHAT_ON%% WHERE last_time >= :last_time';
		$ChatOnlineAll = $db->select($sql, array(
		':last_time'	=> (TIMESTAMP - 60)
		));
		
		$sql	= 'SELECT * FROM %%CHAT_ON_ALLY%% WHERE last_time >= :last_time';
		$ChatOnlineAlly = $db->select($sql, array(
			':last_time'	=> (TIMESTAMP - 60)
		)); 

		$sql	= 'SELECT * FROM %%CHAT_ON_ROOMS%% WHERE last_time >= :last_time';
		$ChatOnlineRoom = $db->select($sql, array(
			':last_time'	=> (TIMESTAMP - 60)
		));
		
		if(isset($mini_chat) && $mini_chat == 1){
			$this->setWindow('chat');
			$this->initTemplate();
		}
		
		
		$this->assign(array(
			'ally_id' 			=> $ally_id,	
			'mini_chat' 		=> $mini_chat,	
			'user_ally' 		=> $USER['ally_id'],	
			'chat_online' 		=> array('general' => count($ChatOnlineAll), 'ally' => count($ChatOnlineAlly), 'room1' => count($ChatOnlineRoom)),	
			'chat_silence' 		=> ($USER['chat_silence'] > TIMESTAMP) ? $USER['chat_silence'] : "",	
			'user_color' 		=> $USER['user_color']
		));
			
		$this->display('page.chat.default.tpl');
	}
}
