{block name="title" prepend}{$LNG.lm_fleet}{/block}
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
	
</div><!--/or-left-->	<div id="or-center">

	<div class="fl-title">
		{$LNG.orbita_4} ({$orbitPlanetCount|number} / {$orbitMaxPlanetCount|number})
	</div>
	
	<div class="or-planets">
		
			<div class="gl-s"></div>
			{foreach $PlanetOrbita as $ID => $OrbitInfo}
			
			<div class="gl-row">

			<div class="gl-planet or-planet">
				<div class="gl-img i-p-s-{$OrbitInfo.image} gl-img-90{if $ID == $current_pid} or-cur{/if}"></div>
				{if $ID != $current_pid}<div class="gl-actions">
					<table class="gl-actions-t">	
					<tbody>
					<tr>	

					<td><a class="gl-actions-i ri i-mis3 tooltip" href="?page=flight&amp;galaxy={$OrbitInfo.galaxy}&amp;system={$OrbitInfo.system}&amp;planet={$OrbitInfo.planet}&amp;planettype=1&amp;mission=3" data-tooltip-content="{$LNG.type_mission_3}"></a>
					</td>

					<td><a class="gl-actions-i ri i-mis4 tooltip" href="?page=flight&amp;galaxy={$OrbitInfo.galaxy}&amp;system={$OrbitInfo.system}&amp;planet={$OrbitInfo.planet}&amp;planettype=1&amp;mission=4" data-tooltip-content="{$LNG.type_mission_4}"></a>
					</td>
					
					</tr>
					</tbody>
					</table>
				</div>{/if}
							</div>			
			
			<div class="or-planet-coord">
				[{$OrbitInfo.galaxy} : {$OrbitInfo.system} : {$OrbitInfo.planet}]
			</div>
			
			<div class="gl-planet-name or-planet-name">
				{$OrbitInfo.name}
			</div>
			
			<div class="gl-moon or-moon">{if $OrbitInfo.id_luna != 0}
				<div class="gl-img i-p-s-{$OrbitInfo.lunaPic} gl-img-90{if $OrbitInfo.id_luna == $current_pid} or-cur{/if}"></div>
				{if $OrbitInfo.id_luna != $current_pid}<div class="gl-actions">
					<table class="gl-actions-t">	
					<tbody>
					<tr>	

					<td><a class="gl-actions-i ri i-mis3 tooltip" href="?page=flight&amp;galaxy={$OrbitInfo.galaxy}&amp;system={$OrbitInfo.system}&amp;planet={$OrbitInfo.planet}&amp;planettype=3&amp;mission=3" data-tooltip-content="{$LNG.type_mission_3}"></a>
					</td>

					<td><a class="gl-actions-i ri i-mis4 tooltip" href="?page=flight&amp;galaxy={$OrbitInfo.galaxy}&amp;system={$OrbitInfo.system}&amp;planet={$OrbitInfo.planet}&amp;planettype=3&amp;mission=4" data-tooltip-content="{$LNG.type_mission_4}"></a>
					</td>
					
					</tr>
					</tbody>
					</table>
				</div>{/if}{/if}
							</div>
							
							
			{if $OrbitInfo.der_metal + $OrbitInfo.der_crystal > 0}
			<div class="gl-debris or-debris i-d-s-1 tooltip" data-tooltip-content="
				<div class='tip-title'>
					{$LNG.type_mission_8}<br />
					{$LNG.type_planet_2}  [{$OrbitInfo.galaxy} : {$OrbitInfo.system} : {$OrbitInfo.planet}]
				</div>
				<div class='tip-text'>
					<span>{$LNG.tech.901}</span>: <span class='c-901'>{$OrbitInfo.der_metal|number}</span><br />
					<span>{$LNG.tech.902}</span>: <span class='c-902'>{$OrbitInfo.der_crystal|number}</span>
				</div>
			">
				<a class="btn-transp" href="?page=flight&amp;galaxy={$OrbitInfo.galaxy}&amp;system={$OrbitInfo.system}&amp;planet={$OrbitInfo.planet}&amp;planettype=2&amp;mission=8"></a>

			</div>{/if}	
		</div><div class="gl-s"></div>{/foreach}<!--/gal-row-->
		
		
			
		</div>
	
</div><!--/or-left-->	<div id="or-right" class="bg-g-b">
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
</div><!--/or-right--></div>

<script type="text/javascript">
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.fleettabl_1}</div>');	
</script>
{/block}