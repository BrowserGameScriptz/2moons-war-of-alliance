<?php

define('MODE', 'INGAME');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);
require 'includes/common.php';


$arr 			= array ();
$ajax 	 		= HTTP::_GP('ajax', 0);
$left_line 	 	= HTTP::_GP('left_line', '', UTF8_SUPPORT);
$content_line	= HTTP::_GP('content_line', '', UTF8_SUPPORT);
$purchase_line	= HTTP::_GP('purchase_line', '', UTF8_SUPPORT);
$MessageToSend	= "";
if($ajax != 1)
	exit;

if($left_line == "default"){
	$arr = array('LEFT' => array('HTML'=>'<div class="gr-title-menu">'.$LNG['market_1'].'</div><div onclick="Gr.LeftShow(\'resources\');" class="btn btn-primary gr-btn-menu gr-btn">'.$LNG['market_2'].'</div><div class="gr-title-menu">'.$LNG['market_3'].'</div><div onclick="parent.Dialog.CreateLotResources();" class="btn btn-primary gr-btn-menu gr-btn">'.$LNG['market_4'].'</div><div onclick="parent.Frame.IFrame.open(\'market\', \'yourlots\');" class="btn btn-primary gr-btn-menu gr-btn ">'.$LNG['market_5'].'</div>'), 'CONTENT' => array());	
}elseif($left_line == "resources"){
	$arr = array('LEFT' => array('HTML'=>'<div class="gr-title-menu">'.$LNG['market_2'].':</div><div onclick="Gr.LeftShow(\'default\');" class="btn gr-btn gr-btn-back">'.$LNG['market_7'].'</div><div class="gr-menu-content"><lable class="gr-lable">'.$LNG['market_9'].'</lable><select class="gr-menu-input" id="ri"><option value="901" >'.$LNG['tech'][901].'</option><option value="902" selected>'.$LNG['tech'][902].'</option><option value="903" >'.$LNG['tech'][903].'</option></select><div class="clear"></div><lable class="gr-lable">'.$LNG['market_8'].'</lable><select class="gr-menu-input" id="gi"><option value="901" selected>'.$LNG['tech'][901].'</option><option value="902" >'.$LNG['tech'][902].'</option><option value="903" >'.$LNG['tech'][903].'</option></select><div class="btn gr-btn-menu btn-primary" onclick="Gr.searchLot(\'resources\');">'.$LNG['market_10'].'</div></div>'), 'CONTENT' => array());	
}elseif($content_line == "resources"){
	$ri 	 		= HTTP::_GP('ri', 0);
	$gi 	 		= HTTP::_GP('gi', 0);
	$allowedId		= array(901,902,903);
	
	$sql	= "SELECT * FROM %%MARKETRES%% WHERE soldBy != :soldBy AND soldType = :soldType AND buyType = :buyType AND boughtBy = 0 AND inputTime > :inputTime;";
	$saleData = database::get()->select($sql, array(
		':soldBy'     => $USER['id'],
		':soldType'   => $ri,
		':buyType'    => $gi,
		':inputTime'  => TIMESTAMP - 3 * 3600 * 24,
	)); 	
	
	if(!in_array($ri, $allowedId) || !in_array($gi, $allowedId))
		$MessageToSend = $LNG['market_17'];
	elseif(empty($saleData))
		$MessageToSend = $LNG['market_27'];
	else{
		$MessageToSend = '<table class="gr-table"><tbody>';
		$MessageToSend .= '<tr>
        	<th style="width:10px;">&nbsp;</th> 
            <th>'.$LNG['market_9'].'</th> 
            <th>'.$LNG['market_20'].'</th>
			<th colspan="2">'.$LNG['market_8'].'</th>
        </tr>';
		$count=0;
		foreach($saleData as $Data){
			$count++;
			//$MessageToSend .= '<tr><td>'.$count.'</td><td><div class="gr-res-row c-'.$Data['soldType'].'"><div class="gr-res-row-i ri i-'.$Data['soldType'].'"></div>'.pretty_number($Data['soldAmount']).'</div></td><td>'.round($Data['soldAmount'] / $Data['buyAmount'],2).'</td><td width="160px"><div onclick="Gr.buy(\'resources\', '.$Data['saleId'].', ['.$Data['buyType'].','.$Data['buyAmount'].']);" class="btn btn-primary c-'.$Data['buyType'].'"><div class="btn-ico ri i-'.$Data['buyType'].'"></div><div class="btn-content">'.pretty_number($Data['buyAmount']).'</div></div></td><td width="100px"><div onclick="Gr.buy(\'resources\', '.$Data['saleId'].', [921,7]);" class="btn btn-primary"><div class="btn-ico ri i-921"></div><div class="btn-content">7</div></div></td></tr>';
			$MessageToSend .= '<tr><td>'.$count.'</td><td><div class="gr-res-row c-'.$Data['soldType'].'"><div class="gr-res-row-i ri i-'.$Data['soldType'].'"></div>'.pretty_number($Data['soldAmount']).'</div></td><td>1/'.round($Data['buyAmount'] / $Data['soldAmount'],3).'</td><td width="160px"><div onclick="Gr.buy(\'resources\', '.$Data['saleId'].', ['.$Data['buyType'].','.$Data['buyAmount'].']);" class="btn btn-primary c-'.$Data['buyType'].'"><div class="btn-ico ri i-'.$Data['buyType'].'"></div><div class="btn-content">'.pretty_number($Data['buyAmount']).'</div></div></td></tr>';
		}
		$MessageToSend .= '</tbody></table>';
	}
	$arr = array("LEFT"=>array(),"CONTENT"=>array("HTML"=>$MessageToSend));	
}elseif($purchase_line == "resources"){
	$lotId		= HTTP::_GP('id', 0);
	$ri			= HTTP::_GP('ri', 0);
	$allowedId	= array(901,902,903);
	
	if(!in_array($ri, $allowedId)){
		$arr = array("MSG"=>$LNG['market_17'],"RES"=>array(),"ERROR"=>false,"S"=>"resources");	
		$MessageToSend = $LNG['market_17'];
	}else{
		$sql	= "SELECT * FROM %%MARKETRES%% WHERE saleId = :saleId AND boughtBy = 0;";
		$saleData = database::get()->selectSingle($sql, array(
			':saleId'     => $lotId,
			//':inputTime'  => TIMESTAMP - 3 * 3600 * 24,
		));
		
		if(empty($saleData)){
			$arr = array("MSG"=>$LNG['market_17'],"RES"=>array(),"ERROR"=>false,"S"=>"resources");
		}elseif($PLANET[$resource[$ri]] < $saleData['buyAmount']){
			$arr = array("MSG"=>$LNG['market_29'],"RES"=>array(),"ERROR"=>false,"S"=>"resources");
		}else{
			$PLANET[$resource[$saleData['buyType']]]  -= $saleData['buyAmount'];
			$PLANET[$resource[$saleData['soldType']]] += $saleData['soldAmount'];
			
			$sql	= "UPDATE %%PLANETS%% SET ".$resource[$saleData['buyType']]." = ".$resource[$saleData['buyType']]." - :removePlanet, ".$resource[$saleData['soldType']]." = ".$resource[$saleData['soldType']]." + :addPlanet WHERE id = :planetId;";
			database::get()->update($sql, array(
				':removePlanet' => $saleData['buyAmount'],
				':addPlanet' 	=> $saleData['soldAmount'],
				':planetId'     => $PLANET['id'],
			));
			
			$sql	= "UPDATE %%MARKETRES%% SET boughtBy = :boughtBy, boughtTime = :boughtTime WHERE saleId = :saleId AND boughtBy = 0;";
			database::get()->update($sql, array(
				':boughtBy'   => $USER['id'],
				':boughtTime' => TIMESTAMP,
				':saleId'     => $lotId,
			));
			
			$arr = array("MSG"=>sprintf($LNG['market_28'], pretty_number($saleData['soldAmount']), $LNG['tech'][$saleData['soldType']], pretty_number($saleData['buyAmount']), $LNG['tech'][$saleData['buyType']]),"RES"=>array("0"=>array($saleData['buyType'],(-$saleData['buyAmount'])),"1"=>array($saleData['soldType'],$saleData['soldAmount'])),"ERROR"=>false,"S"=>"resources");
		}
	}
}
echo json_encode($arr);


