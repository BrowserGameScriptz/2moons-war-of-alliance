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

class ShowAccountPage extends AbstractLoginPage
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
		
		$sql = "SELECT COUNT(*) as state FROM %%USERS%% WHERE ref_id = :userId AND universe = :universe;";
		$Count = database::get()->selectSingle($sql, array(
			':userId' 		=> $session->userId,
			':universe'		=> Universe::current()
		), 'state');
		
		$this->assign(array(
			'Countref'	=> $Count,
		));
		
		$this->display('page.account.default.tpl');
	}
}