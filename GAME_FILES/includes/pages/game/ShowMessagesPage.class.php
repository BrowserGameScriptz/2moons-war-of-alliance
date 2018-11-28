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

class ShowMessagesPage extends AbstractGamePage
{
    public static $requireModule = MODULE_MESSAGES;

    function __construct()
    {
        parent::__construct();
    }

	function delonemsg()
	{
		global $LNG, $USER;
		$MsgID  	= HTTP::_GP('MsgID', 100);
		
		$sql = "SELECT COUNT(*) as state FROM %%MESSAGES%% WHERE message_owner = :userId AND message_id = :message_id;";
		$MessageCount = database::get()->selectSingle($sql, array(
			':userId'   	=> $USER['id'],
			':message_id'   => $MsgID,
		), 'state');
		
		if(empty($MessageCount)){
			echo $LNG['playercar_27'];
		}else{
			$sql = "DELETE FROM %%MESSAGES%% WHERE message_owner = :userId AND message_id = :message_id;";
			database::get()->delete($sql, array(
				':userId'   	=> $USER['id'],
				':message_id'   => $MsgID,
			));
			echo "The message is deleted.";
		}
	}
	
	function SpyRaportToFreind()
    {
        global $USER, $LNG, $USETT;
        $this->setWindow('popup');
		$this->initTemplate();
		$RaportID	= HTTP::_GP('RaportID', 0);
		$FriendID	= HTTP::_GP('FriendID', "", UTF8_SUPPORT);
		$ally		= HTTP::_GP('ally', "", UTF8_SUPPORT);
		
		$sql	= 'SELECT * FROM %%MESSAGES%% WHERE message_id = :RaportID && message_owner = :message_owner;';
		$msgInfo = database::get()->selectSingle($sql, array(
			':RaportID'	=> $RaportID,
			':message_owner'=> $USER['id']
		));	
			
		if($FriendID == ""){
			$this->sendJSON($LNG['msgt_9']);
		}elseif($FriendID == "ally" && $USER['ally_id'] != 0){
			$sql	= 'SELECT * FROM %%USERS%% WHERE ally_id = :allianceId AND id != :userId;';
			$AllyFriend = database::get()->select($sql, array(
				':allianceId'	=> $USER['ally_id'],
				':userId'		=> $USER['id']
			));
			
			if(!empty($msgInfo)){
				foreach($AllyFriend as $friend){
					PlayerUtil::sendMessage($friend['id'], $USER['id'], $USETT['displayname'], 2, $msgInfo['message_subject'], $msgInfo['message_text'], TIMESTAMP);	
				}
				$this->sendJSON($LNG['msgt_8']);	
			}else{
				$this->sendJSON($LNG['playercar_27']);	
			}
		}elseif($FriendID > 0){
			if(!empty($msgInfo)){
				PlayerUtil::sendMessage($FriendID, $USER['id'], $USETT['displayname'], 4, $msgInfo['message_subject'], $msgInfo['message_text'], TIMESTAMP);
				$this->sendJSON($LNG['msgt_10']);	
			}else{
				$this->sendJSON($LNG['playercar_27']);	
			}
		}else{
			$this->sendJSON($LNG['playercar_27']);	
		}
    }
	
	function SRTFshow()
	{
		global $USER, $LNG;
        $this->setWindow('popup');
		$this->initTemplate();
		$RaportID		= HTTP::_GP('RaportID', 0);
		$AllyFriends 	= array();
		
		if($USER['ally_id'] != 0){
			$sql	= 'SELECT u.*, x.displayname FROM %%USERS%% as u LEFT JOIN %%USETT%% as x ON u.id = x.id WHERE u.ally_id = :allianceId AND u.id != :userId;';
			$AllyFriend = database::get()->select($sql, array(
				':allianceId'	=> $USER['ally_id'],
				':userId'	=> $USER['id']
			));
			foreach($AllyFriend as $friend){
				$AllyFriends[]	= array(
					'friendId'				=> $friend['id'],
					'friendUsername'		=> $friend['displayname'],
				);
			}
		}

		$sql = "SELECT a.sender, a.id as buddyid, b.id, b.username, b.onlinetime, b.galaxy, b.system, b.planet, b.ally_id, c.ally_name, d.text, x.displayname
		FROM (%%BUDDY%% as a, %%USERS%% as b) LEFT JOIN %%ALLIANCE%% as c ON c.id = b.ally_id LEFT JOIN %%USETT%% as x ON x.id = b.id LEFT JOIN %%BUDDY_REQUEST%% as d ON a.id = d.id
		WHERE (a.sender = :userID AND a.owner = b.id) OR (a.owner = :userID AND a.sender = b.id);";
        $Friends = database::get()->select($sql, array(
            'userID'    => $USER['id']
        ));

		foreach($Friends as $friend){
			if(isset($friend['text']))
				continue;
			
			$AllyFriends[]	= array(
				'friendId'				=> $friend['id'],
				'friendUsername'		=> $friend['displayname'],
			);
		}
		
		$this->tplObj->loadscript('message.js');
		$this->assign(array(
            'RaportID'		=> $RaportID,
            'AllyFriends'	=> $AllyFriends,
            'allyidf'		=> $USER['ally_id'],
        ));
		
		$this->display('page.srtfshow.view.tpl');
	}
	
	function errorarchive()
	{
		global $LNG, $USER;
		
		$this->display('page.messages.error.tpl');
	}
	
	function inarchive()
	{
		global $LNG, $USER;
		$MsgID  	= HTTP::_GP('MsgID', 0);
		
		$sql = "SELECT COUNT(*) as state FROM %%MESSAGES%% WHERE message_owner = :userId AND message_type = 199;";
        $MessageCount = database::get()->selectSingle($sql, array(
			':userId'   => $USER['id'],
		), 'state');
		
		$sql = "SELECT * FROM %%MESSAGES%% WHERE message_id = :message_id;";
        $MessageOwner = database::get()->selectSingle($sql, array(
			':message_id'   => $MsgID,
		));
		
		if($MessageOwner['message_owner'] != $USER['id']){
			echo 4;
		}elseif($MessageCount < 5){
			$sql = "UPDATE %%MESSAGES%% SET message_type = 199 WHERE message_id = :message_id;";
			database::get()->update($sql, array(
				':message_id'   => $MsgID,
			));
		}else{
			echo 5;
		}		
	}
	
    function view()
    {
        global $LNG, $USER;
        $MessCategory  	= HTTP::_GP('messcat', 100);
        $page  			= HTTP::_GP('site', 1);

        $db = Database::get();

        $this->initTemplate();
        $this->setWindow('ajax');

        $MessageList	= array();
        $MessagesID		= array();

        if($MessCategory == 999)  {

            $sql = "SELECT COUNT(*) as state FROM %%MESSAGES%% WHERE message_sender = :userId AND message_type != 50;";
            $MessageCount = $db->selectSingle($sql, array(
                ':userId'   => $USER['id'],
            ), 'state');

            $maxPage	= max(1, ceil($MessageCount / MESSAGES_PER_PAGE));
            $page		= max(1, min($page, $maxPage));

            $sql = "SELECT message_id, message_time, CONCAT(username, ' [',galaxy, ':', system, ':', planet,']') as message_from, message_subject, message_sender, message_type, message_unread, message_text
			FROM %%MESSAGES%% INNER JOIN %%USERS%% ON id = message_owner
			WHERE message_sender = :userId AND message_type != 50
			ORDER BY message_time DESC
			LIMIT :offset, :limit;";

            $MessageResult = $db->select($sql, array(
                ':userId'   => $USER['id'],
                ':offset'   => (($page - 1) * MESSAGES_PER_PAGE),
                ':limit'    => MESSAGES_PER_PAGE
            ));
        }
		else
		{
            if ($MessCategory == 100)
			{
                $sql = "SELECT COUNT(*) as state FROM %%MESSAGES%% WHERE message_owner = :userId;";
                $MessageCount = $db->selectSingle($sql, array(
                    ':userId'   => $USER['id'],
                ), 'state');

                $maxPage	= max(1, ceil($MessageCount / MESSAGES_PER_PAGE));
                $page		= max(1, min($page, $maxPage));

                $sql = "SELECT message_id, message_time, message_from, message_subject, message_sender, message_type, message_unread, message_text
                           FROM %%MESSAGES%%
                           WHERE message_owner = :userId
                           ORDER BY message_time DESC
                           LIMIT :offset, :limit";

                $MessageResult = $db->select($sql, array(
                    ':userId'       => $USER['id'],
                    ':offset'       => (($page - 1) * MESSAGES_PER_PAGE),
                    ':limit'        => MESSAGES_PER_PAGE
                ));
            }
			else
			{
                $sql = "SELECT COUNT(*) as state FROM %%MESSAGES%% WHERE message_owner = :userId AND message_type = :messCategory;";

                $MessageCount = $db->selectSingle($sql, array(
                    ':userId'       => $USER['id'],
                    ':messCategory' => $MessCategory
                ), 'state');

                $sql = "SELECT message_id, message_time, message_from, message_subject, message_sender, message_type, message_unread, message_text
                           FROM %%MESSAGES%%
                           WHERE message_owner = :userId AND message_type = :messCategory
                           ORDER BY message_time DESC
                           LIMIT :offset, :limit";

                $maxPage	= max(1, ceil($MessageCount / MESSAGES_PER_PAGE));
                $page		= max(1, min($page, $maxPage));

                $MessageResult = $db->select($sql, array(
                    ':userId'       => $USER['id'],
                    ':messCategory' => $MessCategory,
                    ':offset'       => (($page - 1) * MESSAGES_PER_PAGE),
                    ':limit'        => MESSAGES_PER_PAGE
                ));
            }
        }

        foreach ($MessageResult as $MessageRow)
        {
            $MessagesID[]	= $MessageRow['message_id'];

            $MessageList[]	= array(
                'id'		=> $MessageRow['message_id'],
                'time'		=> _date($LNG['php_tdformat'], $MessageRow['message_time'], $USER['timezone']),
                'from'		=> $MessageRow['message_from'],
                'subject'	=> $MessageRow['message_subject'],
                'sender'	=> $MessageRow['message_sender'],
                'type'		=> $MessageRow['message_type'],
                'unread'	=> $MessageRow['message_unread'],
                'text'		=> $MessageRow['message_text'],
            );
        }

        if(!empty($MessagesID) && $MessCategory != 999) {
            $sql = 'UPDATE %%MESSAGES%% SET message_unread = 0 WHERE message_id IN ('.implode(',', $MessagesID).') AND message_owner = :userID;';
            $db->update($sql, array(
                ':userID'       => $USER['id'],
            ));
        }

        $this->assign(array(
            'MessID'		=> $MessCategory,
            'MessageCount'	=> $MessageCount,
            'MessageList'	=> $MessageList,
            'page'			=> $page,
            'maxPage'		=> $maxPage,
        ));

        $this->display('page.messages.view.tpl');
    }


    function action()
    {
        global $USER;

        $db = Database::get();

        $MessCategory  	= HTTP::_GP('messcat', 100);
        $page		 	= HTTP::_GP('page', 1);
        $messageIDs		= HTTP::_GP('messageID', array());

        $redirectUrl	= 'game.php?page=messages&category='.$MessCategory.'&side='.$page;

		$action			= false;

        if(isset($_POST['submitTop']))
        {
            $action	= HTTP::_GP('actionTop', '');
        }
        elseif(isset($_POST['submitBottom']))
        {
            $action	= HTTP::_GP('actionBottom', '');
        }
        else
        {
            $this->redirectTo($redirectUrl);
        }

        if($action == 'deleteunmarked' && empty($messageIDs))
            $action	= 'deletetypeall';

        if($action == 'deletetypeall' && $MessCategory == 100)
            $action	= 'deleteall';

        if($action == 'readtypeall' && $MessCategory == 100)
            $action	= 'readall';

        switch($action)
        {
            case 'readall':
                $sql = "UPDATE %%MESSAGES%% SET message_unread = 0 WHERE message_owner = :userID;";
                $db->update($sql, array(
                    ':userID'   => $USER['id']
                ));
			break;
            case 'readtypeall':
                $sql = "UPDATE %%MESSAGES%% SET message_unread = 0 WHERE message_owner = :userID AND message_type = :messCategory;";
                $db->update($sql, array(
                    ':userID'       => $USER['id'],
                    ':messCategory' => $MessCategory
                ));
			break;
            case 'readmarked':
                if(empty($messageIDs))
                {
                    $this->redirectTo($redirectUrl);
                }

                $messageIDs	= array_filter($messageIDs, 'is_numeric');

                if(empty($messageIDs))
                {
                    $this->redirectTo($redirectUrl);
                }

                $sql = 'UPDATE %%MESSAGES%% SET message_unread = 0 WHERE message_id IN ('.implode(',', array_keys($messageIDs)).') AND message_owner = :userID;';
                $db->update($sql, array(
                    ':userID'       => $USER['id'],
                ));
			break;
            case 'deleteall':
                $sql = "DELETE FROM %%MESSAGES%% WHERE message_owner = :userID;";
                $db->delete($sql, array(
                    ':userID'       => $USER['id']
                ));
			break;
            case 'deletetypeall':
                $sql = "DELETE FROM %%MESSAGES%% WHERE message_owner = :userID AND message_type = :messCategory;";
                $db->delete($sql, array(
                    ':userID'       => $USER['id'],
                    ':messCategory' => $MessCategory
                ));
			break;
            case 'deletemarked':
                if(empty($messageIDs))
                {
                    $this->redirectTo($redirectUrl);
                }

                $messageIDs	= array_filter($messageIDs, 'is_numeric');

                if(empty($messageIDs))
                {
                    $this->redirectTo($redirectUrl);
                }

                $sql = 'DELETE FROM %%MESSAGES%% WHERE message_id IN ('.implode(',', array_keys($messageIDs)).') AND message_owner = :userId;';
                $db->delete($sql, array(
                    ':userId'       => $USER['id'],
                ));
			break;
            case 'deleteunmarked':
                if(empty($messageIDs) || !is_array($messageIDs))
                {
                    $this->redirectTo($redirectUrl);
                }

                $messageIDs	= array_filter($messageIDs, 'is_numeric');

                if(empty($messageIDs))
                {
                    $this->redirectTo($redirectUrl);
                }

                $sql = 'DELETE FROM %%MESSAGES%% WHERE message_id NOT IN ('.implode(',', array_keys($messageIDs)).') AND message_owner = :userId;';
                $db->delete($sql, array(
                    ':userId'       => $USER['id'],
                ));
			break;
        }
        $this->redirectTo($redirectUrl);
    }

    function send()
    {
        global $USER, $LNG;
        $receiverID	= HTTP::_GP('id', 0);
        $subject 	= HTTP::_GP('subject', $LNG['mg_no_subject'], true);
		$text		= HTTP::_GP('text', '', true);
		$senderName	= $USER['username'].' ['.$USER['galaxy'].':'.$USER['system'].':'.$USER['planet'].']';

		$text		= makebr($text);

		$session	= Session::load();

        if (empty($receiverID) || empty($text) || !isset($session->messageToken) || $session->messageToken != md5($USER['id'].'|'.$receiverID))
        {
            $this->sendJSON($LNG['mg_error']);
        }

		$session->messageToken = NULL;

		PlayerUtil::sendMessage($receiverID, $USER['id'], $senderName, 1, $subject, $text, TIMESTAMP);
        $this->sendJSON($LNG['mg_message_send']);
    }

    function write()
    {
        global $LNG, $USER;
        $this->setWindow('popup');
        $this->initTemplate();

        $db = Database::get();

        $receiverID       	= HTTP::_GP('id', 0);
        $Subject 			= HTTP::_GP('subject', $LNG['mg_no_subject'], true);

        $sql = "SELECT a.galaxy, a.system, a.planet, b.username, b.id_planet, b.settings_blockPM
        FROM %%PLANETS%% as a, %%USERS%% as b WHERE b.id = :receiverId AND a.id = b.id_planet;";

        $receiverRecord = $db->selectSingle($sql, array(
            ':receiverId'   => $receiverID
        ));

        if (!$receiverRecord)
        {
            $this->printMessage($LNG['mg_error']);
        }

        if ($receiverRecord['settings_blockPM'] == 1)
        {
            $this->printMessage($LNG['mg_receiver_block_pm']);
        }

        Session::load()->messageToken = md5($USER['id'].'|'.$receiverID);

        $this->assign(array(
            'subject'		=> $Subject,
            'id'			=> $receiverID,
            'OwnerRecord'	=> $receiverRecord,
        ));

        $this->display('page.messages.write.tpl');
    }

    function show()
    {
        global $USER;

        $category      	= HTTP::_GP('category', 0);
        $side			= HTTP::_GP('side', 1);

        $db = Database::get();

        $TitleColor    	= array ( 0 => '#FFFF00', 50 => '#666600', 1 => '#FF6699', 2 => '#FF3300', 3 => '#FF9900', 15 => '#6495ed', 5 => '#009933', 4 => '#773399', 99 => '#007070', 999 => '#CCCCCC', 100 => '#ABABAB', 199 => '#ABABAB');

        $sql = "SELECT COUNT(*) as state FROM %%MESSAGES%% WHERE message_sender = :userID AND message_type != 50;";
        $MessOut = $db->selectSingle($sql, array(
            ':userID'   => $USER['id']
        ), 'state');

        $OperatorList	= array();
        $Total			= array(0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 15 => 0, 50 => 0, 99 => 0, 100 => 0, 999 => 0, 199 => 0);
        $UnRead			= array(0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 15 => 0, 50 => 0, 99 => 0, 100 => 0, 999 => 0, 199 => 0);

        $sql = "SELECT username, email FROM %%USERS%% WHERE universe = :universe AND authlevel != :authlevel ORDER BY username ASC;";
        $OperatorResult = $db->select($sql, array(
            ':universe'     => Universe::current(),
            ':authlevel'    => AUTH_USR
        ));

        foreach($OperatorResult as $OperatorRow)
        {
            $OperatorList[$OperatorRow['username']]	= $OperatorRow['email'];
        }

        $sql = "SELECT message_type, SUM(message_unread) as message_unread, COUNT(*) as count FROM %%MESSAGES%% WHERE message_owner = :userID GROUP BY message_type;";
        $CategoryResult = $db->select($sql, array(
            ':userID'   => $USER['id']
        ));

        foreach ($CategoryResult as $CategoryRow)
        {
            $UnRead[$CategoryRow['message_type']]	= $CategoryRow['message_unread'];
            $Total[$CategoryRow['message_type']]	= $CategoryRow['count'];
        }

        $UnRead[100]	= array_sum($UnRead);
        $Total[100]		= array_sum($Total);
        $Total[999]		= $MessOut;

        $CategoryList        = array();

        foreach($TitleColor as $CategoryID => $CategoryColor) {
            $CategoryList[$CategoryID]	= array(
                'color'		=> $CategoryColor,
                'unread'	=> $UnRead[$CategoryID],
                'total'		=> $Total[$CategoryID],
            );
        }

        $this->assign(array(
            'CategoryList'	=> $CategoryList,
            'OperatorList'	=> $OperatorList,
            'category'		=> $category,
            'side'			=> $side,
        ));

        $this->display('page.messages.default.tpl');
    }
}