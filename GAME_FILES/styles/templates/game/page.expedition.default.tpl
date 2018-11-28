{block name="title" prepend}{$LNG.fleettabl_1}{/block}
{block name="content"}
<div id="orbita-content">
	<div id="or-left" class="bg-g-b">

	{if count($FleetsOnPlanetBattle) + count($FleetsOnPlanetTransport) + count($FleetsOnPlanetProcessorcs) + count($FleetsOnPlanetSpecial) != 0}<div class="fl-title">
		{$LNG.orbita_1}<br />
				<span>({$LNG.orbita_2}: {$TotalFleetPoints|number})</span>	
			</div>{else}<div class="fl-title">
		{$LNG.orbita_1}<br />
				<span>{$LNG.fl_no_ships}</span>	
			</div>{/if}
	
	<div class="fl-fleet">
				{if count($FleetsOnPlanetBattle) + count($FleetsOnPlanetTransport) + count($FleetsOnPlanetProcessorcs) + count($FleetsOnPlanetSpecial) != 0}<div class="btn btn-primary">
			<a class="btn-transp" href='?page=flight&amp;mission=16'></a>
			<div class="btn-ico i-0 ri i-mis16"></div>			
			<div class="btn-content">{$LNG.orbita_3}</div>
		</div>{/if}
									
						{if count($FleetsOnPlanetBattle) != 0}<div class="fl-fleet-groop">
			Combat ships			
		</div>			{foreach $FleetsOnPlanetBattle as $FleetRow}	
						<div class="fl-fleet-row">
			<div class="fl-fleet-row-i i-u{$FleetRow.id}" onclick="return parent.Dialog.info({$FleetRow.id})"></div>
			<div class="fl-fleet-row-n tooltip" onclick="return parent.Dialog.info({$FleetRow.id})" data-tooltip-content="{$LNG.fl_speed_title} {$FleetRow.speed}">{$LNG.tech.{$FleetRow.id}}</div>
			<div class="fl-fleet-row-c">{$FleetRow.count|number}</div>
		</div>{/foreach}{/if}			
						{if count($FleetsOnPlanetTransport) != 0}<div class="fl-fleet-groop">
			{$LNG.orbita_5}				
		</div>
						{foreach $FleetsOnPlanetTransport as $FleetRow}	
						<div class="fl-fleet-row">
			<div class="fl-fleet-row-i i-u{$FleetRow.id}" onclick="return parent.Dialog.info({$FleetRow.id})"></div>
			<div class="fl-fleet-row-n tooltip" onclick="return parent.Dialog.info({$FleetRow.id})" data-tooltip-content="{$LNG.fl_speed_title} {$FleetRow.speed}">{$LNG.tech.{$FleetRow.id}}</div>
			<div class="fl-fleet-row-c">{$FleetRow.count|number}</div>
		</div>{/foreach}{/if}
						{if count($FleetsOnPlanetProcessorcs) != 0}<div class="fl-fleet-groop">
			Processors			
		</div>			{foreach $FleetsOnPlanetProcessorcs as $FleetRow}	
						<div class="fl-fleet-row">
			<div class="fl-fleet-row-i i-u{$FleetRow.id}" onclick="return parent.Dialog.info({$FleetRow.id})"></div>
			<div class="fl-fleet-row-n tooltip" onclick="return parent.Dialog.info({$FleetRow.id})" data-tooltip-content="{$LNG.fl_speed_title} {$FleetRow.speed}">{$LNG.tech.{$FleetRow.id}}</div>
			<div class="fl-fleet-row-c">{$FleetRow.count|number}</div>
		</div>{/foreach}{/if}
		
						{if count($FleetsOnPlanetSpecial) != 0}<div class="fl-fleet-groop">
			{$LNG.orbita_6}				
		</div>			{foreach $FleetsOnPlanetSpecial as $FleetRow}	
						<div class="fl-fleet-row">
			<div class="fl-fleet-row-i i-u{$FleetRow.id}" onclick="return parent.Dialog.info({$FleetRow.id})"></div>
			<div class="fl-fleet-row-n tooltip" onclick="return parent.Dialog.info({$FleetRow.id})" data-tooltip-content="{$LNG.fl_speed_title} {$FleetRow.speed}">{$LNG.tech.{$FleetRow.id}}</div>
			<div class="fl-fleet-row-c">{$FleetRow.count|number}</div>
		</div>{/foreach}{/if}
																		</div>
	
</div>
	<div id="or-right" class="bg-g-b">
	<div class="or-menu">
		<div class="or-menu-btn btn btn-primary i-or-m-orbita tooltip" data-tooltip-content="{$LNG.fleettabl_1}" onClick="parent.Frame.IFrame.open('orbita');">
			
		</div>
		<div class="or-menu-btn btn btn-primary i-or-m-exped tooltip" data-tooltip-content="{$LNG.type_mission_15}" onClick="parent.Frame.IFrame.open('expedition');">
			{$activeExpedition} / {$maxExpedition}
		</div>
		<div class="or-menu-btn btn btn-primary i-or-m-flight tooltip" data-tooltip-content="{$LNG.fleettabl_2}" onClick="parent.Frame.IFrame.open('fleetTable');">{$activeFleetSlots} / {$maxFleetSlots}</div>
		<div class="or-menu-btn btn btn-primary i-or-m-bs tooltip" data-tooltip-content="{$LNG.fleettabl_3}" onClick="parent.Frame.IFrame.open('battleSimulator');"></div>
		{if $acsData}<div class="or-menu-btn btn btn-primary i-or-m-acs tooltip" data-tooltip-content="{$LNG.fl_acs_title}" onClick="parent.Frame.IFrame.open('fleetAcs');">
			{count($acsData)}
		</div>{/if}
			</div>	
</div><!--/or-right-->	
	<div id="or-center">

		<div class="fl-title">
			{$LNG.fl_expeditions}<br />
			<span>{$activeExpedition} / {$maxExpedition}</span>
		</div>
		<div class="or-expeditions">			
			
						<div id="expedition" class="build-box or-ex-box">
			
				<div class="build-head">
					<div class="build-i i-i ri bga-i"></div>           
					<div class="build-title">
						{$LNG.premName.6}
					</div>
				</div>
				{if $lvlAstrophysics < 1}
				<div class="build-content-box">
					<div class="build-img i-e15-0"></div>
					
										<div class="build-prices">
						<div class="build-price">
							{$LNG.buildings_1}:
						</div>
																		<div class="build-required tooltip" onclick="parent.Dialog.info(154)" data-tooltip-content="
							{$LNG.bd_tech}:<br /> {$LNG.tech.154} ({$lvlAstrophysics}/1)
						">
							<div class="build-required-img i-u154"></div>
							<div class="build-required-level">1</div>			
						</div>
												                                        
					</div>
										
				</div>
				{else}				
				<div class="build-content-box">
					<div class="build-img i-e15-0"></div>
					
										<div class="build-prices">
												<div class="build-price">							
							{$LNG.exppage_1} 50%
						</div>
												<div class="build-price">							
							{$LNG.exppage_2} {$totalFindFleets}%
						</div>
												<div class="build-price">							
							{$LNG.exppage_3} {$totalFindDarkm}%
						</div>
												<div class="build-price">							
							{$LNG.exppage_4} {$totalFindStellar}%
						</div>
												<div class="build-price">							
							{$LNG.exppage_5} 1%
						</div>
											</div>
										
				</div>
								{if count($FleetsOnPlanetBattle) + count($FleetsOnPlanetTransport) + count($FleetsOnPlanetProcessorcs) + count($FleetsOnPlanetSpecial) != 0 && $activeExpedition < $maxExpedition}<div class="build-btn-box">
					<div class="btn btn-primary">	
						{$LNG.exppage_6}			
						<a class='btn-transp' href='?page=flight&amp;mission=15&amp;sector=0'></a>
					</div>
				</div>{else}
				<div class="build-btn-box">
					<div class="btn btn-danger">	
						{$LNG.exppage_6}			
					</div>
				</div>
				{/if}{/if}
							</div><!--/or-ex-box-->
						
						
						
						<div id="expedition" class="build-box or-ex-box">
			
				<div class="build-head">
					<div class="build-i i-i ri bga-i"></div>           
					<div class="build-title">
						{$LNG.premName.8}
					</div>
				</div>
				
				{if $lvlExpedition < 1}
				<div class="build-content-box">
					<div class="build-img i-e16-4"></div>
					
										<div class="build-prices">
						<div class="build-price">
							{$LNG.buildings_1}:
						</div>
																		<div class="build-required tooltip" onclick="parent.Dialog.info(124)" data-tooltip-content="
							{$LNG.bd_tech}:<br /> {$LNG.tech.124} ({$lvlExpedition}/1)
						">
							<div class="build-required-img i-u124"></div>
							<div class="build-required-level">1</div>			
						</div>
												                                        
					</div>
										
				</div>
				{else}				
				<div class="build-content-box">
					<div class="build-img i-e16-4"></div>
					
										<div class="build-prices">
												<div class="build-price">							
							{$LNG.exppage_7} 1.25%
						</div>
												<div class="build-price">							
							{$LNG.exppage_8} 100
						</div>
												<div class="build-price">							
							{$LNG.lv_ships} 50%
						</div>
												<div class="build-price">							
							{$LNG.lm_technology} <span class="c-gold">70~80%</span>
						</div>
											</div>
										
				</div>
								{if count($FleetsOnPlanetBattle) + count($FleetsOnPlanetTransport) + count($FleetsOnPlanetProcessorcs) + count($FleetsOnPlanetSpecial) != 0 && $activeExpedition < $maxExpedition}<div class="build-btn-box">
					<div class="btn btn-primary">	
						{$LNG.exppage_6}			
						<a class='btn-transp' href='?page=flight&amp;mission=16&amp;sector=4'></a>
					</div>
				</div>{else}
				<div class="build-btn-box">
					<div class="btn btn-danger">	
						{$LNG.exppage_6}			
					</div>
				</div>
				{/if}{/if}
							</div><!--/or-ex-box-->
							
							<div id="expedition" class="build-box or-ex-box">
			
				<div class="build-head">
					<div class="build-i i-i ri bga-i"></div>           
					<div class="build-title">
						{$LNG.playercar_16}
					</div>
				</div>
				
				{if $lvlExpedition < 4}
				<div class="build-content-box">
					<div class="build-img i-e16-1"></div>
					
										<div class="build-prices">
						<div class="build-price">
							{$LNG.buildings_1}:
						</div>
																		<div class="build-required tooltip" onclick="parent.Dialog.info(124)" data-tooltip-content="
							{$LNG.bd_tech}:<br /> {$LNG.tech.124} ({$lvlExpedition}/4)
						">
							<div class="build-required-img i-u124"></div>
							<div class="build-required-level">4</div>			
						</div>
												                                        
					</div>
										
				</div>
				{else}				
				<div class="build-content-box">
					<div class="build-img i-e16-1"></div>
					
										<div class="build-prices">
												<div class="build-price">							
							{$LNG.exppage_8} 800
						</div>
												<div class="build-price">							
							{$LNG.lv_ships} 50%
						</div>
												<div class="build-price">							
							{$LNG.lm_technology} <span class="c-gold">90~95%</span>
						</div>
											</div>
										
				</div>
								{if count($FleetsOnPlanetBattle) + count($FleetsOnPlanetTransport) + count($FleetsOnPlanetProcessorcs) + count($FleetsOnPlanetSpecial) != 0 && $activeExpedition < $maxExpedition}<div class="build-btn-box">
					<div class="btn btn-primary">	
						{$LNG.exppage_6}			
						<a class='btn-transp' href='?page=flight&amp;mission=16&amp;sector=1'></a>
					</div>
				</div>{else}
				<div class="build-btn-box">
					<div class="btn btn-danger">	
						{$LNG.exppage_6}			
					</div>
				</div>
				{/if}{/if}
							</div><!--/or-ex-box-->
							
	</div>
</div>

<script type="text/javascript">
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.fleettabl_1}</div>');	
</script>
{/block}