{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div id="al-body">

	<div class="al-left bg-g-b">
		
		<div class="al-left-btn btn btn-primary i-al-overview tooltip" data-tooltip-content="{$LNG.alliance_10}" onclick="parent.Frame.IFrame.open('alliance');"></div>		
		<div class="al-left-btn btn btn-primary i-al-ranks tooltip" data-tooltip-content="{$LNG.al_manage_ranks}" onclick="parent.Frame.IFrame.open('alliance','admin&action=permissions');"></div>
		<div class="al-left-btn btn btn-primary i-al-layers tooltip" data-tooltip-content="{$LNG.al_manage_members}" onclick="parent.Frame.IFrame.open('alliance','admin&action=members');"></div>
		
			{if $rights.DIPLOMATIC}<div class="al-left-btn btn btn-primary i-al-diplo tooltip" data-tooltip-content="{$LNG.al_manage_diplo}" onclick="parent.Frame.IFrame.open('alliance','admin&action=diplomacy');"></div>{/if}
				
		
				{if $AllianceOwner}<div class="al-left-btn btn i-al-del tooltip" data-tooltip-content="{$LNG.al_legend_disolve_alliance}"
			onClick="Confirm.action(
				'{$LNG.frame_12}',
				'{$LNG.al_leave_ally}',
				'{$LNG.bd_continue}',
				'{$LNG.buildings_6}',
				'parent.Frame.IFrame.open(\'alliance\',\'admin&action=close\');');">
		</div>	
		<div class="al-left-btn btn i-al-betray tooltip" data-tooltip-content="{$LNG.al_transfer_alliance}" onclick="parent.Frame.IFrame.open('alliance','admin&action=transfer');"></div>{/if}
			
	</div><!--/al-left-->
	
	<div class="al-right-one">	
		<div class="al-content">			
			<div class="al-block al-block-one bg-g-b">
			
								{foreach $diploList.0 as $diploMode => $diploAlliances}<div class="al-block-title f-ta-l">
					<span class="c-diplo-{$diploMode}">{$LNG.al_diplo_level.$diploMode}</span>
					<div class="btn al-btn-new-diplo" onclick="parent.Dialog.open('game.php?page=alliance&amp;mode=admin&amp;action=diplomacyCreate&amp;diploMode={$diploMode}', 650, 280);">
						{$LNG.al_diplo_create}
					</div>
					<div class="clear"></div>
				</div>
				
				
				<div class="al-block-content">
										{foreach $diploAlliances as $diploID => $diploName}
										<span>{$diploName}</span>
										{foreachelse}
										<span>{$LNG.al_diplo_no_entry}</span>{/foreach}
									</div><!--/-->{/foreach}
									
									
								
								
								<div class="al-block-title">
					{$LNG.al_diplo_accept}
				</div>
				<div class="al-block-content">
				{if array_filter($diploList.1)}
				{foreach $diploList.1 as $diploMode => $diploAlliances}	
				{if !empty($diploAlliances)}
				{$LNG.al_diplo_level.$diploMode}<br/>
						<ul>
													{foreach $diploAlliances as $diploID => $diploName}<li>
								{$diploName}
																<a href="game.php?page=alliance&amp;mode=admin&amp;action=diplomacyDelete&amp;id={$diploID}" onclick="return confirm('{$LNG.al_diplo_confirm_delete}');">
								<img src="styles/images/false.png" alt="" width="16" height="16"></a>
															</li>{/foreach}
												</ul>
				{/if}
				{/foreach}
				{else}
					<span>{$LNG.al_diplo_no_accept}</span>	{/if}			</div><!--/-->
				
								
				<div class="al-block-title">
					{$LNG.al_diplo_accept_send}
				</div>
				<div class="al-block-content">
				{if array_filter($diploList.2)}
				{foreach $diploList.2 as $diploMode => $diploAlliances}	
				{if !empty($diploAlliances)}
				{$LNG.al_diplo_level.$diploMode}<br/>
						<ul>
													{foreach $diploAlliances as $diploID => $diploName}<li>
								{$diploName}
																<a href="game.php?page=alliance&amp;mode=admin&amp;action=diplomacyDelete&amp;id={$diploID}" onclick="return confirm('{$LNG.al_diplo_confirm_delete}');">
								<img src="styles/images/false.png" alt="" width="16" height="16"></a>
															</li>{/foreach}
												</ul>
				{/if}
				{/foreach}
				{else}
					<span>{$LNG.al_diplo_no_accept}</span>	{/if}			</div><!--/-->
				
			</div>
		</div>
	</div>
</div>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/alliance.js?{$REV}"></script>
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html(
		'<div class="title-text">'
			+'{$LNG.al_manage_alliance} &rArr; {$LNG.al_manage_diplo}:'
        +'</div>'		
		+'<div class="title-tabs">'
			+'<div class="title-tab" onClick="Dialog.open(\'game.php?page=alliance&amp;mode=admin&amp;action=diplomacyCreate&amp;diploMode=0\', 650, 280);">{$LNG.al_diplo_create}</div>'
		+'</div>'
	);
</script>
{/block}