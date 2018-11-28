{block name="title" prepend}{$LNG.lm_fleet}{/block}
{block name="content"}
<div id="orbita-content">
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
</div><!--/or-right-->	<div id="or-left" class="bg-g-b">

	{if count($FleetsOnPlanetBattle) + count($FleetsOnPlanetTransport) + count($FleetsOnPlanetProcessorcs) + count($FleetsOnPlanetSpecial) != 0}<div class="fl-title">
		{$LNG.orbita_1}<br />
				<span>({$LNG.orbita_2}: {$TotalFleetPoints|number})</span>	
			</div>{else}<div class="fl-title">
		{$LNG.orbita_1}<br />
				<span>{$LNG.fl_no_ships}</span>	
			</div>{/if}
	
	<div class="fl-fleet">
				{if count($FleetsOnPlanetBattle) + count($FleetsOnPlanetTransport) + count($FleetsOnPlanetProcessorcs) + count($FleetsOnPlanetSpecial) != 0}<div class="btn btn-primary">
			<a class="btn-transp" href='?page=flight&amp;mission=15'></a>
			<div class="btn-ico i-0 ri i-mis10"></div>			
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
	
</div><!--/or-left-->	
	<div id="or-center">
		{if $acsData}
		<div id="or-acs">
		
						<div id="or-acs-left" class="bg-g-b2">
				<div class="fl-title">
					{$LNG.type_mission_2}:
				</div>
				<div class="or-acs-rows">
										{foreach $acsData as $ACSRow}<div class="or-acs-row">
						<div class="btn btn-primary tooltip" data-tooltip-content="{$LNG.type_mission_2}">
							<a class="btn-transp" href="?page=flight&amp;acs={$ACSRow.id}"></a>
							<div class="btn-ico i-0 ri i-mis2"></div>			
							<div class="btn-content">[{$ACSRow.galaxy}:{$ACSRow.system}:{$ACSRow.planet}] {$ACSRow.name}</div>
						</div>
					</div>{/foreach}
									</div>
			</div><!--/or-acs-left-->
					
						{if $FleetIDAcs != 0}<div id="or-acs-right">
				<div class="fl-title">
					<span id="acsName">{$acsList.acsName}</span><br/>
					<span class="or-acs-rename" onClick="Rename();">{$LNG.fl_acs_change}</span>
				</div>
				 
				<div class="or-acs-invite">
					<div class="fl-fleet-groop">
						{$LNG.fl_invite_members}				
					</div>				
					
					<form action="?page=fleetAcs" method="post">
						<input name="fleetID" value="{$acsList.mainFleetID}" type="hidden">
						<input name="username" class="or-acs-invite-input" type="text">
						<input type="submit"  class="btn btn-primary or-acs-invite-btn" value="{$LNG.fl_continue}">
					</form>
					
									</div>
				
				<div class="or-acs-rows-names">
					<div class="fl-fleet-groop">
						{$LNG.fl_members_invited}			
					</div>
							
										{foreach $acsList.invitedUsers as $user}<div class="or-acs-row-name c-902">
						{$user}
					</div>{/foreach}
									</div>
			</div>{/if}<!--/or-acs-right-->
				
			
		</div>{/if}<!--/or-acs-->
	</div><!--/or-center-->
	
</div><!--/orbita-content-->
{/block}
{block name="script" append}
<script type="text/javascript">
{if $FleetIDAcs != 0}
function Rename(){
	var Name = prompt("{$LNG.fl_acs_change_name}", "{$acsList.acsName}");
	$.get('?page=fleetAcs&action=acs&fleetID={$acsList.mainFleetID}&acsName='+Name, function(data) {
		if(data != "") {
			alert(data);
			return;
		}
		$('#acsName').text(Name);
	});
}{/if}
parent.Frame.IFrame.N[1].html(
	'<div class="title-text">'
		+'{$LNG.fleettabl_1}'
    +'</div>'	
);
</script>
{/block}