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

define('DB_VERSION_REQUIRED', 2);
define('DB_NAME'			, $database['databasename']);
define('DB_PREFIX'			, $database['tableprefix']);

// Data Tabells
$dbTableNames	= array(
	'CHANGELOGS'		=> DB_PREFIX.'changelogs',
	'CHAT'				=> DB_PREFIX.'chat',
	'CONFIG'			=> DB_PREFIX.'config',
	'LOSTPASSWORD'		=> DB_PREFIX.'lostpassword',
	'NEWS'				=> DB_PREFIX.'news',
	'MEDIA'				=> DB_PREFIX.'media_post',
	'SESSION'			=> DB_PREFIX.'session',
	'USERS'				=> DB_PREFIX.'users',
	'USETT'				=> DB_PREFIX.'users_settings',
	'USERS_VALID'	 	=> DB_PREFIX.'users_valid',
	'VOTE'	 			=> DB_PREFIX.'votesystem',
	

);
// MOD-TABLES