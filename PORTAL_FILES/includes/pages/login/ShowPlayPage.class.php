<?php

/**
 *  2Moons
 *  Copyright (C) 2012 Jan Kröpke
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package 2Moons
 * @author Jan Kröpke <info@2moons.cc>
 * @copyright 2012 Jan Kröpke <info@2moons.cc>
 * @license http://www.gnu.org/licenses/gpl.html GNU GPLv3 License
 * @version 1.7.2 (2013-03-18)
 * @info $Id$
 * @link http://2moons.cc/
 */


class ShowPlayPage extends AbstractLoginPage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}
	
	function show() 
	{

		$session = session::load();
		if(!$session->isValidSession())
		{
			$session->delete();			
			$this->printMessage("You have to login to access the game !", true, array('index.php?page=login', 3));	
		}else{
			$sql	= "SELECT * FROM %%USERS%% WHERE id = :userId;";
			$USER	= database::get()->selectSingle($sql, array(
				':userId'	=> $session->userId
			)); 
			$sql	= "SELECT * FROM %%USETT%% WHERE id = :userId;";
			$USETT	= database::get()->selectSingle($sql, array(
				':userId'	=> $session->userId
			)); 
			
			$universe = HTTP::_GP('universe', 'play', UTF8_SUPPORT);
			$authorisedArray = array('play');
			if(!in_array($universe, $authorisedArray)) 
				$this->printMessage("This universe does not exist on this game !", true, array('index.php', 3));	 
			
			header('Location: https://'.$universe.'.warofalliance.eu/accountCheck.php?referralID='.$USER['ref_id'].'&email='.$USER['email'].'&username='.$USER['username'].'&lang='.$USER['lang'].'&userId='.$USER['id'].'&securityEncodage='.$USETT['securityEncodage'].'&securityCode='.$USER['securityCode'].'&secretQuestion='.$USETT['secretQuestion'].'&secretAnswer='.$USETT['secretAnswer'].'&birthday='.$USETT['birthday'].'&displayname='.$USETT['displayname'].'&password='.$USER['password']); 
		}
	}
}