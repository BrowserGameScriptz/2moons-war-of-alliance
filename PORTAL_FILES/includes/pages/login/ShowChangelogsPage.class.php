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


class ShowChangelogsPage extends AbstractLoginPage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}
	
	function create() 
	{
		global $LNG;
		
		$session = session::load();
		if(!$session->isValidSession())
		{
			$session->delete;
			HTTP::redirectTo('index.php');	
		}else{
			$sql	= "SELECT * FROM %%USERS%% WHERE id = :userId;";
			$AccountInfo	= database::get()->selectSingle($sql, array(
				':userId'	=> $session->userId
			)); 
			
			if($AccountInfo['authlevel'] < 3){
				HTTP::redirectTo('index.php');	
			}else{
				
				if($_SERVER['REQUEST_METHOD'] === 'POST'){	
					$changeTxt = HTTP::_GP('text', "", UTF8_SUPPORT);
					
					if(!empty($changeTxt)){
						$sql = "INSERT INTO %%CHANGELOGS%% SET userName = :userName, timestamp = :timestamp, text = :text;";
						database::get()->insert($sql, array(
							':userName'	=> $AccountInfo['username'],
							':timestamp'=> TIMESTAMP,
							':text'		=> $changeTxt
						));
						$this->printMessage("The changelog has been added", true, array('?page=changelogs&mode=create', 3));	
					}else{
						$this->printMessage("You have to enter a changelog description !", true, array('?page=changelogs&mode=create', 3));	 
					}
				}
				
				$this->assign(array(
					'usersOnline'			=> sprintf($LNG['account_p17'], config::get()->usersOnline),
					'game_disable'			=> config::get()->game_disable,
				));
				
				$this->display('page.changelogs.create.tpl');
			}
		}
	}
	
	function show() 
	{
		global $LNG;
		
		$changelogId = HTTP::_GP('changelog', 1);
		$DisplayChan = array();
		
		$sql = "SELECT * FROM %%CHANGELOGS%% WHERE universe = :universe ORDER BY revId DESC LIMIT 30;";
		$ChangeData = database::get()->select($sql, array(
			':universe'	=> $changelogId
		));
		
		foreach($ChangeData as $Data){
			$DisplayChan[$Data['revId']] = array(
				'userName'	=> $Data['userName'],
				'timestamp'	=> _date('d M G:i', $Data['timestamp']),
				'text'		=> makebr($Data['text']),
			);
		}
		
		$this->assign(array(
			'DisplayChan'	=> $DisplayChan,
			'changelogId'	=> $changelogId,
		));
		
		$this->display('page.changelogs.default.tpl');
	}
}
