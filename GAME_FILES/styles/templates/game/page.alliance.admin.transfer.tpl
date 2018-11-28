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
		<div class="al-content" style="width:350px;">			
			<div class="al-block al-block-one bg-g-b">
				<div class="al-block-title">
    				{$LNG.al_transfer_alliance}
  				</div> 
				<div class="al-block-content">
					<form action="game.php?page=alliance&amp;mode=admin&amp;action=transfer" method="post">
					{$LNG.al_transfer_to}: {html_options class="al-select-big" name=newleader options=$transferUserList}
</select>

					<br />
					<br />
					<input type="submit" class="btn btn-primary" value="{$LNG.al_transfer_submit}">
					</form>
				</div>
				
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