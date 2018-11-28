{block name="title" prepend}{$LNG.lm_buddylist}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">
<div class="title-tabs">
	<div class="title-tab" onclick="location = 'game.php?page=playerCard';">{$LNG.playercar_13}</div>
	<div class="title-tab" onClick="location = 'game.php?page=playerCard&mode=factor';">{$LNG.frame_5}</div>
	<div class="title-tab title-tab-active" onClick="location = 'game.php?page=buddyList';">{$LNG.playercar_28}</div>
</div>
</div>
</div>
<div id="popup">
	

<div id="al-info" class="full-scroll">
	<div class="al-block al-block-one bg-g-b">
							{if !empty($otherRequestList)}<div class="al-block-title">
    		{$LNG.bu_requests}
     	</div>
		<div class="al-block-content">
   			<table class="al-table-members table-transparent wight-100">				
				<tr>
					<th>{$LNG.bu_player}</th>
					<th>{$LNG.bu_alliance}</th>
					<th>{$LNG.bu_text}</th>
					<th>&nbsp;</th>
				</tr>
								{foreach $otherRequestList as $otherRequestID => $otherRequestRow}<tr>
					<td><a href="game.php?page=playerCard&id={$otherRequestRow.id}">{$otherRequestRow.username}</a></td>
					<td>{if {$otherRequestRow.ally_name}}<a href="game.php?page=alliance&amp;mode=info&amp;id={$otherRequestRow.ally_id}">{$otherRequestRow.ally_name}</a>{else}-{/if}</td>	
					<td><div style="overflow:auto; width:200px;">{$otherRequestRow.text}</div></td>
					<td>
						<a href="game.php?page=buddyList&amp;mode=accept&amp;id={$otherRequestID}"><img src="styles/resource/images/true.png" alt="{$LNG.bu_accept}" title="{$LNG.bu_accept}"></a>
						<a href="game.php?page=buddyList&amp;mode=delete&amp;id={$otherRequestID}"><img src="styles/images/false.png" alt="{$LNG.bu_decline}" title="{$LNG.bu_decline}"></a>
					</td>
				</tr>{/foreach}
								
			</table>
		</div>{/if}
							{if !empty($myRequestList)}<div class="al-block-title">
    		{$LNG.bu_my_requests}
     	</div>
		<div class="al-block-content">
			<table class="al-table-members table-transparent wight-100">
				<tr>
					<th>{$LNG.bu_player}</th>
					<th>{$LNG.bu_alliance}</th>
					<th>{$LNG.bu_text}</th>
					<th>&nbsp;</th>
				</tr>
								{foreach $myRequestList as $myRequestID => $myRequestRow}<tr>
					<td><a href="game.php?page=playerCrd&id={$myRequestRow.id}">{$myRequestRow.username}</a></td>
					<td>{if {$myRequestRow.ally_name}}<a href="game.php?page=alliance&amp;mode=info&amp;id={$myRequestRow.ally_id}">{$myRequestRow.ally_name}</a>{else}-{/if}</td>
					<td><div style="overflow:auto; width:200px;">{$myRequestRow.text}</div></td>
					<td><a class="al-btn-kick btn i-al-del tooltip" data-tooltip-content="{$LNG.bu_cancel_request}" href="game.php?page=buddyList&amp;mode=delete&amp;id={$myRequestID}"></a></td>
				</tr>{/foreach}
							
				
			</table>
		</div>{/if}
		
						<div class="al-block-title">
    		{$LNG.lm_buddylist}
     	</div>
		<div class="al-block-content">
			<table class="al-table-members table-transparent wight-100">
				<tr>
					<th>{$LNG.bu_player}</td>
					<th>{$LNG.bu_alliance}</th>
					<th>{$LNG.bu_coords}</th>
					<th>{$LNG.bu_online}</th>
					<th>&nbsp;</th>
				</tr>
								{foreach $myBuddyList as $myBuddyID => $myBuddyRow}
								<tr>
					<td><a href="game.php?page=playerCrd&id={$myBuddyRow.id}">{$myBuddyRow.username}</a></td>
					<td>{if {$myBuddyRow.ally_name}}<a href="game.php?page=alliance&amp;mode=info&amp;id={$myBuddyRow.ally_id}">{$myBuddyRow.ally_name}</a>{else}-{/if}</td>
					<td><a href="game.php?page=galaxy&amp;galaxy={$myBuddyRow.galaxy}&amp;system={$myBuddyRow.system}">[{$myBuddyRow.galaxy}:{$myBuddyRow.system}:{$myBuddyRow.planet}]</a></td>
					<td>{if $myBuddyRow.onlinetime < 4}<span style="color:lime">{$LNG.bu_connected}</span>{elseif $myBuddyRow.onlinetime >= 4 && $myBuddyRow.onlinetime <= 15}<span style="color:yellow">{$myBuddyRow.onlinetime} {$LNG.bu_minutes}</span>{else}<span style="color:red">{$LNG.bu_disconnected}</span>{/if}</td>
					<td><a class="al-btn-kick btn i-al-del tooltip" data-tooltip-content="{$LNG.bu_delete}" href="game.php?page=buddyList&amp;mode=delete&amp;id={$myBuddyID}"></a></td>
				</tr>
								{foreachelse}<tr><td colspan="5">{$LNG.bu_no_buddys}</td></tr>{/foreach}
								</table>
			</div>
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
						<a class="al-btn-kick btn i-al-del tooltip" data-tooltip-content="{$LNG.bu_delete}" href="game.php?page=buddyList&mode=delenemies&id={$ID}"></a>
					</td>
				</tr>{foreachelse}
				<tr><th colspan="4">{$LNG.playercar_21}</th></tr>
				{/foreach}
											</table>
		</div>
		</div>
	</div>
</div>

</div>
{/block}