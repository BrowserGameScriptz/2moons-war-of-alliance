{block name="title" prepend}{$LNG.lm_fleet}{/block}
{block name="content"}
<div id="fleet-table">
		<div id="fleet-table-box">
			<div class="fl-title ft-title">
				{$LNG.fleettabl_2} (<span class="servertime tooltip" data-tooltip-content="{$LNG.frame_20} "></span>)
				<div id="filter" class="ft-filter">
										<div class="ft-filter-btn btn i-mis1-o tooltip" data-tooltip-content="{$LNG.type_mission_1}" onClick="FilterActive('o', '1');"></div>
										<div class="ft-filter-btn btn i-mis2-o tooltip" data-tooltip-content="{$LNG.type_mission_2}" onClick="FilterActive('o', '2');"></div>
										<div class="ft-filter-btn btn i-mis3-o tooltip" data-tooltip-content="{$LNG.type_mission_3}" onClick="FilterActive('o', '3');"></div>
										<div class="ft-filter-btn btn i-mis4-o tooltip" data-tooltip-content="{$LNG.type_mission_4}" onClick="FilterActive('o', '4');"></div>
										<div class="ft-filter-btn btn i-mis5-o tooltip" data-tooltip-content="{$LNG.type_mission_5}" onClick="FilterActive('o', '5');"></div>
										<div class="ft-filter-btn btn i-mis7-o tooltip" data-tooltip-content="{$LNG.type_mission_7}" onClick="FilterActive('o', '7');"></div>
										<div class="ft-filter-btn btn i-mis8-o tooltip" data-tooltip-content="{$LNG.type_mission_8}" onClick="FilterActive('o', '8');"></div>
										<div class="ft-filter-btn btn i-mis9-o tooltip" data-tooltip-content="{$LNG.type_mission_9}" onClick="FilterActive('o', '9');"></div>
										<div class="ft-filter-btn btn i-mis16-o tooltip" data-tooltip-content="{$LNG.type_mission_16}" onClick="FilterActive('o', '16');"></div>
										<div class="ft-filter-btn btn i-mis15-o tooltip" data-tooltip-content="{$LNG.type_mission_15}" onClick="FilterActive('o', '15');"></div>
					 
										<div class="ft-filter-btn btn i-mis3-t tooltip" data-tooltip-content="{$LNG.type_mission_3}" onClick="FilterActive('t', '3');"></div>
										<div class="ft-filter-btn btn i-mis5-t tooltip" data-tooltip-content="{$LNG.type_mission_5}" onClick="FilterActive('t', '5');"></div>
										<div class="ft-filter-btn btn i-mis1-t tooltip" data-tooltip-content="{$LNG.type_mission_1}" onClick="FilterActive('t', '1');"></div>
										<div class="ft-filter-btn btn i-mis2-t tooltip" data-tooltip-content="{$LNG.type_mission_2}" onClick="FilterActive('t', '2');"></div>
										<div class="ft-filter-btn btn i-mis9-t tooltip" data-tooltip-content="{$LNG.type_mission_9}" onClick="FilterActive('t', '9');"></div>
									</div>
			</div>
			
			<div id="fleets" class="ft-rows">

			<div class="ft-s"></div>
			{foreach name=FlyingFleets item=FlyingFleetRow from=$FlyingFleetList}
													<div id="f{$FlyingFleetRow.id}" mis="{$FlyingFleetRow.mission}o" class="ft-row" style="z-index:2146694924">
	<div class="ft-row-s"></div>
	<div class="ft-mis">
		<div class="ft-ico i-mis{$FlyingFleetRow.mission}-o"></div>
		<div class="ft-details">
        	
            <div class="msg-unit-title">
                {$FlyingFleetRow.missionName}
            </div>
            
            <div class="msg-res-rows">
                {if $FlyingFleetRow.fleet_metal > 0}<div class="msg-res-row c-901"><div class="msg-res-row-i ri i-901"></div>{$FlyingFleetRow.fleet_metal|number}</div>{/if}
                {if $FlyingFleetRow.fleet_crystal > 0}<div class="msg-res-row c-902"><div class="msg-res-row-i ri i-902"></div>{$FlyingFleetRow.fleet_crystal|number}</div>{/if}
                {if $FlyingFleetRow.fleet_deuter > 0}<div class="msg-res-row c-903"><div class="msg-res-row-i ri i-903"></div>{$FlyingFleetRow.fleet_deuter|number}</div>{/if}
                {if $FlyingFleetRow.fleet_darkm > 0}<div class="msg-res-row c-921"><div class="msg-res-row-i ri i-921"></div>{$FlyingFleetRow.fleet_darkm|number}</div>{/if}			
                <div class="clear"></div>
            </div>
            
        	<div class="msg-unit-title">
                {$LNG.st_fleets}
            </div>
                        {foreach $FlyingFleetRow.FleetList as $shipID => $shipCount}<div class="msg-unit-row">
                <div class="msg-unit-row-i i-u{$shipID}"></div>
                <div class="msg-unit-row-n">{$LNG.tech.{$shipID}}</div>
                <div class="msg-unit-row-c c-902">{$shipCount}</div>		
            </div>{/foreach}
                        <div class="clear"></div>
         </div>
	</div>
	
	<div class="ft-spart ft-bg">
		<div class="ft-planet">
			<div class="gl-img i-p-s-{$FlyingFleetRow.PlanetSendImg} gl-img-80"></div>	
		</div>	
		<div class="ft-coord">
			 <a href="game.php?page=galaxy&amp;galaxy={$FlyingFleetRow.startGalaxy}&amp;sleeve=1&amp;system={$FlyingFleetRow.startSystem}" class="">[{$FlyingFleetRow.startGalaxy}:{$FlyingFleetRow.startSystem}:{$FlyingFleetRow.startPlanet}]</a> {$FlyingFleetRow.PlanetSendNam}
		</div>
									
		<div class="ft-start-time">
			{$FlyingFleetRow.endTime}
		</div>
			</div>
	
	<div class="ft-time-left">
			{if $FlyingFleetRow.state == 1}<div class="ft-left-arrow i-fl-t-end timer" data-time="{$FlyingFleetRow.resttime}"></div>{/if}
		</div>
	
	<div class="ft-time-stay ft-bg">
			{if $FlyingFleetRow.state != 1 && $FlyingFleetRow.DisplayStayTime != 0}<div class="ft-stay-timer i-fl-t-stay{if $FlyingFleetRow.DisplayStart <= 0} timer{/if}" data-time="{$FlyingFleetRow.DisplayStayTime}">{$FlyingFleetRow.DisplayStayTime|time}</div>{/if}
		</div>
	
	<div class="ft-time-right">
			{if $FlyingFleetRow.state == 0}<div class="ft-right-arrow i-fl-t-start timer" data-time="{$FlyingFleetRow.DisplayStart}"></div>{/if}
		</div>
	
	<div class="ft-end ft-bg">
		<div class="ft-planet">
			<div class="gl-img i-p-s-{$FlyingFleetRow.PlanetTargImg} gl-img-80"></div>	
		</div>
		<div class="ft-coord">
			{$FlyingFleetRow.PlanetTargNam} <a href="game.php?page=galaxy&amp;galaxy={$FlyingFleetRow.endGalaxy}&amp;sleeve=1&amp;system={$FlyingFleetRow.endSystem}" class="">[{$FlyingFleetRow.endGalaxy}:{$FlyingFleetRow.endSystem}:{$FlyingFleetRow.endPlanet}]</a>
		</div>
				<div class="ft-user-name">
			{$FlyingFleetRow.PlayerTargData}
		</div>
									
			<div class="ft-end-time">{$FlyingFleetRow.startTime}</div>
			</div>
		<div class="ft-action">
			{if !$isVacation && $FlyingFleetRow.state != 1}
				<a href="game.php?page=fleetTable&amp;action=sendfleetback&amp;fleetID={$FlyingFleetRow.id}" class="btn btn-primary ft-action-btn i-fl-back tooltip" data-tooltip-content="{$LNG.fl_send_back}"></a>
			{if $FlyingFleetRow.mission == 1}
				<a href="game.php?page=fleetAcs&amp;fleetID={$FlyingFleetRow.id}" class="btn btn-primary ft-action-btn i-mis2-o tooltip" data-tooltip-content="{$LNG.fl_acs}"></a>
				<div class="btn btn-primary ft-action-btn i-mis6-o tooltip" onclick='doit({$FlyingFleetRow.fleet_end_id},{$FlyingFleetRow.fleet_end_id},{$FlyingFleetRow.fleet_end_id},{$FlyingFleetRow.fleet_end_id},{$spyShips|json});' data-tooltip-content="{$LNG.gl_spy}"></div>
			{/if}
			{/if}
		</div>
	<div class="ft-s"></div> 
</div>
{foreachelse}
									{$LNG.fleettabl_4}{/foreach}
								        
			</div>
		</div>
	</div><!--/fleet-table-->
{/block}
{block name="script" append}
 <script act="eval" type="text/javascript">
		$(function() {
			//-- Подключаем к странице			
			Confirm.construct();			
			DOM['body'].prepend(tooltip);
			setTooltip(DOM['body']);
			
			
			
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
<link rel="stylesheet" type="text/css" href="./styles/resource/css/general/battle.css?{$REV}">
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/fleettable.js?{$REV}"></script>
<script type="text/javascript">
	var FlagOnFocus = false;
	window.onfocus = function () {
		if(FlagReload)
			location.reload();
	};
	
	window.onblur = function () {
		FlagReload = true;
	};
	Filter = { "o":{ "1":{if $_m1o == 0}false{else}true{/if},"2":{if $_m2o == 0}false{else}true{/if},"3":{if $_m3o == 0}false{else}true{/if},"4":{if $_m4o == 0}false{else}true{/if},"5":{if $_m5o == 0}false{else}true{/if},"7":{if $_m7o == 0}false{else}true{/if},"8":{if $_m8o == 0}false{else}true{/if},"9":{if $_m9o == 0}false{else}true{/if},"16":{if $_m16o == 0}false{else}true{/if},"15":{if $_m15o == 0}false{else}true{/if} },"t":{ "3":{if $_m3t == 0}false{else}true{/if},"5":{if $_m5t == 0}false{else}true{/if},"1":{if $_m1t == 0}false{else}true{/if},"2":{if $_m2t == 0}false{else}true{/if},"9":{if $_m9t == 0}false{else}true{/if} } };
</script>
{/block}