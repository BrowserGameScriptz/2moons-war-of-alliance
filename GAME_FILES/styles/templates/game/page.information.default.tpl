{block name="title" prepend}{$LNG.lm_info}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">{$LNG.tech.$elementID}</div>
</div>
<div id="popup">
<div class="inf-description i-u{$elementID}">
	{$LNG.longDescription.$elementID}
</div>
{if !empty($productionTable.production)}
{include file="shared.information.production.tpl"}
{/if}
{if !empty($productionTable.storage)}
{include file="shared.information.storage.tpl"}
{/if}
{if $elementID == 16}
{include file="shared.information.bank.tpl"}
{/if}
{if !empty($FleetInfo)}
{include file="shared.information.shipInfo.tpl"}
{/if}
{if !empty($gateData)}
{include file="shared.information.gate.tpl"}
{/if}
{if !empty($MissileList)}
{include file="shared.information.missiles.tpl"}
{/if}


</div>
{/block}