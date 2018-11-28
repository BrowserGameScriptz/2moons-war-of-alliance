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

class ShowNewsPage extends AbstractLoginPage
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
					$subject 	= HTTP::_GP('subject', "", UTF8_SUPPORT);
					$newsTxt	= HTTP::_GP('text', "", UTF8_SUPPORT);
					
					if(!empty($newsTxt) && !empty($subject)){
						$sql = "INSERT INTO %%NEWS%% SET user = :userName, date = :timestamp, title = :title, text = :text;";
						database::get()->insert($sql, array(
							':userName'	=> $AccountInfo['username'],
							':timestamp'=> TIMESTAMP,
							':title'	=> $subject,
							':text'		=> $newsTxt
						));
						$this->printMessage("The news has been added", true, array('index.php?page=news&mode=create', 3));	
					}else{
						$this->printMessage("You have to fill in all fields !", true, array('index.php?page=news&mode=create', 3));	 
					}
				}
				
				$this->assign(array(
					'usersOnline'			=> sprintf($LNG['account_p17'], config::get()->usersOnline),
					'game_disable'			=> config::get()->game_disable,
				));
				
				$this->display('page.news.create.tpl');
			}
		}
	}
	
	function show() 
	{
		global $LNG;

		$newsId = HTTP::_GP('id', 1);
		
		if($newsId == 0){
			$sql = "SELECT date, title, text, user FROM %%NEWS%% ORDER BY id DESC LIMIT 1;";
			$newsResult = Database::get()->selectSingle($sql);
		}else{
			$sql = "SELECT date, title, text, user FROM %%NEWS%% WHERE id = :newsId ORDER BY id DESC LIMIT 1;";
			$newsResult = Database::get()->selectSingle($sql, array(
				':newsId'	=> $newsId
			));
		}
		
		$sql = "SELECT id, date, title, text, user FROM %%NEWS%% WHERE id < :newsId ORDER BY id DESC LIMIT 1;";
		$selectOlder = Database::get()->selectSingle($sql, array(
			':newsId'	=> $newsId
		));
		$sql = "SELECT id, date, title, text, user FROM %%NEWS%% WHERE id > :newsId ORDER BY id DESC LIMIT 1;";
		$selectNewer = Database::get()->selectSingle($sql, array(
			':newsId'	=> $newsId
		));

		$newsList	= array(
			'title' => $newsResult['title'],
			'from' 	=> sprintf($LNG['news_from'], _date($LNG['php_tdformat'], $newsResult['date']), $newsResult['user']),
			'text' 	=> makebr($newsResult['text']),
		);
		
		$this->assign(array(
			'newsList'		=> $newsList,
			'selectOlder'	=> empty($selectOlder) ? 0 : $selectOlder['id'],
			'selectNewer'	=> empty($selectNewer) ? 0 : $selectNewer['id'],
		));
		
		$this->display('page.news.default.tpl');
	}
}