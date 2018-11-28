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

define('MODE', 'ADMIN');
define('DATABASE_VERSION', 'OLD');

define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');

require 'includes/common.php';
require 'includes/classes/class.Log.php';

if ($USER['authlevel'] == AUTH_USR)
{
	HTTP::redirectTo('frame.php');
}

$session	= Session::create();
if($session->adminAccess != 1)
{
	include_once('includes/pages/adm/ShowLoginPage.php');
	ShowLoginPage();
	exit;
}

$uni	= HTTP::_GP('uni', 0);

if($USER['authlevel'] == AUTH_ADM && !empty($uni))
{
	Universe::setEmulated($uni);
}

$page	= HTTP::_GP('page', '');
switch($page)
{
	//NEW LINES
	case 'translate':
		include_once('includes/pages/adm/ShowTranslatePage.php');
		ShowTranslatePage();
	break;
	
	case 'newlanguage':
		include_once('includes/pages/adm/ShowTranslatePage.php');
		ShowNewlanguagePage();
	break;
	
	case 'langedit':
		include_once('includes/pages/adm/ShowTranslatePage.php');
		ShowLangeditPage();
	break;
	
	case 'generalset':
		include_once('includes/pages/adm/ShowGeneralsetPage.php');
		ShowGeneralsetPage();
	break;
	case 'metaset':
		include_once('includes/pages/adm/ShowGeneralsetPage.php');
		ShowMetaPage();
	break;
	
	//BLOCK2
	case 'universeset':
		include_once('includes/pages/adm/ShowIngamesetPage.php');
		ShowIngamesetPage();
	break;
	case 'queuset':
		include_once('includes/pages/adm/ShowIngamesetPage.php');
		ShowQueusetPage();
	break;
	case 'referalset':
		include_once('includes/pages/adm/ShowIngamesetPage.php');
		ShowRefsetPage();
	break;
	case 'colonyset':
		include_once('includes/pages/adm/ShowIngamesetPage.php');
		ShowColonysetPage();
	break;
	case 'planetset':
		include_once('includes/pages/adm/ShowIngamesetPage.php');
		ShowPlanetsetPage();
	break;
	case 'debrisset':
		include_once('includes/pages/adm/ShowIngamesetPage.php');
		ShowDebrissetPage();
	break;
	case 'noobset':
		include_once('includes/pages/adm/ShowIngamesetPage.php');
		ShowNoobsetPage();
	break;
	case 'variousset':
		include_once('includes/pages/adm/ShowIngamesetPage.php');
		ShowVarioussetPage();
	break;
	case 'proxyset':
		include_once('includes/pages/adm/ShowIngamesetPage.php');
		ShowProxysetPage();
	break;
	case 'module':
		include_once('includes/pages/adm/ShowModulePage.php');
		ShowModulePage();
	break;
	case 'statsconf':
		include_once('includes/pages/adm/ShowStatsPage.php');
		ShowStatsPage();
	break;
	case 'cronjob':
		include_once('includes/pages/adm/ShowCronjobPage.php');
		ShowCronjob();
	break;
	//BLOCK4
	case 'playerlist':
		include_once('includes/pages/adm/ShowVariousoptPage.php');
		ShowPlayerlistPage();
	break;
	case 'planetlist':
		include_once('includes/pages/adm/ShowVariousoptPage.php');
		ShowPlanetlistPage();
	break;
	case 'planetalist':
		include_once('includes/pages/adm/ShowVariousoptPage.php');
		ShowPlanetalistPage();
	break;
	case 'messagelist':
		include_once('includes/pages/adm/ShowMessageListPage.php');
		ShowMessageListPage();
	break;
	case 'tracking':
		include_once('includes/pages/adm/ShowTrackingPage.php');
		ShowTrackingPage();
	break;
	
	
	
	//END NEW LINES
	case 'logout':
		include_once('includes/pages/adm/ShowLogoutPage.php');
		ShowLogoutPage();
	break;
	case 'topnav':
		include_once('includes/pages/adm/ShowTopnavPage.php');
		ShowTopnavPage();
	break;
	case 'overview':
		include_once('includes/pages/adm/ShowOverviewPage.php');
		ShowOverviewPage();
	break;
	case 'menu':
		include_once('includes/pages/adm/ShowMenuPage.php');
		ShowMenuPage();
	break;
	default:
		include_once('includes/pages/adm/ShowIndexPage.php');
		ShowIndexPage();
	break;
	case 'clearcache':
		include_once('includes/pages/adm/ShowClearCachePage.php');
		ShowClearCachePage();
	break;
	case 'fleets':
		include_once('includes/pages/adm/ShowFlyingFleetPage.php');
		ShowFlyingFleetPage();
	break;
	case 'globalmessage':
		include_once('includes/pages/adm/ShowSendMessagesPage.php');
		ShowSendMessagesPage();
	break;
	case 'search':
		include_once(ROOT_PATH . 'includes/pages/adm/ShowSearchPage.php');
		ShowSearchPage();
	break;
}
