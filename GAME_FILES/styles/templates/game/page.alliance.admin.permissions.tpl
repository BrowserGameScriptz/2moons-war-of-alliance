{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
{$countRank = count($availableRanks)}
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
				<div class="al-block-title">
					{$LNG.al_configura_ranks}
				</div> 
				<div class="al-block-content">				
				<form action="game.php?page=alliance&amp;mode=admin&amp;action=permissionsSend" method="post">				
					<table class="table-transparent wight-100 al-table-rank">
					<tr>
						<td colspan="2">{$LNG.al_rank_name}</td>
												{foreach $availableRanks as $rankName}<td><div class="al-table-rank-ico i-a-{$rankName} tooltip" data-tooltip-content="{$LNG.al_rank_desc.$rankName}"></div></td>{/foreach}
											</tr>
											
											{foreach $rankList as $rowId => $rankRow}<tr>
						<td><a href="game.php?page=alliance&amp;mode=admin&amp;action=permissionsSend&amp;deleteRank={$rowId}" class="c-red tooltip" data-tooltip-content="{$LNG.al_dlte}">&Chi;</a></td>
						<td style="width:260px;"><input type="text" size="32" name="rank[{$rowId}][rankName]" value="{$rankRow.rankName}"></td>
												{foreach $availableRanks as $rankId => $rankName}<td><input type="checkbox" name="rank[{$rowId}][{$rankId}]" value="1"{if $rankRow[$rankName]} checked{/if}{if !$ownRights[$rankName]} disabled{/if}></td>{/foreach}
											</tr>{/foreach}
											
											
										<tr>
						<td>&nbsp;</td>
						<td><input type="text" size="32" name="newrank[rankName]" value="" placeholder="{$LNG.alliance_11}"></td>
												{foreach $availableRanks as $rankId => $rankName}<td><input type="checkbox" name="newrank[{$rankId}]" value="1" /></td>{/foreach}
												
											</tr>
					</table><br />
					<input type="submit" class="btn btn-primary" value="{$LNG.al_save}">
				</form>
			</div>
		</div>
	</div>
</div>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/alliance.js?0006"></script>
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.al_manage_alliance}</div>');
</script>
{/block}