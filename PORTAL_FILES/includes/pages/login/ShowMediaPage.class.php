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


class ShowMediaPage extends AbstractLoginPage
{
	public static $requireModule = 0;

	function __construct() 
	{
		parent::__construct();
	}
	
	function show() 
	{
		$config	= Config::get();
		
		$sql = "SELECT * FROM %%MEDIA%%;";
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
		
		$this->assign(array(
			'mediaArray' => $mediaArray,
		));
		
		$this->display('page.media.default.tpl');
	}
	
	function allwallpappers() 
	{
		$config	= Config::get();
		
		$sql = "SELECT * FROM %%MEDIA%% WHERE mediaType = 2;";
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
		
		$this->assign(array(
			'mediaArray' => $mediaArray,
		));
		
		$this->display('page.media.wallpappers.tpl');
	}
	
	function allscreenshots() 
	{
		$config	= Config::get();
		
		$sql = "SELECT * FROM %%MEDIA%% WHERE mediaType = 1;";
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
		
		$this->assign(array(
			'mediaArray' => $mediaArray,
		));
		
		$this->display('page.media.screenshots.tpl');
	}
	
	function allvideos() 
	{
		$config	= Config::get();
		
		$sql = "SELECT * FROM %%MEDIA%% WHERE mediaType = 3;";
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
		
		$this->assign(array(
			'mediaArray' => $mediaArray,
		));
		
		$this->display('page.media.videos.tpl');
	}
	
	function watchvid() 
	{
		$config	= Config::get();
		$id		= HTTP::_GP('id', 0);
		$sql = "SELECT * FROM %%MEDIA%% WHERE mediaId = :mediaId AND mediaType = 3;";
		$mediaInfo = database::get()->selectSingle($sql, array(
			':mediaId'	=> $id
		));
		
		if(empty($mediaInfo))
			$this->redirectTo('index.php?page=media&mode=allvideos');
		
		$this->assign(array(
			'mediaInfo' => $mediaInfo,
		));
		
		$this->display('page.media.watch.tpl');
	}
}
