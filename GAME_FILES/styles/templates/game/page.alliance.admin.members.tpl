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
				<div class="al-block-title">
					{$al_users_list}
				</div> 
				<div class="al-block-content">

					<form action="game.php?page=alliance&amp;mode=admin&amp;action=membersSave" method="post">					
						<table id="memberList" class="al-table-members table-transparent wight-100">
							<thead>
								<tr>
									<th>
										<a href="game.php?page=alliance&mode=admin&action=members&amp;sort=name">{$LNG.al_member}</a>
									</th>
									<th>
										<a href="game.php?page=alliance&mode=admin&action=members&amp;sort=rank">{$LNG.al_position}</a>
									</th>
									<th>
										<a href="game.php?page=alliance&mode=admin&action=members&amp;sort=points">{$LNG.al_points}</a>
									</th>
									<th>
										{$LNG.al_coords}
									</th>
									<th>
										<a href="game.php?page=alliance&mode=admin&action=members&amp;sort=reg_time">{$LNG.al_member_since}</a>
									</th>
									<th>
										<a href="game.php?page=alliance&mode=admin&action=members&amp;sort=online">{$LNG.al_estate}</a>
									</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
														
														
														{foreach $memberList as $userID => $memberListRow}<tr>
								<td class="f-ta-l">
									<span class="ico-flag i-f-ru" onclick="parent.Dialog.Playercard({$userID},'{$memberListRow.username}');">{$memberListRow.username}</span>
								</td>
								<td>{if $memberListRow.rankID == -1}{$founder}{elseif !empty($rankSelectList)}{html_options class="rankSelect" name="rank[{$userID}]" options=$rankSelectList selected=$memberListRow.rankID}{else}{$rankList[$memberListRow.rankID]}{/if}</td>
								<td><span title="{pretty_number($memberListRow.points)}">{shortly_number($memberListRow.points)}</span></td>
								<td>
									<a href="game.php?page=galaxy&amp;galaxy={$memberListRow.galaxy}&amp;system={$memberListRow.system}">[{$memberListRow.galaxy}:{$memberListRow.system}:{$memberListRow.planet}]</a>
								</td>
								<td>{$memberListRow.register_time}</td>
								<td>{if $rights.ONLINESTATE}{if $memberListRow.onlinetime < 4}<span style="color:#009e4a">{$LNG.al_memberlist_on}</span>{elseif $memberListRow.onlinetime >= 4 && $memberListRow.onlinetime <= 15}<span style="color:yellow">{$memberListRow.onlinetime} {$LNG.al_memberlist_min}</span>{else}<span style="color:red">{$LNG.al_memberlist_off}</span>{/if}{else}-{/if}
								</td>
								<td>
																</td>
							</tr>{/foreach}
							
														</tbody>
						</table>
						<br />
						<input type="submit" class="btn btn-primary" value="{$LNG.al_save}">
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