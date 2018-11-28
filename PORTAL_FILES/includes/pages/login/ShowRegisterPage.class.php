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

class ShowRegisterPage extends AbstractLoginPage
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function show()
	{
		global $LNG;
		$universeSelect	= array();	
		$referralData	= array('id' => 0, 'name' => '');
		$accountName	= "";
		
		$externalAuth	= HTTP::_GP('externalAuth', array());
		$referralID 	= HTTP::_GP('referralID', 0);
		if($referralID == 0 && isset($_COOKIE["ReferalId"]))
			$referralID 	= $_COOKIE["ReferalId"];
		
		$session = session::load();
		if($session->isValidSession())
		{
			$session->delete;
			HTTP::redirectTo('index.php');	
		}else{

			foreach(Universe::availableUniverses() as $uniId)
			{
				$config = Config::get($uniId);
				$universeSelect[$uniId]	= $config->uni_name.($config->game_disable == 0 || $config->reg_closed == 1 ? $LNG['uni_closed'] : '');
			}
			
			if(!isset($externalAuth['account'], $externalAuth['method']))
			{
				$externalAuth['account']	= 0;
				$externalAuth['method']		= '';
			}
			else
			{
				$externalAuth['method']		= strtolower(str_replace(array('_', '\\', '/', '.', "\0"), '', $externalAuth['method']));
			}
			
			if(!empty($externalAuth['account']) && file_exists('includes/extauth/'.$externalAuth['method'].'.class.php'))
			{
				$path	= 'includes/extauth/'.$externalAuth['method'].'.class.php';
				require($path);
				$methodClass	= ucwords($externalAuth['method']).'Auth';
				/** @var $authObj externalAuth */
				$authObj		= new $methodClass;
				
				if(!$authObj->isActiveMode())
				{
					$this->redirectTo('index.php?code=5');
				}
				
				if(!$authObj->isValid())
				{
					$this->redirectTo('index.php?code=4');
				}
				
				$accountData	= $authObj->getAccountData();
				$accountName	= $accountData['name'];
			}

			$config			= Config::get();
			
			if($config->ref_active == 1 && !empty($referralID))
			{
				$db = Database::get();

				$sql = "SELECT username FROM %%USERS%% WHERE id = :referralID AND universe = :universe;";
				$referralAccountName = $db->selectSingle($sql, array(
					':referralID'	=> $referralID,
					':universe'		=> 1
				), 'username');

				if(!empty($referralAccountName))
				{
					$referralData	= array('id' => $referralID, 'name' => $referralAccountName);
				}
				
				setcookie("ReferalId", $referralID, time()+86400);  /* expire dans 1 heure */
			}
			
			$this->assign(array(
				'referralData'		=> $referralData,
				'accountName'		=> $accountName,
				'externalAuth'		=> $externalAuth,
				'universeSelect'	=> $universeSelect,
				'registerRulesDesc'	=> sprintf($LNG['registerRulesDesc'], '<a href="index.php?page=rules">'.$LNG['menu_rules'].'</a>')
			));
			
			$this->display('page.register.default.tpl');
		}
	}
	
	function send() 
	{
		global $LNG;
		$config		= Config::get();

		if($config->game_disable == 0 || $config->reg_closed == 1)
		{
			$this->printMessage($LNG['registerErrorUniClosed'], true, array('index.php?page=register', 2));
		}

		$userName 		= HTTP::_GP('username', '', UTF8_SUPPORT);
		$displayname 	= HTTP::_GP('displayname', '', UTF8_SUPPORT);
		$password 		= HTTP::_GP('password', '', true);
		$password2 		= HTTP::_GP('password2', '', true);
		$mailAddress 	= HTTP::_GP('email', '');
		$birthday		= HTTP::_GP('birthday', array());
		$secretQuestion	= HTTP::_GP('secretQuestion', 0);
		$secretAnswer 	= HTTP::_GP('secretAnswer', '', UTF8_SUPPORT);
		$language 		= HTTP::_GP('lang', '');
		$referralID 	= HTTP::_GP('referralID', 0);
		$externalAuth	= HTTP::_GP('externalAuth', array());
		if(!isset($externalAuth['account'], $externalAuth['method']))
		{
			$externalAuthUID	= 0;
			$externalAuthMethod	= '';
		}
		else
		{
			$externalAuthUID	= $externalAuth['account'];
			$externalAuthMethod	= strtolower(str_replace(array('_', '\\', '/', '.', "\0"), '', $externalAuth['method']));
		}
		
		if(!isset($birthday['year'], $birthday['month'], $birthday['day']))
		{
			$birthday = strtotime('01-01-1970');
		}
		else
		{
			$birthday = strtotime($birthday['day'].'-'.$birthday['month'].'-'.$birthday['year']);
		}
		
		$errors 	= array();
		
		if(empty($userName)) {
			$errors[]	= $LNG['registerErrorUsernameEmpty'];
		}
		
		if(empty($displayname)) {
			$errors[]	= $LNG['registerErrorUsernameEmpty'];
		}
		
		if(!PlayerUtil::isNameValid($userName)) {
			$errors[]	= $LNG['registerErrorUsernameChar'];
		}
		
		if(!PlayerUtil::isNameValid($displayname)) {
			$errors[]	= $LNG['registerErrorUsernameChar'];
		}
		
		if(strlen($password) < 6) {
			$errors[]	= $LNG['registerErrorPasswordLength'];
		}
			
		if($password != $password2) {
			$errors[]	= $LNG['registerErrorPasswordSame'];
		}
			
		if(!PlayerUtil::isMailValid($mailAddress)) {
			$errors[]	= $LNG['registerErrorMailInvalid'];
		}
			
		if(empty($mailAddress)) {
			$errors[]	= $LNG['registerErrorMailEmpty'];
		}
		
		$db = Database::get();

		$sql = "SELECT (
				SELECT COUNT(*)
				FROM %%USERS%%
				WHERE universe = :universe
				AND username = :userName
			) + (
				SELECT COUNT(*)
				FROM %%USERS_VALID%%
				WHERE universe = :universe
				AND username = :userName
			) as count;";

		$countUsername = $db->selectSingle($sql, array(
			':universe'	=> Universe::current(),
			':userName'	=> $userName,
		), 'count');

		$sql = "SELECT (
			SELECT COUNT(*)
			FROM %%USERS%%
			WHERE universe = :universe
			AND (
				email = :mailAddress
				OR email_2 = :mailAddress
			)
		) + (
			SELECT COUNT(*)
			FROM %%USERS_VALID%%
			WHERE universe = :universe
			AND email = :mailAddress
		) as count;";

		$countMail = $db->selectSingle($sql, array(
			':universe'		=> Universe::current(),
			':mailAddress'	=> $mailAddress,
		), 'count');
		
		if($countUsername!= 0) {
			$errors[]	= $LNG['registerErrorUsernameExist'];
		}
			
		if($countMail != 0) {
			$errors[]	= $LNG['registerErrorMailExist'];
		}
					
		if (!empty($errors)) {
			$this->printMessage(implode("<br>\r\n", $errors), true, array('index.php?page=register', 2));
		}

		$path	= 'includes/extauth/'.$externalAuthMethod.'.class.php';

		if(!empty($externalAuth['account']) && file_exists($path))
		{
			require($path);

			$methodClass		= ucwords($externalAuthMethod).'Auth';
			/** @var $authObj externalAuth */
			$authObj			= new $methodClass;
			$externalAuthUID	= 0;
			if($authObj->isActiveMode() && $authObj->isValid()) {
				$externalAuthUID	= $authObj->getAccount();
			}
		}
		
		if(!empty($referralID))
		{
			$sql = "SELECT COUNT(*) as state FROM %%USERS%% WHERE id = :referralID AND universe = :universe;";
			$Count = $db->selectSingle($sql, array(
				':referralID' 	=> $referralID,
				':universe'		=> Universe::current()
			), 'state');

			if($Count == 0)
			{
				$referralID	= 0;
			}
		}
		else
		{
			$referralID	= 0;
		}
		
		$validationKey	= md5(uniqid('2m'));

		$sql = "INSERT INTO %%USERS_VALID%% SET
				`userName` = :userName,
				`displayname` = :displayname,
				`secretQuestion` = :secretQuestion,
				`secretAnswer` = :secretAnswer,
				`birthday` = :birthday,
				`validationKey` = :validationKey,
				`password` = :password,
				`email` = :mailAddress,
				`date` = :timestamp,
				`ip` = :remoteAddr,
				`language` = :language,
				`universe` = :universe,
				`referralID` = :referralID,
				`externalAuthUID` = :externalAuthUID,
				`externalAuthMethod` = :externalAuthMethod;";


		$db->insert($sql, array(
			':userName'				=> $userName,
			':displayname'			=> $displayname,
			':secretQuestion'		=> $secretQuestion,
			':secretAnswer'			=> $secretAnswer,
			':birthday'				=> $birthday,
			':validationKey'		=> $validationKey,
			':password'				=> PlayerUtil::cryptPassword('encrypt', $password),
			':mailAddress'			=> $mailAddress,
			':timestamp'			=> TIMESTAMP,
			':remoteAddr'			=> Session::getClientIp(),
			':language'				=> $language,
			':universe'				=> Universe::current(),
			':referralID'			=> $referralID,
			':externalAuthUID'		=> $externalAuthUID,
			':externalAuthMethod'	=> $externalAuthMethod
		));

		$validationID	= $db->lastInsertId();
		$verifyURL	= 'index.php?page=vertify&i='.$validationID.'&k='.$validationKey;
		
		$this->redirectTo($verifyURL);
	}
}