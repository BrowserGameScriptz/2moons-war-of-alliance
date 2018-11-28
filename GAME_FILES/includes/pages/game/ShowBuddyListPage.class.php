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

class ShowBuddyListPage extends AbstractGamePage
{
	public static $requireModule = MODULE_BUDDYLIST;

	function __construct() 
	{
		parent::__construct();
		$this->initTemplate();
		$this->setWindow('popup');
	}
	
	function request()
	{
		global $USER, $LNG;
				
		$id	= HTTP::_GP('id', 0);
		
		if($id == $USER['id'])
		{
			$this->printMessage($LNG['bu_cannot_request_yourself'], true, array('game.php?page=buddyList', 3));
		}
		
		$db = Database::get();

        $sql = "SELECT COUNT(*) as count FROM %%BUDDY%% WHERE (sender = :userID AND owner = :friendID) OR (owner = :userID AND sender = :friendID);";
        $exists = $db->selectSingle($sql, array(
            ':userID'	=> $USER['id'],
            ':friendID'  => $id
        ), 'count');

		if($exists != 0)
		{
			$this->printMessage($LNG['bu_request_exists']);
		}
		
		$sql = "SELECT username, galaxy, system, planet FROM %%USERS%% WHERE id = :friendID;";
        $userData = $db->selectSingle($sql, array(
            ':friendID'  => $id
        ));

		$this->assign(array(
			'username'	=> $userData['username'],
			'galaxy'	=> $userData['galaxy'],
			'system'	=> $userData['system'],
			'planet'	=> $userData['planet'],
			'id'		=> $id,
		));
		
		$this->display('page.buddyList.request.tpl');
	}
	
	function send()
	{
		global $USER, $LNG;

		$this->tplObj->execscript('window.setTimeout(parent.$.fancybox.close, 2000);');
		
		$id		= HTTP::_GP('id', 0);
		$text	= HTTP::_GP('text', '', UTF8_SUPPORT);

		if($id == $USER['id'])
		{
			//$this->printMessage($LNG['bu_cannot_request_yourself'], true, array('game.php?page=buddyList', 3));
			echo $LNG['bu_cannot_request_yourself'];
			exit;
		}

        $db = Database::get();

        $sql = "SELECT COUNT(*) as count FROM %%BUDDY%% WHERE (sender = :userID AND owner = :friendID) OR (owner = :userID AND sender = :friendID);";
        $exists = $db->selectSingle($sql, array(
            ':userID'	=> $USER['id'],
            ':friendID'  => $id
        ), 'count');

        if($exists != 0)
		{
			//$this->printMessage($LNG['bu_request_exists'], true, array('game.php?page=buddyList', 3));
			echo $LNG['bu_request_exists'];
			exit;
		}

        $sql = "INSERT INTO %%BUDDY%% SET sender = :userID,	owner = :friendID, universe = :universe;";
        $db->insert($sql, array(
            ':userID'	=> $USER['id'],
            ':friendID'  => $id,
            ':universe' => Universe::current()
        ));

        $buddyID	= $db->lastInsertId();

		$sql = "INSERT INTO %%BUDDY_REQUEST%% SET id = :buddyID, text = :text;";
        $db->insert($sql, array(
            ':buddyID'  => $buddyID,
            ':text' => $text
        ));

        $sql = "SELECT username, lang FROM %%USERS%% WHERE id = :friendID;";
        $row = $db->selectSingle($sql, array(
            ':friendID'  => $id
        ));
		
		$Friend_LNG = $LNG;
		
		if($USER['lang'] != $row['lang']){
			$Friend_LNG = new Language($language);
			$Friend_LNG->includeData(array('INGAME'));
		}
		
        PlayerUtil::sendMessage($id, $USER['id'], $USER['username'], 4, $Friend_LNG['bu_new_request_title'], sprintf($Friend_LNG['bu_new_request_body'], $row['username'], $USER['username']), TIMESTAMP);

		echo $LNG['bu_request_send'];
		exit;
	}
	
	function delete()
	{
		global $USER, $LNG;
		
		$id	= HTTP::_GP('id', 0);
		$db = Database::get();

        $sql = "SELECT COUNT(*) as count FROM %%BUDDY%% WHERE id = :id AND (sender = :userID OR owner = :userID);";
        $isAllowed = $db->selectSingle($sql, array(
            ':id'  => $id,
            ':userID' => $USER['id']
        ), 'count');

		if($isAllowed)
		{
			$sql = "SELECT COUNT(*) as count FROM %%BUDDY_REQUEST%% WHERE :id;";
            $isRequest = $db->selectSingle($sql, array(
                ':id'  => $id
            ), 'count');
			
			if($isRequest)
			{
                $sql = "SELECT u.username, u.id, u.lang FROM %%BUDDY%% b INNER JOIN %%USERS%% u ON u.id = IF(b.sender = :userID,b.owner,b.sender) WHERE b.id = :id;";
                $requestData = $db->selectSingle($sql, array(
                    ':id'       => $id,
                    'userID'    => $USER['id']
                ));
				
				$Enemy_LNG = $LNG;
				
				if($USER['lang'] != $requestData['lang']){
					$Enemy_LNG = new Language($language);
					$Enemy_LNG->includeData(array('INGAME'));
				}

				PlayerUtil::sendMessage($requestData['id'], $USER['id'], $USER['username'], 4, $Enemy_LNG['bu_rejected_request_title'], sprintf($Enemy_LNG['bu_rejected_request_body'], $requestData['username'], $USER['username']), TIMESTAMP);
			}

            $sql = "DELETE b.*, r.* FROM %%BUDDY%% b LEFT JOIN %%BUDDY_REQUEST%% r USING (id) WHERE b.id = :id;";
            $db->delete($sql, array(
                ':id'       => $id,
            ));
        }
		$this->redirectTo("game.php?page=buddyList");
	}
	
	function accept()
	{
		global $USER, $LNG;
		
		$id	= HTTP::_GP('id', 0);
		$db = Database::get();

        $sql = "DELETE FROM %%BUDDY_REQUEST%% WHERE id = :id;";
        $db->delete($sql, array(
            ':id'       => $id
        ));

        $sql = "SELECT sender, u.username, u.lang FROM %%BUDDY%% b INNER JOIN %%USERS%% u ON sender = u.id WHERE b.id = :id;";
        $sender = $db->selectSingle($sql, array(
            ':id'       => $id
        ));
		
		$Friend_LNG = $LNG;
		
		if($USER['lang'] != $sender['lang']){
			$Friend_LNG = new Language($language);
			$Friend_LNG->includeData(array('INGAME'));
		}

		PlayerUtil::sendMessage($sender['sender'], $USER['id'], $USER['username'], 4, $Friend_LNG['bu_accepted_request_title'], sprintf($Friend_LNG['bu_accepted_request_body'], $sender['username'], $USER['username']), TIMESTAMP);

		$this->redirectTo("game.php?page=buddyList");
	}
	
	function show()
	{
		global $USER;
		$db = Database::get();
        $sql = "SELECT a.sender, a.id as buddyid, b.id, b.username, b.onlinetime, b.galaxy, b.system, b.planet, b.ally_id, c.ally_name, d.text
		FROM (%%BUDDY%% as a, %%USERS%% as b) LEFT JOIN %%ALLIANCE%% as c ON c.id = b.ally_id LEFT JOIN %%BUDDY_REQUEST%% as d ON a.id = d.id
		WHERE (a.sender = :userID AND a.owner = b.id) OR (a.owner = :userID AND a.sender = b.id);";
        $BuddyListResult = $db->select($sql, array(
            'userID'    => $USER['id']
        ));
		
		$sql = "SELECT * FROM %%ENNEMIES%% WHERE playerId = :id;";
        $ennemyList = database::get()->select($sql, array(
            ':id'       => $USER['id']
        ));
		
		$ennemieArray 		= array();
        $myRequestList		= array();
		$otherRequestList	= array();
		$myBuddyList		= array();		
				
		foreach($BuddyListResult as $BuddyList)
		{
			if(isset($BuddyList['text']))
			{
				if($BuddyList['sender'] == $USER['id'])
					$myRequestList[$BuddyList['buddyid']]		= $BuddyList;
				else
					$otherRequestList[$BuddyList['buddyid']]	= $BuddyList;
			}
			else
			{
				$BuddyList['onlinetime']			= floor((TIMESTAMP - $BuddyList['onlinetime']) / 60);
				$myBuddyList[$BuddyList['buddyid']]	= $BuddyList;
			}
		}
		
		foreach($ennemyList as $Ennemie){
			$sql = "SELECT galaxy, system, planet, ally_id FROM %%USERS%% WHERE id = :id;";
			$ennemyData = database::get()->selectSingle($sql, array(
				':id'       => $Ennemie['ennemiePid']
			));
		
			$ennemieArray[$Ennemie['ennemieId']] = array(
				'ennemieName' => getDisplayNameById($Ennemie['ennemiePid']),
				'ennemieAlly' => $ennemyData['ally_id'] != 0 ? getAllianceNameById($ennemyData['ally_id']) : "",
				'ennemieCoor' => "[".$ennemyData['galaxy']." : ".$ennemyData['system']." : ".$ennemyData['planet']."]",
			);
		}
		
		$this->assign(array(
			'myBuddyList'		=> $myBuddyList,
			'myRequestList'		=> $myRequestList,
			'otherRequestList'	=> $otherRequestList,
			'ennemieArray'		=> $ennemieArray,
		));
		
		$this->display('page.buddyList.default.tpl');
	}
	
	function addenemies() 
	{
		global $USER, $USETT, $LNG;
		
		$id	= HTTP::_GP('id', 0);
		
		$sql = "SELECT id FROM %%USERS%% WHERE id = :id;";
		$playerData = database::get()->selectSingle($sql, array(
			':id'       => $id
		));
		
		$sql = "SELECT * FROM %%ENNEMIES%% WHERE playerId = :id AND ennemiePid = :targetId;";
        $ennemyCount = database::get()->selectSingle($sql, array(
            ':id'       => $USER['id'],
            ':targetId' => $id
        ));
		
		if(empty($playerData)){
			$this->printMessage($LNG['playercar_24'], true, array('game.php?page=buddyList', 3));
		}elseif($id == $USER['id']){
			$this->printMessage($LNG['playercar_25'], true, array('game.php?page=buddyList', 3));
		}elseif(!empty($ennemyCount)){
			$this->printMessage($LNG['playercar_26'], true, array('game.php?page=buddyList', 3));
		}else{
			$sql = "INSERT INTO %%ENNEMIES%% SET playerId = :playerId, ennemiePid = :ennemiePid, addTime = :addTime;";
			database::get()->insert($sql, array(
				':playerId'     => $USER['id'],
				':ennemiePid' 	=> $id,
				':addTime' 		=> TIMESTAMP
			));
			$this->printMessage($LNG['playercar_22'], true, array('game.php?page=buddyList', 3));
		}
	}
	
	function delenemies()
	{
		global $USER, $USETT, $LNG;
		
		$id	= HTTP::_GP('id', 0);
		
		$sql = "SELECT * FROM %%ENNEMIES%% WHERE playerId = :id AND ennemieId = :deleteId;";
        $ennemyCount = database::get()->selectSingle($sql, array(
            ':id'       => $USER['id'],
            ':deleteId' => $id
        ));
		
		if(empty($ennemyCount)){
			$this->printMessage($LNG['playercar_27'], true, array('game.php?page=buddyList', 3));
		}else{
			$sql = "DELETE FROM %%ENNEMIES%% WHERE ennemieId = :ennemieId AND playerId = :playerId;";
			database::get()->delete($sql, array(
				':playerId'     => $USER['id'],
				':ennemieId' 	=> $id,
			));
			$this->printMessage($LNG['playercar_23'], true, array('game.php?page=buddyList', 3));
		}
		
	}
	
	function enemies()
	{
		global $USER, $USETT, $LNG;
		
		$sql = "SELECT * FROM %%ENNEMIES%% WHERE playerId = :id;";
        $ennemyList = database::get()->select($sql, array(
            ':id'       => $USER['id']
        ));
		
		$ennemieArray = array();
		
		foreach($ennemyList as $Ennemie){
			$sql = "SELECT galaxy, system, planet, ally_id FROM %%USERS%% WHERE id = :id;";
			$ennemyData = database::get()->selectSingle($sql, array(
				':id'       => $Ennemie['ennemiePid']
			));
		
			$ennemieArray[$Ennemie['ennemieId']] = array(
				'ennemieName' => getDisplayNameById($Ennemie['ennemiePid']),
				'ennemieAlly' => $ennemyData['ally_id'] != 0 ? getAllianceNameById($ennemyData['ally_id']) : "",
				'ennemieCoor' => "[".$ennemyData['galaxy']." : ".$ennemyData['system']." : ".$ennemyData['planet']."]",
			);
		}
		
		$this->assign(array(
			'ennemieArray'		=> $ennemieArray,
		));
		
		$this->display('page.ennemies.default.tpl');
	}
}