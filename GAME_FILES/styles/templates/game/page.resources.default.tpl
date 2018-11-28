{block name="title" prepend}{$LNG.lm_resources}{/block}
{block name="content"}
<div id="rs-body">
<form action="?page=resources" method="post">
<input type="hidden" name="mode" value="send">
    
<table class="rs-table wight-1000">
<tbody>
<tr>
	<td style="width:300px">&nbsp;</td>
	<td style="width:120px"><div class="rs-ico i-901 ri tooltip" data-tooltip-content="{$LNG.tech.901}"></div></td>
	<td style="width:120px"><div class="rs-ico i-902 ri tooltip" data-tooltip-content="{$LNG.tech.902}"></div></td>
	<td style="width:120px"><div class="rs-ico i-903 ri tooltip" data-tooltip-content="{$LNG.tech.903}"></div></td>
	<td style="width:120px"><div class="rs-ico i-911 ri tooltip" data-tooltip-content="{$LNG.tech.911}"></div></td>
	<td style="width:120px"><div class="rs-ico i-941 ri tooltip" data-tooltip-content="{$LNG.tech.941}"></div></td>
	<td style="width:85px;">&nbsp;</th>
</tr>
<tr>
	<td>{$LNG.rs_basic_income}</td>
	<td><span class="c-901">{$basicProduction.901|number}</span></td>
	<td><span class="c-902">{$basicProduction.902|number}</span></td>
	<td><span class="c-903">{$basicProduction.903|number}</span></td>
	<td><span class="c-911">{$basicProduction.911|number}</span></td>
	<td><span class="c-941">{$basicProduction.941|number}</span></td>
	<td>&nbsp;</td>
</tr>
{foreach $productionList as $productionID => $productionRow}
<tr>
	<td>
		<div class="rs-build-row" onclick="return parent.Dialog.info({$productionID})">
			<div class="rs-build-row-i i-u{$productionID}"></div>
			 {$LNG.tech.$productionID} <span class="c-smoke float-r">{if $productionID  > 200}{$LNG.rs_amount}{else}{$LNG.rs_lvl}{/if} {$productionRow.elementLevel}</span>
		</div>
	</td>
	<td><span class="c-{if $productionRow.production.901 >= 0}901{elseif $productionRow.production.901 < 0}red{/if}">{$productionRow.production.901|number}</span></td>
	<td><span class="c-{if $productionRow.production.902 >= 0}902{elseif $productionRow.production.902 < 0}red{/if}">{$productionRow.production.902|number}</span></td>
	<td><span class="c-{if $productionRow.production.903 >= 0}903{elseif $productionRow.production.903 < 0}red{/if}">{$productionRow.production.903|number}</span></td>
	<td><span class="c-{if $productionRow.production.911 >= 0}911{elseif $productionRow.production.911 < 0}red{/if}">{$productionRow.production.911|number}</span></td>
	<td><span class="c-{if $productionRow.production.941 >= 0}941{elseif $productionRow.production.941 < 0}red{/if}">{$productionRow.production.941|number}</span></td>
	<td>{html_options name="prod[{$productionID}]" options=$prodSelector selected=$productionRow.prodLevel}</td>
</tr>
{/foreach}
<tr>
	<td>{$LNG.rs_ress_bonus}</td>
	<td><span class="c-{if $bonusProduction.901 >= 0}901{elseif $bonusProduction.901 < 0}red{/if}">{$bonusProduction.901|number}</span></td>
	<td><span class="c-{if $bonusProduction.902 >= 0}902{elseif $bonusProduction.902 < 0}red{/if}">{$bonusProduction.902|number}</span></td>
	<td><span class="c-{if $bonusProduction.903 >= 0}903{elseif $bonusProduction.903 < 0}red{/if}">{$bonusProduction.903|number}</span></td>
	<td><span class="c-{if $bonusProduction.911 >= 0}911{elseif $bonusProduction.911 < 0}red{/if}">{$bonusProduction.911|number}</span></td>
	<td><span class="c-{if $bonusProduction.941 >= 0}941{elseif $bonusProduction.941 < 0}red{/if}">{$bonusProduction.941|number}</span></td>
	<td><input class="btn btn-primary" value="{$LNG.rs_calculate}" type="submit"></td>
</tr>
<tr>
	<td>{$LNG.rs_storage_capacity}:</td>
	<td><span class="c-901">{$storage.901}</span></td>
	<td><span class="c-902">{$storage.902}</span></td>
	<td><span class="c-903">{$storage.903}</span></td>
	<td>-</td>
	<td>-</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td>{$LNG.rs_sum}</td>
	<td><span class="c-{if $totalProduction.901 >= 0}901{elseif $totalProduction.901 < 0}red{/if}">{$totalProduction.901|number}</span></td>
	<td><span class="c-{if $totalProduction.902 >= 0}902{elseif $totalProduction.902 < 0}red{/if}">{$totalProduction.902|number}</span></td>
	<td><span class="c-{if $totalProduction.903 >= 0}903{elseif $totalProduction.903 < 0}red{/if}">{$totalProduction.903|number}</span></td>
	<td><span class="c-{if $totalProduction.911 >= 0}911{elseif $totalProduction.911 < 0}red{/if}">{$totalProduction.911|number}</span></td>
	<td><span class="c-{if $totalProduction.941 >= 0}941{elseif $totalProduction.941 < 0}red{/if}">{$totalProduction.941|number}</span></td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td>{$LNG.rs_daily}</td>
	<td><span class="c-{if $dailyProduction.901 >= 0}901{elseif $dailyProduction.901 < 0}red{/if}">{$dailyProduction.901|number}</span></td>
	<td><span class="c-{if $dailyProduction.902 >= 0}902{elseif $dailyProduction.902 < 0}red{/if}">{$dailyProduction.902|number}</span></td>
	<td><span class="c-{if $dailyProduction.903 >= 0}903{elseif $dailyProduction.903 < 0}red{/if}">{$dailyProduction.903|number}</span></td>
	<td><span class="c-{if $dailyProduction.911 >= 0}911{elseif $dailyProduction.911 < 0}red{/if}">{$dailyProduction.911|number}</span></td>
	<td><span class="c-{if $dailyProduction.941 >= 0}941{elseif $dailyProduction.941 < 0}red{/if}">{$dailyProduction.941|number}</span></td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td>{$LNG.rs_weekly}</td>
	<td><span class="c-{if $weeklyProduction.901 >= 0}901{elseif $weeklyProduction.901 < 0}red{/if}">{$weeklyProduction.901|number}</span></td>
	<td><span class="c-{if $weeklyProduction.902 >= 0}902{elseif $weeklyProduction.902 < 0}red{/if}">{$weeklyProduction.902|number}</span></td>
	<td><span class="c-{if $weeklyProduction.903 >= 0}903{elseif $weeklyProduction.903 < 0}red{/if}">{$weeklyProduction.903|number}</span></td>
	<td><span class="c-{if $weeklyProduction.911 >= 0}911{elseif $weeklyProduction.911 < 0}red{/if}">{$weeklyProduction.911|number}</span></td>
	<td><span class="c-{if $weeklyProduction.941 >= 0}941{elseif $weeklyProduction.941 < 0}red{/if}">{$weeklyProduction.941|number}</span></td>
	<td>&nbsp;</td>
</tr>
</tbody>
</table>
</form>

<div class="btn rs-btn-all" onclick="$('#off_prod').submit();">{$LNG.resource_1}</div>
<div class="btn rs-btn-all" onclick="$('#off_lab').submit();">{$LNG.resource_5}</div>
<div class="btn rs-btn-all" onclick="$('#on_prod').submit();">{$LNG.resource_2}</div>


<form id="on_prod" action="?page=resources" method="post">
	<input type="hidden" name="mode" value="AllPlanets">
	<input type="hidden" name="action" value="on">
</form>
<form id="off_lab" action="?page=resources" method="post">
	<input type="hidden" name="mode" value="AllPlanets">
	<input type="hidden" name="action" value="offl">
</form>
<form id="off_prod" action="?page=resources" method="post">
	<input type="hidden" name="mode" value="AllPlanets">
	<input type="hidden" name="action" value="off">
</form> 
</div>
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$header}</div>');	
</script>

{/block}