{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div id="al-body">

	<div class="al-left bg-g-b">
		<div class="al-left-img">			
			<div class="al-img i-ai1">
	<div class="al-img-tag c-d{$allianceDivision}">{$ally_tag}</div>
</div>		</div>		

		<div class="al-card-option c-902 tooltip" data-tooltip-content="{$LNG.al_ally_info_members}">
			<div class="al-card-option-ico ri i-member"></div>
			<a href="?page=alliance&amp;mode=memberList" class="btn-transp"></a>			{$ally_members} / {$ally_max_members}
		</div>
		<div class="al-card-option c-902 tooltip" data-tooltip-content="{$LNG.playercar_1}"><div class="al-card-option-ico ri i-arming"></div>4 316</div>
		{if $rights.SEEAPPLY && $applyCount > 0}<div class="al-card-option c-902">
			<div class="al-card-option-ico i-member"></div>
			<a href="?page=alliance&amp;mode=admin&amp;action=mangeApply" class="btn-transp"></a>
			{$LNG.al_requests}: {$applyCount}
		</div>{/if}
		<div class="al-block-title tooltip" data-tooltip-content="{$LNG.al_rank}">
			{$rankName}
		</div>
				{if $rights.ROUNDMAIL}<div class="al-left-btn btn btn-primary i-al-mesages tooltip" data-tooltip-content="{$LNG.al_circular_message}" onclick="parent.Dialog.open('game.php?page=alliance&mode=circular', 650, 230);"></div>{/if}
				{if $rights.ADMIN}<div class="al-left-btn btn btn-primary i-al-settings tooltip" data-tooltip-content="{$LNG.al_manage_alliance}" onclick="parent.Frame.IFrame.open('alliance','admin');"></div>{/if}
				{if !$isOwner}<div class="al-left-btn btn btn-primary i-al-go-out" data-tooltip-content="{$LNG.al_leave_alliance}" onclick="parent.Frame.IFrame.open('alliance','close');"></div>{/if}
					</div>
	
	<div class="al-right-one">	
		<div class="al-content">
			
						
			<div class="al-block bg-g-b float-r">
				<div class="al-block-title">
					{$LNG.alliance_8}		
				</div>
				<div class="al-block-content">
					<div class="al-block float-l">
						<div class="al-card-option c-901 tooltip" data-tooltip-content="{$LNG.tech.901}"><div class="al-card-option-ico ri i-901"></div>{$alliance_storage_metal|number}</div>
						<div class="al-card-option c-902 tooltip" data-tooltip-content="{$LNG.tech.902}"><div class="al-card-option-ico ri i-902"></div>{$alliance_storage_crystal|number}</div>
						<div class="al-card-option c-903 tooltip" data-tooltip-content="{$LNG.tech.903}"><div class="al-card-option-ico ri i-903"></div>{$alliance_storage_deuterium|number}</div>
					</div>
					<div class="al-block float-r">
						<div class="al-card-option c-941 tooltip" data-tooltip-content="{$LNG.tech.941}"><div class="al-card-option-ico ri i-941"></div>{$alliance_storage_research|number}</div>
						<div class="al-card-option c-921 tooltip" data-tooltip-content="{$LNG.tech.921}"><div class="al-card-option-ico ri i-921"></div>{$alliance_storage_darkmatter|number}</div>
						<div class="al-card-option c-942 tooltip" data-tooltip-content="{$LNG.tech.942}"><div class="al-card-option-ico ri i-942"></div>{$alliance_storage_stellar|number}</div>
					</div>
					<div class="clear"></div>
										{if $rights.BANK}{if empty($nextStorage)}<div class="btn al-block float-l btn-primary" onClick="parent.Dialog.AllyStoragePut();">{$LNG.alliance_12}</div>{else}
										<div class="btn al-block float-l cursor-d tooltip al-timers" data-time="{$nextAllowed}" data-tooltip-content="{$LNG.alliance_12}"></div>{/if}{else}
										<div class="btn al-block float-l btn-primary">Not enough rights</div>
										{/if}
										<div class="btn al-block float-r" onClick="parent.Dialog.AllyStorageLog();">{$LNG.alliance_15}</div>
									</div>
				
				<div class="al-block-title">
					{$LNG.alliance_13} <span class="f-f-a float-r c-smoke">{$LNG.tt_lvl} {$allianceLevel}</span>
				</div>
				<div class="al-block-content">
					<div class="clear"></div>
										<div class="btn btn-primary" onclick="parent.Frame.IFrame.open('alliance','development');">{$LNG.alliance_14}</div>
									</div>
			</div>
			
			<div class="al-block bg-g-b  float-l">
				<div class="al-block-title">
					{$LNG.alliance_3}
				</div>
				<div class="al-block-content">				
					<table class="wight-100 table-transparent"><tbody>
					<tr>
						<th class="f-ta-l"><span class="pl-line">{$LNG.pl_fightwon}</span></th>
						<th class="f-ta-c"><span class="pl-line">{$LNG.pl_fightdraw}</span></th>
						<th class="f-ta-r"><span class="pl-line">{$LNG.pl_fightlose}</span></th>                
					</tr>
					<tr>
						<td class="f-ta-l">{$fightwon|number}</td>						
						<td class="f-ta-c">{$fightdraw|number}</td>
						<td class="f-ta-r">{$fightlose|number}</td>
					</tr>
					</tbody></table>	
					<div>&nbsp;</div>	
					<div class="pl-line">
						{$LNG.alliance_26} <div class="float-r">0</div>
					</div>
					<div class="pl-line">
						{$LNG.playercar_9} <div class="float-r">{round($desunits1/$lostunits1,2)}</div>
					</div>			
					<div class="pl-line f-ta-c"> <span class="c-902">{$unitsshot}</span> / <span class="c-red">{$unitslose}</span></div>
					<div class="pl-totals">				
						<div class="pl-totals-bar bga-902">
							<div class="pl-totals-bar-bg bga-902" style="width:{$varDest}%; right:0;"></div>	
						</div>
						<div class="pl-totals-bar bga-red2">					
							<div class="pl-totals-bar-bg bga-red2"  style="width:{$varLost}%; left:0;"></div>
						</div>
					</div>				
				</div>
				
				{*<div class="al-block-title">
					{$LNG.battlhall_4}
				</div>
				<div class="bh-rows">
					<div class="bh-row bh-row-headr">
						<div class="bh-row-rank i-st-rank tooltip" data-tooltip-content="{$LNG.st_position}"></div>
						<div class="bh-row-user i-st-user tooltip" data-tooltip-content="{$LNG.pl_name}"></div>
						<div class="bh-row-points i-st-total tooltip" data-tooltip-content="{$LNG.pl_points}"></div>
					</div>
								
				</div>*}
				
			</div><!--/al-block-->			
			
			<div class="al-block bg-g-b float-l">
				<div class="al-block-title">
					{$LNG.al_diplo}
											{if $rights.DIPLOMATIC}<a href="game.php?page=alliance&amp;mode=admin&amp;action=diplomacy" class="float-r">{$LNG.al_manage_diplo}</a>{/if}
									</div>
				<div class="al-block-content">
					{if $DiploInfo}
						{if !empty($DiploInfo.0)}<b><u>{$LNG.al_diplo_level.0}</u></b><br><br>{foreach item=PaktInfo from=$DiploInfo.0}<a href="?page=alliance&mode=info&amp;id={$PaktInfo.1}">{$PaktInfo.0}</a><br>{/foreach}<br>{/if}
		{if !empty($DiploInfo.1)}<b><u>{$LNG.al_diplo_level.1}</u></b><br><br>{foreach item=PaktInfo from=$DiploInfo.1}<a href="?page=alliance&mode=info&amp;id={$PaktInfo.1}">{$PaktInfo.0}</a><br>{/foreach}<br>{/if}
		{if !empty($DiploInfo.2)}<b><u>{$LNG.al_diplo_level.2}</u></b><br><br>{foreach item=PaktInfo from=$DiploInfo.2}<a href="?page=alliance&mode=info&amp;id={$PaktInfo.1}">{$PaktInfo.0}</a><br>{/foreach}<br>{/if}
		{if !empty($DiploInfo.3)}<b><u>{$LNG.al_diplo_level.3}</u></b><br><br>{foreach item=PaktInfo from=$DiploInfo.3}<a href="?page=alliance&mode=info&amp;id={$PaktInfo.1}">{$PaktInfo.0}</a><br>{/foreach}<br>{/if}
			{if !empty($DiploInfo.4)}<b><u>{$LNG.al_diplo_level.4}</u></b><br><br>{foreach item=PaktInfo from=$DiploInfo.4}<a href="?page=alliance&mode=info&amp;id={$PaktInfo.1}">{$PaktInfo.0}</a><br>{/foreach}<br>{/if}
					{else}
						<span>{$LNG.alliance_6}</span>
					{/if}
				</div>				
									
			</div><!--/al-block-->
				
			
			<div class="clear"></div>
						<div class="al-block al-block-one bg-g-b">
				<div class="al-block-title">
					{$LNG.al_events}
				</div>                        
							
					<div class="al-block-content">
						{$LNG.al_no_events}
					</div>		
							</div><!--/al-block-->
			    	
			
		</div><!--/al-al-content-->  	
    </div><!--/al-right-one-->    
</div><!--/al-body-->
<script type="text/javascript">	
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.frame_12}: {$ally_name}</div>');
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/alliance.js?{$REV}"></script>
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/fleettable.js?{$REV}"></script>
{/block}