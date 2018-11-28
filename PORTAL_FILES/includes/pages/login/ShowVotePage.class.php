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


class ShowVotePage extends AbstractLoginPage
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
		
		$sql = "SELECT * FROM %%USETT%% WHERE id = :userId;";
		$loginData = database::get()->selectSingle($sql, array(
			':userId'	=> $session->userId
		));
		
		$this->tplObj->loadscript('jquery.countdown.js');
		
		$sql		= 'SELECT * FROM %%VOTE%% ';
		$voteSystems= database::get()->select($sql, array());
		
		$voteSystem = array();
		
		foreach($voteSystems as $vote){
			if($vote['id'] == 1)
				$ivn = "/".$loginData['id'];
			elseif($vote['id'] == 2)
				$ivn = "&id=".$loginData['id'];
			elseif($vote['id'] == 3)
				$ivn = "&id=".$loginData['id'];
			elseif($vote['id'] == 4)
				$ivn = "&mark=".$loginData['id'];
			
			$secunde	= $loginData['vote_sys_'.$vote['id'].''] + $vote['time'] * 3600 - TIMESTAMP;	
			
			$voteSystem[$vote['id']]	= array(
				'image'	=> $vote['image'],
				'price'	=> $vote['prize'],
				'link1'	=> $vote['link'].$ivn,
			);
		}
		
		$this->assign(array(
			'voteSystem' => $voteSystem,
		));
		
		$this->display('page.vote.default.tpl');
	}
}
