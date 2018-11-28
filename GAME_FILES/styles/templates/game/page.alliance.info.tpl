{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text"><div class="title-text">{*<div class="ico-flag i-f-ua float-l">*}{$LNG.al_ally_information}: {$ally_name}{*</div>*}</div></div>
</div>
<div id="popup">
	

<div id="al-info" class="fullscroll">
		{if !empty($ally_description)}<div class="pl-box bga-b2">	
		{$ally_description}
		</div>{/if}
		<div class="pl-part-left">
		{if !empty($statisticData)}
		<div class="pl-title">		
			{$LNG.alliance_3}
		</div>
		<div class="pl-box bga-b2">
			<table class="wight-100 table-transparent"><tbody>
			<tr>
				<th class="f-ta-l"><span class="pl-line">{$LNG.pl_fightwon}</span></th>
				<th class="f-ta-c"><span class="pl-line">{$LNG.pl_fightdraw}</span></th>
				<th class="f-ta-r"><span class="pl-line">{$LNG.pl_fightlose}</span></th>                
			</tr>
			<tr>
				<td class="f-ta-l">{$statisticData.fightwon|number}</td>						
				<td class="f-ta-c">{$statisticData.fightdraw|number}</td>
				<td class="f-ta-r">{$statisticData.fightlose|number}</td>
			</tr>
			</tbody></table>	
			<div>&nbsp;</div>		
			<div class="pl-line">
				{$LNG.playercar_9} <div class="float-r">{$statisticData.ratio}</div>
			</div>			
			<div class="pl-line f-ta-c"> <span class="c-902">{$statisticData.unitsshot}</span> / <span class="c-red">{$statisticData.unitslose}</span></div>
			<div class="pl-totals">				
				<div class="pl-totals-bar bga-902">
					<div class="pl-totals-bar-bg bga-902" style="width:{$statisticData.varDest}%; right:0;"></div>	
				</div>
				<div class="pl-totals-bar bga-red2">					
					<div class="pl-totals-bar-bg bga-red2"  style="width:{$statisticData.varLost}%; left:0;"></div>
				</div>
			</div>
		</div>
		{/if}
		<div class="pl-title">		
			{$LNG.al_diplo}
		</div>
		<div class="pl-box bga-b2">
		{if $diplomaticData}
			{if !empty($diplomaticData.0)}{$LNG.al_diplo_level.0}<br><ul>{foreach item=PaktInfo from=$diplomaticData.0}<li><a href="?page=alliance&mode=info&amp;id={$PaktInfo.1}">{$PaktInfo.0}</a></li>{/foreach}</ul>{/if}
			{if !empty($diplomaticData.1)}{$LNG.al_diplo_level.1}<br><ul>{foreach item=PaktInfo from=$diplomaticData.1}<li><a href="?page=alliance&mode=info&amp;id={$PaktInfo.1}">{$PaktInfo.0}</a></li>{/foreach}</ul>{/if}
			{if !empty($diplomaticData.2)}{$LNG.al_diplo_level.2}<br><ul>{foreach item=PaktInfo from=$diplomaticData.2}<li><a href="?page=alliance&mode=info&amp;id={$PaktInfo.1}">{$PaktInfo.0}</a></li>{/foreach}</ul>{/if}
			{if !empty($diplomaticData.3)}{$LNG.al_diplo_level.3}<br><ul>{foreach item=PaktInfo from=$diplomaticData.3}<li><a href="?page=alliance&mode=info&amp;id={$PaktInfo.1}">{$PaktInfo.0}</a></li>{/foreach}</ul>{/if}
			{if !empty($diplomaticData.4)}{$LNG.al_diplo_level.4}<br><ul>{foreach item=PaktInfo from=$diplomaticData.4}<li><a href="?page=alliance&mode=info&amp;id={$PaktInfo.1}">{$PaktInfo.0}</a></li>{/foreach}</ul>{/if}
		{else}
			<span>{$LNG.alliance_6}</span>
		{/if}
					</div>
		
	</div><!--/part-left-->
	
	<div class="pl-part-right">
		<div class="al-info-img">
			<div class="al-img i-ai1">
	<div class="al-img-tag c-d{$allianceDivision}">{$ally_tag}</div>
	<div class="al-info-members tooltip" data-tooltip-content="{$LNG.al_ally_info_members}">({$ally_member_scount} / {$ally_max_members})</div>
</div>		</div>
					{if $ally_request}<div class="pl-title">{$ally_request_min_points_info}</div>
			<div class="pl-box bga-b2">
                       		{if $ally_request_min_points || $ally_max_allowed}<div class="btn btn-danger">{$LNG.alliance_5}</div>{else}<a href="game.php?page=alliance&amp;mode=apply&amp;id={$allianceId}" class="btn btn-primary">{$LNG.alliance_5}</a>{/if}
            			</div>{/if}
        		
		
		
	</div><!--/part-right-->
	
</div>



</div>
{/block}