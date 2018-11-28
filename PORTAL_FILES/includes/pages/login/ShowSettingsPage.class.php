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

class ShowSettingsPage extends AbstractLoginPage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}
	
	function show() 
	{
		global $LNG;
		
		$session = session::load();
		if(!$session->isValidSession())
		{
			$session->delete;
			HTTP::redirectTo('index.php');	
		}
		
		$this->assign(array(
			
		));
		
		$this->display('page.settings.default.tpl');
	}
	
	function changepass() 
	{
		global $LNG;
		
		$session = session::load();
		if(!$session->isValidSession())
		{
			$session->delete;
			HTTP::redirectTo('index.php');	
		}
		
		if($_SERVER['REQUEST_METHOD'] === 'POST'){	
			$oldpass = HTTP::_GP('oldpass', "", true);
			$newpass = HTTP::_GP('newpass', "", true);
			
			$sql = "SELECT id, password, user_lastip, onlinetime FROM %%USERS%% WHERE id = :userId;";
			$loginData = database::get()->selectSingle($sql, array(
				':userId'	=> $session->userId
			));
			
			$hashedPasswordOld = PlayerUtil::cryptPassword('encrypt', $oldpass);
			$hashedPasswordNew = PlayerUtil::cryptPassword('encrypt', $newpass);
			
			if($loginData['password'] == $hashedPasswordOld && $hashedPasswordOld != $hashedPasswordNew){
				$sql = "UPDATE %%USERS%% SET password = :hashedPassword WHERE id = :loginID;";
				database::get()->update($sql, array(
					':hashedPassword'	=> $hashedPasswordNew,
					':loginID'			=> $loginData['id']
				));
				$this->printMessage($LNG['custom_p58'], true, array('index.php?page=settings', 3));
			}elseif($loginData['password'] == $hashedPasswordOld && $hashedPasswordOld == $hashedPasswordNew){
				$this->printMessage($LNG['custom_p59'], true, array('index.php?page=settings&mode=changepass', 3));
			}elseif($loginData['password'] != $hashedPasswordOld){
				$this->printMessage($LNG['custom_p56'], true, array('index.php?page=settings&mode=changepass', 3));
			}else{
				$this->printMessage($LNG['custom_p57'], true, array('index.php?page=settings&mode=changepass', 3));
			}
		}
		
		$this->display('page.settings.changepass.tpl');
	}
	
	function changedname() 
	{
		global $LNG;
	
		$session = session::load();
		if(!$session->isValidSession())
		{
			$session->delete;
			HTTP::redirectTo('index.php');	
		}
		
		if($_SERVER['REQUEST_METHOD'] === 'POST'){	
			$NewdisplayName = HTTP::_GP('displayName', "", UTF8_SUPPORT);
			
			$sql = "SELECT id, displayname, displayChange FROM %%USETT%% WHERE id = :userId;";
			$loginData = database::get()->selectSingle($sql, array(
				':userId'	=> $session->userId
			));
			
			if($loginData['displayChange'] > TIMESTAMP){
				$this->printMessage($LNG['custom_p60'], true, array('index.php?page=settings&mode=changedname', 3));
			}elseif(!PlayerUtil::isNameValid($NewdisplayName)){
				$this->printMessage($LNG['registerErrorUsernameChar'], true, array('index.php?page=settings&mode=changedname', 3));
			}elseif($NewdisplayName == $loginData['displayname']){
				$this->printMessage($LNG['custom_p61'], true, array('index.php?page=settings&mode=changedname', 3));
			}else{
				$sql = "UPDATE %%USETT%% SET displayname = :displayname, displayChange = :displayChange WHERE id = :loginID;";
				database::get()->update($sql, array(
					':displayname'		=> $NewdisplayName,
					':displayChange'	=> TIMESTAMP + 604800,
					':loginID'			=> $loginData['id']
				));
				$this->printMessage($LNG['custom_p62'], true, array('index.php?page=settings', 3));
			}
			
		}
		
		$this->display('page.settings.changedname.tpl');
	}
	
	function changemail() 
	{
		global $LNG;
	
		$session = session::load();
		if(!$session->isValidSession())
		{
			$session->delete;
			HTTP::redirectTo('index.php');	
		}
		
		if($_SERVER['REQUEST_METHOD'] === 'POST'){	
			$secretQuestion = HTTP::_GP('secretQuestion', 0);
			$secretAnswer 	= HTTP::_GP('secretAnswer', "", true);
			$newEmail	 	= HTTP::_GP('email', "", true);
			
			$sql	= "SELECT usett.id, usett.secretQuestion, usett.secretAnswer, user.email, user.email_2 FROM %%USETT%% as usett LEFT JOIN %%USERS%% as user ON user.id = usett.id WHERE user.id = :userId;";
			$loginData = database::get()->selectSingle($sql, array(
				':userId'	=> $session->userId
			));
			
			if($loginData['secretQuestion'] != $secretQuestion || $loginData['secretAnswer'] != $secretAnswer){
				$this->printMessage($LNG['custom_p63'], true, array('index.php?page=settings&mode=changemail', 3));
			}elseif(!PlayerUtil::isMailValid($newEmail)){
				$this->printMessage($LNG['registerErrorMailInvalid'], true, array('index.php?page=settings&mode=changemail', 3));
			}elseif($newEmail == $loginData['email']){
				$this->printMessage($LNG['custom_p64'], true, array('index.php?page=settings&mode=changemail', 3));
			}else{
				$sql = "UPDATE %%USERS%% SET email = :email WHERE id = :loginID;";
				database::get()->update($sql, array(
					':email'		=> $newEmail,
					':loginID'		=> $loginData['id']
				));
				$this->printMessage($LNG['custom_p65'], true, array('index.php?page=settings', 3));
			}
			
		}
		
		$this->display('page.settings.changemail.tpl');
	}
}