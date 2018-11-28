<table class="wight-100">
    <tr>
        <th>{$LNG.in_level}</th>
		<th>{$LNG.in_storage}</th>
        <th>{$LNG.in_difference}</th>
	</tr>
    {foreach $productionTable as $elementLevel => $productionData}
	{$storageDiff = $productionData.production - $productionData.production.$CurrentLevel}
	<tr>
        <td><span{if $CurrentLevel == $elementLevel} style="color:#ff0000"{/if}>{$elementLevel}</span></td>
		<td><span style="color:{if $productionData.production > 0}lime{elseif $productionData.production < 0}red{else}white{/if}">{$productionData.production|number}</span></td>
        <td><span style="color:{if $storageDiff > 0}lime{elseif $storageDiff < 0}red{else}white{/if}">{$storageDiff|number}</span></td>
	</tr>
	{/foreach}
</table>