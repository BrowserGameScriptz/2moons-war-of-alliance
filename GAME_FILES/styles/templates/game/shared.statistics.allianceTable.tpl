<div class="st-row bga-b2 st-row-header">
	<div class="st-row-position i-st-rank tooltip" data-tooltip-content="{$LNG.st_position}"></div>
	<div class="st-row-alliance i-st-ally tooltip" data-tooltip-content="{$LNG.st_alliance}"></div>
	<div class="st-row-level i-st-level tooltip" data-tooltip-content="{$LNG.tt_lvl}"></div>
	<div class="st-row-members i-st-party tooltip" data-tooltip-content="{$LNG.st_members}"></div>	
	<div class="st-row-permember i-st-permember tooltip" data-tooltip-content="{$LNG.st_per_member}"></div>
	<div class="st-row-points i-st-1-1 tooltip" data-tooltip-content="{$LNG.st_points}"></div>
</div>
<div class="st-scroll">
	
	{foreach name=RangeList item=RangeInfo from=$RangeList}<div class="st-row">
				{if $RangeInfo.id == $CUser_ally}<div class="st-row-owner bga-903"></div>{/if}
		<div class="st-row-position">
			{$RangeInfo.rank}
					</div>
		<div class="st-row-alliance">
			<div class="ico-flag i-f-eu">
				<span class="c-diplo-0 btn-transp" onclick="parent.Dialog.AllyInfo({$RangeInfo.id});">{$RangeInfo.name}</span>
			</div>
		</div>
		<div class="st-row-level">{$RangeInfo.allianceLevel}</div>
		<div class="st-row-members">{$RangeInfo.members}</div>
		<div class="st-row-permember">{$RangeInfo.mppoints}</div>
		<div class="st-row-points">{$RangeInfo.points}</div>
	</div>{/foreach}
	</div>

