<div class="msg-title"> 
	<a href="game.php?page=galaxy&amp;galaxy={$targetPlanet.galaxy}&amp;system={$targetPlanet.system}">{$title}</a> 
</div> 
<div class="msg-btn-more btn btn-primary" onclick="$('#{$validationKey}').slideToggle();">
	{$LNG.battlesi_4}
</div> 
<div class="msg-res-rows"> 
	{foreach $spyData as $Class => $elementIDs}
	{foreach $elementIDs as $elementID => $amount}
	{if $elementID >= 900}
	<div class="msg-res-row c-{$elementID} tooltip" data-tooltip-content="{$LNG.tech.$elementID}"><div class="msg-res-row-i ri i-{$elementID}"></div>{$amount|number}</div> 
	{/if}
	{/foreach}
	{/foreach}
	<div class="msg-res-row tooltip" data-tooltip-content="{$LNG.msgt_11}"><div class="msg-res-row-i ri i-900 bga-0"> </div>15</div> 
	<div class="msg-res-row tooltip" data-tooltip-content="{$LNG.msgt_12}"><div class="msg-res-row-i ri i-qb bga-0"> </div>392</div> 
	<div class="msg-res-row tooltip" data-tooltip-content="{$LNG.msgt_13}"><div class="msg-res-row-i ri i-qs bga-0"> </div>0</div> 
	<div class="msg-res-row tooltip" data-tooltip-content="{$LNG.msgt_14}"><div class="msg-res-row-i ri i-mis5 bga-0"></div>0</div> 
	<div class="clear"></div> 
</div> 
<div id="{$validationKey}" class="msg-more" style="display: none;"> 
	{foreach $spyData as $Class => $elementIDs}
	{if $Class == 100}
	<div class="msg-unit-title">
		{$LNG.tech.$Class}
	</div>
	{foreach $elementIDs as $elementID => $amount}
	<div class="msg-unit-row"> 
		<div class="msg-unit-row-i i-u{$elementID}"></div> 
		<div class="msg-unit-row-n">{$LNG.tech.$elementID}</div> 
		<div class="msg-unit-row-c c-902">{$amount|number}%</div>
	</div>  
	{/foreach}
	{/if}
	{/foreach}
	<div class="clear"></div> 
	{foreach $spyData as $Class => $elementIDs}
	{if $Class == 200}
	<div class="msg-unit-title">
		{$LNG.tech.$Class}
	</div>
	{foreach $elementIDs as $elementID => $amount}
	<div class="msg-unit-row"> 
		<div class="msg-unit-row-i i-u{$elementID}"></div> 
		<div class="msg-unit-row-n">{$LNG.tech.$elementID}</div> 
		<div class="msg-unit-row-c c-902">{$amount|number}</div>
	</div>  
	{/foreach}
	{/if}
	{/foreach}
	<div class="clear"></div> 
	{foreach $spyData as $Class => $elementIDs}
	{if $Class == 400}
	<div class="msg-unit-title">
		{$LNG.tech.$Class}
	</div>
	{foreach $elementIDs as $elementID => $amount}
	<div class="msg-unit-row"> 
		<div class="msg-unit-row-i i-u{$elementID}"></div> 
		<div class="msg-unit-row-n">{$LNG.tech.$elementID}</div> 
		<div class="msg-unit-row-c c-902">{$amount|number}</div>
	</div>  
	{/foreach}
	{/if}
	{/foreach}
	<div class="clear"></div> 
	{foreach $spyData as $Class => $elementIDs}
	{if $Class == 0}
	<div class="msg-unit-title">
		{$LNG.tech.$Class}
	</div>
	{foreach $elementIDs as $elementID => $amount}
	<div class="msg-unit-row"> 
		<div class="msg-unit-row-i i-u{$elementID}"></div> 
		<div class="msg-unit-row-n">{$LNG.tech.$elementID}</div> 
		<div class="msg-unit-row-c c-902">{$amount|number}</div>
	</div>  
	{/foreach}
	{/if}
	{/foreach}
	<div class="clear"></div> 
	<div class="msg-spy-footer"> 
		<a class="msg-spy-footer-btn-l btn btn-primary" href="game.php?page=fleetTable&amp;galaxy={$targetPlanet.galaxy}&amp;system={$targetPlanet.system}&amp;planet={$targetPlanet.planet}&amp;planettype={$targetPlanet.planet_type}&amp;target_mission=1">{$LNG.type_mission_1}</a> {if $targetChance >= $spyChance}<span class="c-red">{$LNG.sys_mess_spy_destroyed}</span>{/if}
	
		{if $isBattleSim}<a class="msg-spy-footer-btn-r btn btn-primary" href="game.php?page=battleSimulator{foreach $spyData as $Class => $elementIDs}{foreach $elementIDs as $elementID => $amount}&amp;im[{$elementID}]={$amount}{/foreach}{/foreach}">{$LNG.fl_simulate}</a>{/if} 
	</div> 
</div>