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

class ShowVertifyPage extends AbstractLoginPage
{
	public static $requireModule = 0;

	function __construct()
	{
		parent::__construct();
	}

	private function _activeUser()
	{
		global $LNG;

		$validationID	= HTTP::_GP('i', 0);
		$validationKey	= HTTP::_GP('k', '');

		$db = Database::get();

		$sql = "SELECT * FROM %%USERS_VALID%%
		WHERE validationID	= :validationID
		AND validationKey	= :validationKey
		AND universe		= :universe;";

		$userData = $db->selectSingle($sql, array(
			':validationKey'	=> $validationKey,
			':validationID'		=> $validationID,
			':universe'			=> Universe::current()
		));

		if(empty($userData))
		{
			$this->printMessage($LNG['vertifyNoUserFound']);
		}

		$config	= Config::get();

		$sql = "DELETE FROM %%USERS_VALID%% WHERE validationID = :validationID;";
		$db->delete($sql, array(
			':validationID'	=> $validationID
		));

		list($userID, $planetID) = PlayerUtil::createPlayer($userData['universe'], $userData['userName'], $userData['password'], $userData['email'], $userData['language'], $userData['displayname'], $userData['secretQuestion'], $userData['secretAnswer'], $userData['birthday'], $userData['securityEncodage'], $userData['securityCode'], $validationID);

		if(!empty($userData['referralID']))
		{
			$sql = "UPDATE %%USERS%% SET
			`ref_id`	= :referralId,
			`ref_bonus`	= 1
			WHERE
			`id`		= :userID;";

			$db->update($sql, array(
				':referralId'	=> $userData['referralID'],
				':userID'		=> $userID
			));
		}
		
		$senderName = $LNG['registerWelcomePMSenderName'];
		$subject 	= $LNG['registerWelcomePMSubject'];
		$message 	= sprintf($LNG['registerWelcomePMText'], $config->game_name, $userData['universe']);

		PlayerUtil::sendMessage($userID, 1, $senderName, 1, $subject, $message, TIMESTAMP);
		
		return array(
			'userID'	=> $userID,
			'userName'	=> $userData['userName'],
			'planetID'	=> $planetID
		);
	}

	function show()
	{
		$userData	= $this->_activeUser();

		$session	= Session::create();
		$session->userId		= (int) $userData['userID'];
		$session->adminAccess	= 0;
		$session->save();

		HTTP::redirectTo('game.php');
	}

	function json()
	{
		global $LNG;
		$userData	= $this->_activeUser();
		$this->sendJSON(sprintf($LNG['vertifyAdminMessage'], $userData['userName']));
	}
}