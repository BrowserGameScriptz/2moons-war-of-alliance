<div class="st-row bga-b2 st-row-header">
	<div class="st-row-position i-st-rank tooltip" data-tooltip-content="{$LNG.st_position}"></div>
	<div class="st-row-player i-st-user tooltip" data-tooltip-content="{$LNG.st_player}"></div>
	<div class="st-row-level i-st-level tooltip" data-tooltip-content="{$LNG.tt_lvl}"></div>
	<div class="st-row-alliance i-st-ally tooltip" data-tooltip-content="{$LNG.st_alliance}"></div>
	<div class="st-row-points i-st-1-1 tooltip" data-tooltip-content="{$LNG.st_points}"></div>
</div>

<div class="st-scroll">
{foreach name=RangeList item=RangeInfo from=$RangeList}
	<div class="st-row">
	{if $RangeInfo.id == $CUser_id}<div class="st-row-owner bga-903"></div>{/if}
		<div class="st-row-position">
			{$RangeInfo.rank}
					</div>
		<div class="st-row-player cursor-p" onclick="parent.Dialog.Playercard({$RangeInfo.id}, '{$RangeInfo.name}');">
		
			<div class="float-l ico-flag i-f-ge {$RangeInfo.class} ">
				{$RangeInfo.name}
			</div>
						<div class="float-r c-smoke">
				{$RangeInfo.displayShort}
			</div>	
					
		</div>
		<div class="st-row-level">{$RangeInfo.commanderLevel}</div>
		<div class="st-row-alliance">{if $RangeInfo.allyid != 0}<span class="c-diplo-100 btn-transp" onclick="parent.Dialog.AllyInfo({$RangeInfo.allyid});">{if $RangeInfo.allyid == $CUser_ally}<span style="color:#33CCFF">{$RangeInfo.allyname}</span>{else}{$RangeInfo.allyname}{/if}</span>{/if}</div>
		<div class="st-row-points">{$RangeInfo.points}</div>
	</div>{/foreach}
</div>