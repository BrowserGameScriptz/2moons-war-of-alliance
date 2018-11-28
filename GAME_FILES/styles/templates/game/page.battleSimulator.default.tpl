{block name="title" prepend}{$LNG.lm_battlesim}{/block}
{block name="content"}
<div id="orbita-content">

	<div id="or-bs">	
		<div id="or-bs-box">
			<div class="or-bs-att">
				<div class="or-bs-name">{$LNG.bs_atter}</div>
				({$LNG.battlesi_1} <span id="AttPoints">0</span>)
			</div>
			<div class="or-bs-def">
				<div class="or-bs-name">{$LNG.bs_deffer}</div>
				({$LNG.battlesi_1} <span id="DefPoints">0</span>)
			</div>
			
			<div class="or-bs-bg bg-g-b"></div>
			<form id="form" name="battlesim">
				<input type="hidden" name="slots" id="slots" value="{$Slots + 1}">
			
			<div class="or-bs-ress">
				<div class="or-bs-name">{$LNG.battlesi_2}</div> 
				<div class="or-bs-res-row">
					<div class="or-bs-res-ico ri i-901"></div>
					<input type="text" size="10" maxlength="20" value="{if isset($battleinput.0.1.901)}{$battleinput.0.1.901}{else}0{/if}" name="battleinput[0][1][901]" class="or-bs-res-input c-901 tooltip" data-tooltip-content="{$LNG.tech.901}"> 
				</div>
				<div class="or-bs-res-row">
					<div class="or-bs-res-ico ri i-902"></div>
					<input type="text" size="10" maxlength="20" value="{if isset($battleinput.0.1.902)}{$battleinput.0.1.902}{else}0{/if}" name="battleinput[0][1][902]" class="or-bs-res-input c-902 tooltip" data-tooltip-content="{$LNG.tech.902}"> 
				</div>
				<div class="or-bs-res-row">
					<div class="or-bs-res-ico ri i-903"></div>
					<input type="text" size="10" maxlength="20" value="{if isset($battleinput.0.1.903)}{$battleinput.0.1.903}{else}0{/if}" name="battleinput[0][1][903]" class="or-bs-res-input c-903 tooltip" data-tooltip-content="{$LNG.tech.903}">
				</div>
			</div>
			
			<div id="or-bs-conent" class="bg-g-b">
			
			
				{section name=content start=0 loop=$Slots}
				<div id="tabs-{$smarty.section.content.index}" class="tab-slot">
					
					<div class="or-bs-row or-bs-title">
						<div class="or-bs-left or-bs-reset" onClick="resetInput('or-ta0');">{$LNG.bs_reset}</div>
						<div class="or-bs-center">{$LNG.bs_techno}</div>
						<div class="or-bs-right or-bs-reset" onClick="resetInput('or-td0');">{$LNG.bs_reset}</div>
					</div>
					
					{foreach $ResearchIds as $Ids}						
					<div class="or-bs-row">
						<div class="or-bs-left">
							<input class="or-bs-input or-ta0" type="text" size="3" value="{if isset($battleinput.{$smarty.section.content.index}.0.{$Ids})}{$battleinput.{$smarty.section.content.index}.0.{$Ids}}{else}0{/if}" name="battleinput[{$smarty.section.content.index}][0][{$Ids}]">
						</div>
						<div class="or-bs-center">
							<div class="or-bs-row-i i-u{$Ids}"></div>
							<div class="or-bs-row-n">{$LNG.tech.$Ids}</div>
						</div>
						<div class="or-bs-right">
							<input class="or-bs-input or-td0" type="text" size="3" value="{if isset($battleinput.{$smarty.section.content.index}.1.{$Ids})}{$battleinput.{$smarty.section.content.index}.1.{$Ids}}{else}0{/if}" name="battleinput[{$smarty.section.content.index}][1][{$Ids}]"
							>
						</div>
					</div>
					{/foreach}									
					<div class="or-bs-row or-bs-title">
						<div class="or-bs-left or-bs-reset" onClick="resetInput('or-fa0');">{$LNG.bs_reset}</div>
						<div class="or-bs-center">{$LNG.bs_names}</div>
						<div class="or-bs-right or-bs-reset" onClick="resetInput('or-fd0');">{$LNG.bs_reset}</div>
					</div>
										{foreach $fleetList as $id}<div class="or-bs-row">
						<div class="or-bs-left"><input class="or-bs-input f-a or-fa0" type="text" size="10" value="{if isset($battleinput.{$smarty.section.content.index}.0.$id)}{$battleinput.{$smarty.section.content.index}.0.$id}{else}0{/if}" name="battleinput[{$smarty.section.content.index}][0][{$id}]"></div>
						<div class="or-bs-center">
							<div class="or-bs-row-i i-u{$id}" onclick="return parent.Dialog.info({$id})"></div>
							<div class="or-bs-row-n" onclick="return parent.Dialog.info({$id})">{$LNG.tech.$id}</div>							
						</div>
						<div class="or-bs-right"><input class="or-bs-input f-d or-fd0" type="text" size="10" value="{if isset($battleinput.{$smarty.section.content.index}.1.$id)}{$battleinput.{$smarty.section.content.index}.1.$id}{else}0{/if}" name="battleinput[{$smarty.section.content.index}][1][{$id}]"></div>
					</div>{/foreach}	            
					
					
					{if $smarty.section.content.index == 0}					                       
										<div class="or-bs-row or-bs-title">
						<div class="or-bs-center">{$LNG.bs_names}</div>
						<div class="or-bs-right or-bs-reset" onClick="resetInput('or-dd0');">{$LNG.bs_reset}</div>
					</div>
										{foreach $defensiveList as $id}<div class="or-bs-row">
						<div class="or-bs-center">
							<div class="or-bs-row-i i-u{$id}" onclick="return parent.Dialog.info({$id})"></div>
							<div class="or-bs-row-n" onclick="return parent.Dialog.info({$id})">{$LNG.tech.$id}</div>	
						</div>
						<div class="or-bs-right"><input class="or-bs-input f-d or-dd0" type="text" size="10" value="{if isset($battleinput.{$smarty.section.content.index}.1.$id)}{$battleinput.{$smarty.section.content.index}.1.$id}{else}0{/if}" name="battleinput[{$smarty.section.content.index}][1][{$id}]"></div>
					</div>{/foreach}{/if}	                 
										
									</div>{/section}
						</div>			
			
			</form>
						
			<div class="or-bs-slots" id="tabs">	
				<table class="table-transparent or-bs-slots-t"><tbody><tr>			
								{section name=tab start=0 loop=$Slots}<td><div class="btn or-bs-slots-btn" id="tb-{$smarty.section.tab.index}" onClick="tab({$smarty.section.tab.index});">{$LNG.battlesi_3} {$smarty.section.tab.index + 1}</div></td>{/section}
								<td><div class="btn or-bs-slots-btn or-bs-slots-add i-add tooltip" data-tooltip-content="{$LNG.bs_add_acs_slot}" onClick="slotAdd();"></div></td>
				</tr></tbody></table>
			</div>
			
			<div id="or-bs-submit">
				<div id="submit" class="btn btn-primary" onClick="sim();">{$LNG.fl_simulate}</div> 
				<div id="wait" class="btn" style="display:none;">{$LNG.bs_wait}</div>          
			</div>
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
</div><!--/or-right--></div>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/battlesim.js?{$REV}"></script>
<script type="text/javascript">
	var pointsPrice = { 
	{foreach $fleetArray as $id => $Element}"battleinput[0][0][{$id}]":{$Element.points},"battleinput[0][1][{$id}]":{$Element.points},{/foreach}{foreach $DefenseArray as $id => $Element}"battleinput[0][1][{$id}]":{$Element.points}{if !$Element@last},{/if}{/foreach} };
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.lm_battlesim}</div>');	
</script>
{/block}
