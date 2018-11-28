{block name="title" prepend}{$pageTitle}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">{$LNG.lm_topkb}</div>
</div>
<div id="popup">
	

<div id="battle">	
	<div class="bt-part-center-bg"></div>
	
	<div id="bt-basic">
		
		<div class="bt-part-header-a i-battle-a"></div>
		<div class="bt-part-header-d i-battle-d"></div>
					
		{foreach $Raport.rounds as $Round => $RoundInfo}
		{if $RoundInfo@last}
		<div class="bt-part-left">
			<div class="bt-players">
												        
				{foreach $RoundInfo.attacker as $Player}
				{$PlayerInfo = $Raport.players[$Player.userID]}<div class="bt-player {if !empty($Player.ships)}bt-player-up{else}bt-player-die{/if}">
				
					<div class="bt-player-header i-mis2-o">
						<span>{$PlayerInfo.name}</span> 
						{if isset($Info)}([XX:XX:XX]){else}([{$PlayerInfo.koords[0]}:{$PlayerInfo.koords[1]}:{$PlayerInfo.koords[2]}]{if isset($PlayerInfo.koords[3])} ({$LNG["type_planet_short_{$PlayerInfo.koords[3]}"]}){/if}){/if}<br>
					</div>
					
										<div class="bt-units">
												{if !empty($Player.ships)}{foreach $Player.ships as $ShipID => $ShipData}<div class="bt-unit tooltip" data-tooltip-content="
								<div class='tip-title'>{$LNG.shortNames.{$ShipID}}</div>
							">
							<div class="bt-unit-img i-u{$ShipID}"></div>
							<div class="bt-unit-name">{$LNG.shortNames.{$ShipID}}</div>
							<div class="bt-unit-count c-902">
								&nbsp;{$ShipData[0]|number}							</div>
							<div class="bt-unit-destruct c-red">
																	 {$ShipData[4]|number}														</div>
						</div>{/foreach}{/if}
												<div class="clear"></div>
					</div>
										
				</div>{/foreach}
							</div>
		</div><!--/.bt-part-left-->
		
		<div class="bt-part-right">
			<div class="bt-players">
												       
				{foreach $RoundInfo.defender as $Player}
				{$PlayerInfo = $Raport.players[$Player.userID]}<div class="bt-player {if !empty($Player.ships)}bt-player-up{else}bt-player-die{/if}">
				
					<div class="bt-player-header i-mis5-o">
						<span>{$PlayerInfo.name}</span> 
						{if isset($Info)}([XX:XX:XX]){else}([{$PlayerInfo.koords[0]}:{$PlayerInfo.koords[1]}:{$PlayerInfo.koords[2]}]{if isset($PlayerInfo.koords[3])} ({$LNG["type_planet_short_{$PlayerInfo.koords[3]}"]}){/if}){/if}<br>
					</div>
					
										<div class="bt-units">
												{if !empty($Player.ships)}{foreach $Player.ships as $ShipID => $ShipData}<div class="bt-unit tooltip" data-tooltip-content="
								<div class='tip-title'>{$LNG.shortNames.{$ShipID}}</div>
							">
							<div class="bt-unit-img i-u{$ShipID}"></div>
							<div class="bt-unit-name">{$LNG.shortNames.{$ShipID}}</div>
							<div class="bt-unit-count c-902">
								&nbsp;{$ShipData[0]|number}							</div>
							<div class="bt-unit-destruct c-red">
																	{$ShipData[4]|number}											</div>
						</div>{/foreach}{/if}
												<div class="clear"></div>
					</div>
										
				</div>{/foreach}
							</div>
		</div><!--/.bt-part-right-->
		{/if}
		{/foreach}
		<div class="bt-part-center">	
			
			<div id="bt-time">
				{$Raport.time}
			</div>
			
						<div id="bt-planet" class="i-p-s-sw1">
				{*<div class="bt-planet-coord">
					[ 0 : 0 : 0 ]
				</div>*}
			</div>
								
			<div class="bt-sum">
			
				<div class="bt-result">
										{if $Raport.result == "a"}<span class="c-903">{$LNG.sys_attacker_won}</span>{elseif $Raport.result == "r"}<span class="c-902">{$LNG.sys_defender_won}</span>{else}<span class="c-911">{$LNG.sys_both_won}</span>{/if}
									</div>
				
																				
								<div class="bt-title">
					{$LNG.tkb_units}:
				</div>		
				<div class="bt-totals tooltip" data-tooltip-content="
					{$LNG.sys_attacker_lostunits} {$Raport['units'][0]|number} <br />
					{$LNG.sys_defender_lostunits} {$Raport['units'][1]|number} 
				">
					<div class="bt-totals-bar bga-red2">
						<div class="bt-totals-points">{$Raport['units'][0]|number}</div>
						<div class="bt-totals-bar-bg bga-red2" style="width:0.9009009009009%; right:0;"></div>
					</div>
					<div class="bt-totals-bar bga-902">
						<div class="bt-totals-points">{$Raport['units'][1]|number}</div>
						<div class="bt-totals-bar-bg bga-902"  style="width:99.099099099099%; left:0;"></div>
					</div>
				</div>
							
				
								
								<div class="bt-text">&nbsp;</div>
				<div class="bt-title">
					{$LNG.battlesi_6}:
				</div>

				
				{foreach $Raport.debris as $elementID => $amount}<div class="bt-res-row c-{$elementID}"><div class="bt-res-row-i ri i-{$elementID}"></div>{$amount|number}</div>{/foreach}
				
				<div class="bt-totals bt-totals-mini">
					<div class="bt-totals-points">{$Raport.debrisP|number}</div>
					<div class="bt-totals-bar bga-red2">
						<div class="bt-totals-bar-bg bga-red2" style="width:11.711711711712%; right:0;"></div>
					</div>
					<div class="bt-totals-bar bga-902">
						<div class="bt-totals-bar-bg bga-902"  style="width:46.846846846847%; left:0;"></div>
					</div>
				</div>			
								
								
								<div class="bt-text">&nbsp;</div>	
				<div class="bt-title">
					{$LNG.cr_total}:
				</div>			
				<div class="bt-totals bt-totals-mini">				
					<div class="bt-totals-bar bga-red2">
						<div class="bt-totals-points">{$Raport.profitA|number}</div>
					</div>
					<div class="bt-totals-bar bga-902">
						<div class="bt-totals-points">{$Raport.profitD|number}</div>
					</div>
				</div>	
				<table class="table-transparent"><tbody><tr><td>
									
															{if $Raport.mode == 1}{* Destruction *}{elseif $Raport.moon.moonChance != 0}<div class="bt-icon i-bt-c-create-moon tooltip" data-tooltip-content="{$LNG.sys_moonproba}">			
						{$Raport.moon.moonChance}%					
					</div>{/if}				
															
								<div class="clear"></div>
				</td></tr></tbody></table>
								
				
				<!--<div class="bt-text"></div>-->						
			</div>
			
			<div class="bt-btn-more btn" onClick="$('#bt-more').stop(true, false).slideToggle(300);">{$LNG.battlesi_4}</div>
			
		</div><!--/.bt-part-center-->
		
		<div class="clear"></div>
	</div><!--bt-basic-->
	
	<div id="bt-more">
								{foreach $Raport.rounds as $Round => $RoundInfo}
								{if !$RoundInfo@last && !$RoundInfo@first}
								<div class="bt-round" id="round_{$Round}">			
		
			<div class="bt-part-left">
				<div class="bt-players">
				
													{foreach $RoundInfo.attacker as $Player}
				{$PlayerInfo = $Raport.players[$Player.userID]}<div class="bt-player {if !empty($Player.ships)}bt-player-up{else}bt-player-die{/if}">
				
					<div class="bt-player-header i-mis2-o">
						<span>{$PlayerInfo.name}</span> 
						{if isset($Info)}([XX:XX:XX]){else}([{$PlayerInfo.koords[0]}:{$PlayerInfo.koords[1]}:{$PlayerInfo.koords[2]}]{if isset($PlayerInfo.koords[3])} ({$LNG["type_planet_short_{$PlayerInfo.koords[3]}"]}){/if}){/if}<br>
					</div>
					
										<div class="bt-units">
												{if !empty($Player.ships)}{foreach $Player.ships as $ShipID => $ShipData}<div class="bt-unit tooltip" data-tooltip-content="
								<div class='tip-title'>{$LNG.shortNames.{$ShipID}}</div>
							">
							<div class="bt-unit-img i-u{$ShipID}"></div>
							<div class="bt-unit-name">{$LNG.shortNames.{$ShipID}}</div>
							<div class="bt-unit-count c-902">
								&nbsp;{$ShipData[0]|number}							</div>
							<div class="bt-unit-destruct c-red">
																	 {$ShipData[4]|number}														</div>
						</div>{/foreach}{/if}
												<div class="clear"></div>
					</div>
										
				</div>{/foreach}
							</div>
		</div><!--bt-part-left-->
			
			<div class="bt-part-right">
				<div class="bt-players">
				{foreach $RoundInfo.defender as $Player}
				{$PlayerInfo = $Raport.players[$Player.userID]}<div class="bt-player {if !empty($Player.ships)}bt-player-up{else}bt-player-die{/if}">
				
					<div class="bt-player-header i-mis5-o">
						<span>{$PlayerInfo.name}</span> 
						{if isset($Info)}([XX:XX:XX]){else}([{$PlayerInfo.koords[0]}:{$PlayerInfo.koords[1]}:{$PlayerInfo.koords[2]}]{if isset($PlayerInfo.koords[3])} ({$LNG["type_planet_short_{$PlayerInfo.koords[3]}"]}){/if}){/if}<br>
					</div>
					
										<div class="bt-units">
												{if !empty($Player.ships)}{foreach $Player.ships as $ShipID => $ShipData}<div class="bt-unit tooltip" data-tooltip-content="
								<div class='tip-title'>{$LNG.shortNames.{$ShipID}}</div>
							">
							<div class="bt-unit-img i-u{$ShipID}"></div>
							<div class="bt-unit-name">{$LNG.shortNames.{$ShipID}}</div>
							<div class="bt-unit-count c-902">
								&nbsp;{$ShipData[0]|number}							</div>
							<div class="bt-unit-destruct c-red">
																	 {$ShipData[4]|number}															</div>
						</div>{/foreach}{/if}
												<div class="clear"></div>
					</div>
										
				</div>{/foreach}
							</div>
		</div><!--bt-part-right-->
			
			<div class="bt-part-center">
			
				<div class="bt-title">Round {$Round}</div>
				
				<div class="bt-totals bt-totals-mini tooltip" style="cursor:help !important" data-tooltip-content="
					{$LNG.fleet_attack_1} {$RoundInfo.info[0]|number} {$LNG.fleet_attack_2} {$RoundInfo.info[3]|number} {$LNG.damage}<br>
					{$LNG.fleet_defs_1} {$RoundInfo.info[2]|number} {$LNG.fleet_defs_2} {$RoundInfo.info[1]|number} {$LNG.damage}
				">
					<div class="bt-totals-bar bga-red2">
						<div class="bt-totals-bar-bg bga-red2" style="width:{(100 / ($RoundInfo.info[0]|number + $RoundInfo.info[3]|number) * $RoundInfo.info[3]|number)}%; right:0;">
													<div class="bt-totals-bar-bg bga-smoke" style="width:{(100 / ($RoundInfo.info[0]|number + $RoundInfo.info[3]|number) * $RoundInfo.info[0]|number)}%; left:0;"></div>
												</div>
					</div>
					<div class="bt-totals-bar bga-902">
						<div class="bt-totals-bar-bg bga-902"  style="width:{(100 / ($RoundInfo.info[2]|number + $RoundInfo.info[1]|number) * $RoundInfo.info[1]|number)}%; left:0;">
													<div class="bt-totals-bar-bg bga-smoke" style="{(100 / ($RoundInfo.info[2]|number + $RoundInfo.info[1]|number) * $RoundInfo.info[2]|number)}%; right:0;"></div>
												</div>
					</div>
				</div>
				
				
				
				
			</div>
			
			<div class="clear"></div>			
		</div>{/if}{/foreach}<!--/round-->		
		
	</div><!--/#bt-more-->
	
</div><!--/#battle-->


</div>

{/block} 
{block name="script" append}
<link rel="stylesheet" type="text/css" href="./styles/resource/css/general/battle.css?{$REV}">
<script type="text/javascript">
	$(function(){
		$('.bt-player-header').click(function(){ 
			$(this).parent().toggleClass('bt-player-up');
			$(this).parent().find(".bt-units").stop(true, false).slideToggle(300);
		});		
	});
	function RoundScan(idSelect)
	{
		$(String(idSelect)).find(".batle_scan").stop(true, false).toggleClass('batle_scan_active');
		$(String(idSelect)).find(".batle_mem_content").stop(true, false).slideToggle(300);
	};
</script>
{/block}
