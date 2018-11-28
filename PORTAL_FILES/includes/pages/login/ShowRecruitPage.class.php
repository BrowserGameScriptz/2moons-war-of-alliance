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

class ShowRecruitPage extends AbstractLoginPage
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
		
		$sql = "SELECT id, password, user_lastip, onlinetime, timezone FROM %%USERS%% WHERE id = :userId;";
		$loginData = database::get()->selectSingle($sql, array(
			':userId'	=> $session->userId
		));
		
		$sql = "SELECT id, username, register_time, onlinetime FROM %%USERS%% WHERE ref_id = :userId;";
		$recruitData = database::get()->select($sql, array(
			':userId'	=> $loginData['id']
		));
		
		$activeRecruit 		= array();
		$inactiveRecruit 	= array();
		
		foreach($recruitData as $Recruit){
				if($Recruit['onlinetime'] >= TIMESTAMP - 604800){
					$activeRecruit[$Recruit['id']]	= array(
						'recruitName'	=> $Recruit['username'],
						'recruitReg'	=> _date('d M Y H:i:s', $Recruit['register_time'], $loginData['timezone']),
						'recruitOn'		=> _date('d M Y H:i:s', $Recruit['onlinetime'], $loginData['timezone']),
					);
				}elseif($Recruit['onlinetime'] < TIMESTAMP - 604800){
					$inactiveRecruit[$Recruit['id']]	= array(
						'recruitName'	=> $Recruit['username'],
						'recruitReg'	=> _date('d M Y H:i:s', $Recruit['register_time'], $loginData['timezone']),
						'recruitOn'		=> _date('d M Y H:i:s', $Recruit['onlinetime'], $loginData['timezone']),
					);
				}
			
		}
		
		$this->assign(array(
			'loginId' 			=> $loginData['id'],
			'activeRecruit' 	=> $activeRecruit,
			'inactiveRecruit' 	=> $inactiveRecruit,
		));
		
		$this->display('page.recruit.default.tpl');
	}
}