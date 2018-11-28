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

class ShowBattleHallPage extends AbstractGamePage
{
	public static $requireModule = MODULE_BATTLEHALL;

	function __construct()
    {
		parent::__construct();
	}

	function show()
	{
		global $USER, $LNG;
		$order  = HTTP::_GP('order', 'units');
		$sort   = HTTP::_GP('sort', 'desc');
		$sort   = strtoupper($sort) === "DESC" ? "DESC" : "ASC";


		switch($order)
		{
			case 'date':
				$key = '%%TOPKB%%.time '.$sort;
				break;
			case 'units':
			default:
				$key = '%%TOPKB%%.units '.$sort;
				break;
		}
		//TOP 100 LAST MONTH
		$db = Database::get();
		$sql = "SELECT *, (
			SELECT DISTINCT
			IF(%%TOPKB_USERS%%.username = '', GROUP_CONCAT(%%USERS%%.username SEPARATOR ' & '), GROUP_CONCAT(%%TOPKB_USERS%%.username SEPARATOR ' & '))
			FROM %%TOPKB_USERS%%
			LEFT JOIN %%USERS%% ON uid = %%USERS%%.id
			WHERE %%TOPKB_USERS%%.rid = %%TOPKB%%.rid AND role = 1
		) as attacker,
		(
			SELECT DISTINCT
			IF(%%TOPKB_USERS%%.username = '', GROUP_CONCAT(%%USERS%%.username SEPARATOR ' & '), GROUP_CONCAT(%%TOPKB_USERS%%.username SEPARATOR ' & '))
			FROM %%TOPKB_USERS%% INNER JOIN %%USERS%% ON uid = id
			WHERE %%TOPKB_USERS%%.rid = %%TOPKB%%.`rid` AND `role` = 2
		) as defender
		FROM %%TOPKB%% WHERE universe = :universe AND time > :time ORDER BY ".$key." LIMIT 100;";

		$top = $db->select($sql, array(
			':universe' => Universe::current(),
			':time' 	=> TIMESTAMP - 31*3600*24
		));

		$TopKBList	= array();
		foreach($top as $data)
		{
			$TopKBList[]	= array(
				'result'	=> $data['result'],
				'date'		=> _date("d. M Y", $data['time'], $USER['timezone']),
				'time'		=> TIMESTAMP - $data['time'],
				'units'		=> $data['units'],
				'rid'		=> $data['rid'],
				'attacker'	=> $data['attacker'],
				'defender'	=> $data['defender'],
			);
		}
		
		//TOP10 ALL TIMES
		$sort= "DESC";
		$key = '%%TOPKB%%.units '.$sort;
		$sql = "SELECT *, (
			SELECT DISTINCT
			IF(%%TOPKB_USERS%%.username = '', GROUP_CONCAT(%%USERS%%.username SEPARATOR ' & '), GROUP_CONCAT(%%TOPKB_USERS%%.username SEPARATOR ' & '))
			FROM %%TOPKB_USERS%%
			LEFT JOIN %%USERS%% ON uid = %%USERS%%.id
			WHERE %%TOPKB_USERS%%.rid = %%TOPKB%%.rid AND role = 1
		) as attacker,
		(
			SELECT DISTINCT
			IF(%%TOPKB_USERS%%.username = '', GROUP_CONCAT(%%USERS%%.username SEPARATOR ' & '), GROUP_CONCAT(%%TOPKB_USERS%%.username SEPARATOR ' & '))
			FROM %%TOPKB_USERS%% INNER JOIN %%USERS%% ON uid = id
			WHERE %%TOPKB_USERS%%.rid = %%TOPKB%%.`rid` AND `role` = 2
		) as defender
		FROM %%TOPKB%% WHERE universe = :universe ORDER BY ".$key." LIMIT 10;";

		$top = $db->select($sql, array(
			':universe' => Universe::current(),
		));

		$TopKBList10	= array();
		foreach($top as $data)
		{
			$TopKBList10[]	= array(
				'result'	=> $data['result'],
				'date'		=> _date("d. M Y", $data['time'], $USER['timezone']),
				'time'		=> TIMESTAMP - $data['time'],
				'units'		=> $data['units'],
				'rid'		=> $data['rid'],
				'attacker'	=> $data['attacker'],
				'defender'	=> $data['defender'],
			);
		}
		
		//TOP10 PLAYERS UNITS DESTROYED
		$sql = "SELECT user.desunits, user.id, usett.displayname FROM %%USERS%% as user LEFT JOIN %%USETT%% as usett ON user.id = usett.id ORDER BY user.desunits DESC LIMIT 10;";
		$TOPUSERS = database::get()->select($sql, array(
			':id_owner'	=> $USER['id'],
		));
		
		$TopKBListUnit	= array();
		$Counting		= 0;
		
		foreach($TOPUSERS as $data)
		{
			$Counting += 1;
			$TopKBListUnit[$data['id']]	= array(
				'desunits'	=> $data['desunits'],
				'username'	=> $data['displayname'],
				'Counting'	=> $Counting,
			);
		}

		//TOP50 POINT OF WARS
		$sql = "SELECT usett.pointofwar, user.id, usett.displayname FROM %%USERS%% as user LEFT JOIN %%USETT%% as usett ON user.id = usett.id ORDER BY usett.pointofwar DESC LIMIT 50;";
		$TOPWARS = database::get()->select($sql, array(
			':id_owner'	=> $USER['id'],
		));
		
		$TopKBListWars	= array();
		$Counting		= 0;
		
		foreach($TOPWARS as $data)
		{
			$Counting += 1;
			$TopKBListWars[$data['id']]	= array(
				'pointofwar'=> $data['pointofwar'],
				'username'	=> $data['displayname'],
				'Counting'	=> $Counting,
			);
		}

		$this->assign(array(
			'TopKBList'		=> $TopKBList,
			'TopKBList10'	=> $TopKBList10,
			'TopKBListUnit'	=> $TopKBListUnit,
			'TopKBListWars'	=> $TopKBListWars,
			'sort'			=> $sort,
			'order'			=> $order,
		));

		$this->display('page.battleHall.default.tpl');
	}
}