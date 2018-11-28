{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div id="al-body">

	<div class="al-left bg-g-b">		
		<div class="btn" onclick="parent.Frame.IFrame.open('alliance');">
			{$LNG.al_back}
		</div>
	</div>
	
	<div class="al-right-one">	
		<div class="al-content">			
			<div class="al-block al-block-one bg-g-b">
				<div class="al-block-title">
					{$al_users_list}
				</div> 
				<div class="al-block-content">

					<table id="memberList" class="al-table-members table-transparent wight-100">
						<thead>
							<tr>
								<th style="border-left:0; padding-left:15px; text-align:left;">
									<a href="game.php?page=alliance&mode=memberList&amp;sort=name">{$LNG.al_member}</a>
								</th>
								<th>
									<a href="game.php?page=alliance&amp;mode=memberList&amp;sort=level">Lvl.</a>
								</th>
								<th>
									<a href="game.php?page=alliance&mode=memberList&amp;sort=rank">{$LNG.al_position}</a>
								</th>
								<th>
									<a href="game.php?page=alliance&mode=memberList&amp;sort=points">{$LNG.al_points}</a>
								</th>
								<th>
									{$LNG.al_coords}
								</th>
								<th>
									<a href="game.php?page=alliance&mode=memberList&amp;sort=reg_time">{$LNG.al_member_since}</a>
								</th>
								<th>
									<a href="game.php?page=alliance&mode=memberList&amp;sort=online">{$LNG.al_estate}</a>
								</th>
							</tr>
						</thead>
						<tbody>
												{foreach $memberList as $userID => $memberListRow}<tr>
							<td class="f-ta-l">
								<span class="ico-flag i-f-eu" onclick="parent.Dialog.Playercard({$userID}, '{$memberListRow.username}');">{$memberListRow.username}</span>
							</td>
							<td>{$memberListRow.commanderLevel}</td>
							<td>{$memberListRow.rankName}</td>
							<td>{$memberListRow.points|number}</td>		
							<td><a href="game.php?page=galaxy&amp;galaxy={$memberListRow.galaxy}&amp;system={$memberListRow.system}" data-postion="{$memberListRow.galaxy}:{$memberListRow.system}:{$memberListRow.planet}">[{$memberListRow.galaxy}:{$memberListRow.system}:{$memberListRow.planet}]</a></td>
							<td>{$memberListRow.register_time}</td>
							<td>{if $rights.ONLINESTATE}{if $memberListRow.onlinetime < 4}<span style="color:#009e4a">{$LNG.al_memberlist_on}</span>{elseif $memberListRow.onlinetime <= 15}<span style="color:yellow">{$memberListRow.onlinetime} {$LNG.al_memberlist_min}</span>{else}<span style="color:red">{$LNG.al_memberlist_off}</span>{/if}{else}-{/if}
																						</td>
						</tr>{/foreach}
												</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/alliance.js?{$REV}"></script>
{/block}