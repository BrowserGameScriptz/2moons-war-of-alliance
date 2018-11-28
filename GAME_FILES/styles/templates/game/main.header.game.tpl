<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="{$lang}" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="{$lang}" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="{$lang}" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="{$lang}" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="{$lang}" class="html-iframe"> <!--<![endif]-->
<head>
	<title>{block name="title"} - {$uni_name} - {$game_name}{/block}</title>
	
	{if !empty($goto)}
	<meta http-equiv="refresh" content="{$gotoinsec};URL={$goto}">
	{/if}
	    <meta name="viewport" content="width=1000, user-scalable=no" />
    <meta name="MobileOptimized" content="1000"/>
	<meta name="HandheldFriendly" content="true"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	
	<link rel="stylesheet" type="text/css" href="./styles/css/boilerplate.css?{$REV}">
    <link rel="stylesheet" type="text/css" href="./styles/css/ingame.css?{$REV}">
    <link rel="stylesheet" type="text/css" href="./styles/css/style.css?{$REV}">
	
	<link rel="stylesheet" type="text/css" href="./styles/resource/css/general/include.css?{$REV}">
	
	<link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
	
	<script type="text/javascript">
	document.domain = "warofalliance.eu";
	var ServerTimezoneOffset = {$Offset};
	var serverTime 	= new Date({$date.0}, {$date.1 - 1}, {$date.2}, {$date.3}, {$date.4}, {$date.5});
	var startTime	= serverTime.getTime();
	var localTime 	= serverTime;
	var localTS 	= startTime;
	var Gamename	= document.title;
	var Ready		= "{$LNG.ready}";
	var Lang		= "{$lang}";
	var head_info	= "{$LNG.fcm_info}";
	var auth		= {$authlevel|default:'0'};
	var days 		= {$LNG.week_day|json|default:'[]'} 
	var months 		= {$LNG.months|json|default:'[]'} ;
	var tdformat	= "{$LNG.js_tdformat}";
	var queryString	= "{$queryString|escape:'javascript'}";
	var STime		= 0;
	parent.SoundAtaks			= 10;
	
	//-- Js LNG ----------------------------
	var LNG						= { };
		LNG['loading']			= "{$LNG.sh_loading}";
		LNG['ok']				= "{$LNG.buildings_5}";
		LNG['sys']				= "{$LNG.sys_refferal_from}";
		LNG['lvl']				= "ур.";
		LNG['lm_buildings']		= "{$LNG.frame_24}";
		LNG['lm_shipshard']		= "{$LNG.frame_27}";
		LNG['lm_research']		= "{$LNG.frame_28}";
		LNG['lng_time']			= { "d":"{$LNG.short_day}","h":"{$LNG.short_hour}","m":"{$LNG.short_minute}","s":"{$LNG.short_second}","null":"\u041d\u0435\u0442" };
		LNG['bd_complete_w']	= { "b":"{$LNG.buildings_7}","s":"{$LNG.shipdef_8}","r":"{$LNG.research_4}","d":"{$LNG.buildings_7}" };
		LNG['farme_text']		= ["{$LNG.frame_34}","{$LNG.frame_35}","{$LNG.frame_36}","{$LNG.tech.921}","TEXT_FRAME","{$LNG.lv_total}","{$LNG.galaxie_3}","{$LNG.galaxie_4}"];
				
				
	var SerInt = window.setInterval(function() {
			serverTime.setSeconds(serverTime.getSeconds()+1);
		}, 1000);
	</script>
	<script type="text/javascript" src="./styles/resource/scripts/libs/jquery/jquery.min.js?{$REV}"></script>
	<script type="text/javascript"> 
		var DOM			= {}; // массив для дерева DOM
		 $(function(){ DOM['body'] = $('body:first')});
	</script>
	<script type="text/javascript" src="./styles/resource/scripts/libs/jquery/jquery.mousewheel.js?{$REV}"></script>
	<script type="text/javascript" src="./styles/resource/scripts/libs/jquery/jquery.fancybox.js?{$REV}"></script>
	<script type="text/javascript" src="./styles/resource/scripts/libs/jquery/jquery.cookie.js?{$REV}"></script>
	<script type="text/javascript" src="./styles/resource/scripts/classes/class.confirm.js?{$REV}"></script>
	<script type="text/javascript" src="./styles/resource/scripts/libs/tooltip.js?{$REV}"></script>	
	<script type="text/javascript" src="./styles/resource/scripts/general/general.js?{$REV}"></script>
	
    <script type="text/javascript"> 		
		var Confirm 	= new classConfirm();
	</script>	
	
	<script act="eval" type="text/javascript">
		$(function() {
			//-- Подключаем к странице			
			Confirm.construct();
			DOM['body'].prepend(tooltip);
			setTooltip(DOM['body']);
			{$varEntryAbs}
			parent.Frame.Ajax.FullRev({ "pi":"{$current_pid}","pd":{ "name":"{$current_pname}","image":"{$image}","moon":"{$current_pluna}","moon_i":"{if $current_pluna != 0}m1{/if}","coord":["{$current_puni}","{$current_pgal}","{$current_psys}","{$current_ppla}"],"maxFS":{$maxFS},"debris":["{$current_dmem}","{$current_dcry}"],"temp":["{$current_tmin}","{$current_tmax}"],"type":"{$current_ptype}","diameter":["{$current_pdiam}","{$current_fcurr}",{$current_fmax}],"df":{$planetSizeAbs},"moon_df":20,"news":[1234] },"rd":{ "901":[{$current_pmetal},{$current_pmetalm},{$lol1},"{$LNG.tech.901}"],"902":[{$current_pcry},{$current_pcrym},{$lol2},"{$LNG.tech.902}"],"903":[{$current_pdeu},{$current_pdeum},{$lol3},"{$LNG.tech.903}"],"911":[{$current_pene},{$current_peneu},0,"{$LNG.tech.911}"],"921":[{$darkmatter},0,0],"931":[{$antimatter},0,0],"942":[{$stellarore},0,0],"level":["{$commanderLevel}",{$commanderExpe},1000] },"ev":{ "expedM":{$lolExpedition},"PD":{ "MC":3,"AC":{$premiumInfoCount},"T":{$premiumInfoTime},"TXT":["{$LNG.premName.15}","{$LNG.premiumTextAb}"] },"Contract":[0,0,0],"TimeT":{$EndEventAbs},"TimeA":0,"LevelUp":"{$levelUpCommanAbs}","Offer":{$offerDataAbs|json} },"qb":{ "status":[{$ActualCountBuild},{$getMaxBuilds}],"queue":{$queueBuild|json} },"qs":{ "status":[{$CountNaval},{$getMaxNaval}],"queue":{$queueNaval|json},"b":{$b},"ft":{$ft} },"qr":{ "status":{$getMaxTech},"queue":{$queueResearch|json} },"pl":{$PlanetTrack|json}});
			
			if(parent.Frame !== undefined)
			parent.Frame.IFrame.Ploff();
			
			
			DOM['servertime'] = $(".servertime");
			UhrzeitAnzeigen();
			STime = setInterval(UhrzeitAnzeigen, 1000);
		});
				$(window).on('beforeunload', function(){
			parent.Frame.IFrame.Plon();
			//parent.Frame.IFrame.N[1].html(LNG['loading']);
			//console.log("BeforeUnload event!");
		});
	</script>
	{block name="script"}{/block}
	<script type="text/javascript" src="./styles/resource/scripts/classes/class.qtip.js?{$REV}"></script>
	<script type="text/javascript" src="/styles/resource/scripts/classes/class.training.js?{$REV}"></script>	
</head>
<body id="{$smarty.get.page|htmlspecialchars|default:'overview'}" class="{$bodyclass}">
	