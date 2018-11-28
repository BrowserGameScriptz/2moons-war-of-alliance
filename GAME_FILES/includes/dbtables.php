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
	'AKS'				=> DB_PREFIX.'aks',
	'ALLIANCE'			=> DB_PREFIX.'alliance',
	'ALLIANCE_RANK'		=> DB_PREFIX.'alliance_ranks',
	'ALLIANCE_REQUEST'	=> DB_PREFIX.'alliance_request',
	'ARSENAL_DETAILS'	=> DB_PREFIX.'arsenal_details',
	'BANNED'			=> DB_PREFIX.'banned',
	'BLACKLIST'			=> DB_PREFIX.'blacklist',
	'BUDDY'				=> DB_PREFIX.'buddy',
	'BUDDY_REQUEST'		=> DB_PREFIX.'buddy_request',
	'CHANGELOGS'		=> DB_PREFIX.'changelogs',
	'CHAT'				=> DB_PREFIX.'chat',
	'CHAT_ON'			=> DB_PREFIX.'chat_online',
	'CHAT_ON_ALLY'		=> DB_PREFIX.'chat_online_ally',
	'CHAT_ON_ROOMS'		=> DB_PREFIX.'chat_rooms_online',
	'CHAT_ROOMS'		=> DB_PREFIX.'chat_rooms',
	'CHAT_ROOMS_MSG'	=> DB_PREFIX.'chat_rooms_messages',
	'CONFIG'			=> DB_PREFIX.'config',
	'CRONJOBS'			=> DB_PREFIX.'cronjobs',
	'CRONJOBS_LOG'		=> DB_PREFIX.'cronjobs_log',
	'DIPLO'				=> DB_PREFIX.'diplo',
	'ENNEMIES'			=> DB_PREFIX.'ennemies',
	'FLEETS'			=> DB_PREFIX.'fleets',
	'FLEETS_EVENT'		=> DB_PREFIX.'fleet_event',
	'IPLOG'				=> DB_PREFIX.'ip_multimod',
	'LOG'				=> DB_PREFIX.'log',
	'LOG_FLEETS'		=> DB_PREFIX.'log_fleets',
	'LOSTPASSWORD'		=> DB_PREFIX.'lostpassword',
	'NEWS'				=> DB_PREFIX.'news',
	'NOTES'				=> DB_PREFIX.'notes',
	'MARKETRES'			=> DB_PREFIX.'market_resource',
	'MEDIA'				=> DB_PREFIX.'media_post',
	'MESSAGES'			=> DB_PREFIX.'messages',
	'MULTI'				=> DB_PREFIX.'multi',
	'PLANETS'			=> DB_PREFIX.'planets',
	'PREMIUM'			=> DB_PREFIX.'premium',
	'RW'				=> DB_PREFIX.'raports',
	'RECORDS'			=> DB_PREFIX.'records',
	'SESSION'			=> DB_PREFIX.'session',
	'SHORTCUTS'			=> DB_PREFIX.'shortcuts',
	'SPECIALOFFER'		=> DB_PREFIX.'specialoffers',
	'STATPOINTS'		=> DB_PREFIX.'statpoints',
	'STORAGESTATS'		=> DB_PREFIX.'storage_stats',
	'SYSTEM'		    => DB_PREFIX.'system',
	'TICKETS'			=> DB_PREFIX.'ticket',
	'TICKETS_ANSWER'	=> DB_PREFIX.'ticket_answer',
	'TICKETS_CATEGORY'	=> DB_PREFIX.'ticket_category',
	'TOPKB'				=> DB_PREFIX.'topkb',
	'TOURNEY'			=> DB_PREFIX.'tourney',
	'TOPKB_USERS'		=> DB_PREFIX.'users_to_topkb',
	'USERS'				=> DB_PREFIX.'users',
	'USETT'				=> DB_PREFIX.'users_settings',
	'USERS_ACS'			=> DB_PREFIX.'users_to_acs',
	'USERS_AUTH'		=> DB_PREFIX.'users_to_extauth',
	'USERS_VALID'	 	=> DB_PREFIX.'users_valid',
	'VARS'	 			=> DB_PREFIX.'vars',
	'VARS_RAPIDFIRE'	=> DB_PREFIX.'vars_rapidfire',
	'VARS_REQUIRE'	 	=> DB_PREFIX.'vars_requriements',
);
// MOD-TABLES