{block name="title" prepend}{$LNG.lm_buddylist}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">
<div class="title-tabs">
	<div id="tab-fleet" class="title-tab" onclick="location = 'game.php?page=playerCard';">{$LNG.playercar_13}</div>
	<div id="tab-defenses" class="title-tab" onClick="location = 'game.php?page=buddyList';">{$LNG.playercar_14}</div>
	<div id="tab-prime" class="title-tab title-tab-active" onClick="location = 'game.php?page=buddyList&mode=enemies';">{$LNG.playercar_15}</div>
</div>
</div>
</div>
<div id="popup">
	
<div id="al-info" class="fullscroll">
	<div class="al-block al-block-one bg-g-b">
		<div class="al-block-title">
    		{$LNG.playercar_20}  
		</div>
		<div class="al-block-content">
   			<table class="al-table-members table-transparent wight-100">
				<tr>
					<th>{$LNG.bu_player}</th>
					<th>{$LNG.bu_alliance}</th>
					<th>{$LNG.bu_coords}</th>
					<th>&nbsp;</th>
				</tr>
												{foreach $ennemieArray as $ID => $Data}<tr>
					<td><a href="game.php?page=playerCard&id={$ID}">{$Data.ennemieName}</a></td>
					<td>
								{$Data.ennemieAlly}			</td>
					<td>
						
						{$Data.ennemieCoor}
					</td>
					<td>
						<a class="al-btn-kick btn i-al-del tooltip" data-tooltip-content="{$LNG.bu_cancel_request}" href="game.php?page=buddyList&mode=delenemies&id={$ID}"></a>
					</td>
				</tr>{foreachelse}
				<tr><th colspan="4">{$LNG.playercar_21}</th></tr>
				{/foreach}
											</table>
		</div>
	</div>
</div>

</div>
{/block}