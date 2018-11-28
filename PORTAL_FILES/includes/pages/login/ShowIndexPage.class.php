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

class ShowIndexPage extends AbstractLoginPage
{
	function __construct() 
	{
		parent::__construct();
		$this->setWindow('light');
	}
	
	function show() 
	{
		global $LNG;
		
		$referralID		= HTTP::_GP('ref', 0);
		if(!empty($referralID))
		{
			$this->redirectTo('index.php?page=register&referralID='.$referralID);
		}
	
		$universeSelect	= array();
		
		foreach(Universe::availableUniverses() as $uniId)
		{
			$config = Config::get($uniId);
			$universeSelect[$uniId]	= $config->uni_name.($config->game_disable == 0 ? $LNG['uni_closed'] : '');
		}
		
		$Code	= HTTP::_GP('code', 0);
		$loginCode	= false;
		if(isset($LNG['login_error_'.$Code]))
		{
			$loginCode	= $LNG['login_error_'.$Code];
		}
		
		$sql = "SELECT * FROM %%MEDIA%% WHERE mediaType = 1 ORDER BY RAND() LIMIT 3;";
		$mediaInfo = database::get()->select($sql, array());
		$mediaArray= array();
		
		foreach($mediaInfo as $media){
			$mediaArray[$media['mediaId']]	= array(
				'mediaTitle'	=> $media['mediaTitle'],
				'mediaLocation'	=> $media['mediaLocation'],
				'mediaLocation2'=> $media['mediaLocation2'],
				'mediaType'		=> $media['mediaType'],
				'imageBlock'	=> $media['imageBlock'],
				'mediaDescription'=> $media['mediaDescription'],
			);
		
		}
		
		$sql = "SELECT * FROM %%MEDIA%% WHERE mediaType = 3 ORDER BY RAND() LIMIT 1;";
		$mediaInfo = database::get()->selectSingle($sql, array());
		
		$sql = "SELECT id, date, title, text, user FROM %%NEWS%% ORDER BY id DESC LIMIT 3;";
		$newsResult = Database::get()->select($sql);

		$newsList	= array();
		
		foreach ($newsResult as $newsRow)
		{
			$newsList[]	= array(
				'id'	 => $newsRow['id'],
				'title' => $newsRow['title'],
				'from' 	=> sprintf($LNG['news_from'], _date($LNG['php_tdformat'], $newsRow['date']), $newsRow['user']),
				'text' 	=> (strlen(makebr($newsRow['text'])) > 150) ? substr(makebr($newsRow['text']), 0, 150) . '...' : makebr($newsRow['text']),
			);
		}
		
		$config				= Config::get();
		$url="https://www.warofalliance.eu/onlinecount.php"; 
		$postdata = "universe=woa";  

		$ch = curl_init();  
		curl_setopt ($ch, CURLOPT_URL, $url); 
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
		curl_setopt ($ch, CURLOPT_TIMEOUT, 10); 
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0); 
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt ($ch, CURLOPT_REFERER, $url); 
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata); 
		curl_setopt ($ch, CURLOPT_POST, 1); 
		$result = curl_exec ($ch); 
		curl_close($ch);
		//echo $result;
		
		$this->assign(array(
			'usersOnline'			=> sprintf($LNG['account_p17'], $result),
			'game_disable'			=> config::get()->game_disable,
			'newsList'				=> $newsList,
			'mediaInfo'				=> $mediaInfo,
			'mediaArray'			=> $mediaArray,
			'universeSelect'		=> $universeSelect,
			'code'					=> $loginCode,
		));
		
		$this->display('page.index.default.tpl');
	}
}