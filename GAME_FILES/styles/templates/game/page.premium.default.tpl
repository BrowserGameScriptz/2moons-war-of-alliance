{block name="title" prepend}{$LNG.lm_fleet}{/block}
{block name="content"}
<div id="prem-content">

	<div id="prem-elements">
				<div id="b-extra" class="prem-container-box">
				<div class="build-type">
				{$LNG.premium_8}		
			</div>
				{foreach $Bonuses as $ID => $Bonus}{if $Bonus.type == 4}
							<div id="bextra{$Bonus.orderCol}" class="prem-box i-p-extra-{$Bonus.orderCol}" onClick="OpenPrem('extra{$Bonus.orderCol}');">
	<div class="prem-box-name">{$Bonus.name}</div>
	{if $Bonus.premiumActId3 == $Bonus.orderCol}<div class="prem-box-time c-903">{pretty_time($Bonus.premiumActTim3)}</div>{/if}
	</div>{/if}{/foreach}
							
						<div class="clear"></div>
		</div>
		
		
				<div id="b-pvp" class="prem-container-box">
				<div class="build-type">
				{$LNG.premium_1}		
			</div>
				{foreach $Bonuses as $ID => $Bonus}{if $Bonus.type == 1}
							<div id="bpvp{$Bonus.orderCol}" class="prem-box i-p-pvp-{$Bonus.orderCol}" onClick="OpenPrem('pvp{$Bonus.orderCol}');">
	<div class="prem-box-name">{$Bonus.name}</div>
	{if $Bonus.premiumActId1 == $Bonus.orderCol}<div class="prem-box-time c-903">{pretty_time($Bonus.premiumActTim1)}</div>{/if}
	</div>{/if}{/foreach}
							
						<div class="clear"></div>
		</div>
				<div id="b-pve" class="prem-container-box">
				<div class="build-type">
				{$LNG.premium_2}		
			</div>
				{foreach $Bonuses as $ID => $Bonus}{if $Bonus.type == 2}
							<div id="bpve{$Bonus.orderCol}" class="prem-box i-p-pve-{$Bonus.orderCol}" onClick="OpenPrem('pve{$Bonus.orderCol}');">
	<div class="prem-box-name">{$Bonus.name}</div>
	{if $Bonus.premiumActId2 == $Bonus.orderCol}<div class="prem-box-time c-903">{pretty_time($Bonus.premiumActTim2)}</div>{/if}
	</div>{/if}{/foreach}
							
						<div class="clear"></div>
		</div>
						
		<div id="b-dm" class="prem-container-box">
		<div class="build-type">
				{$LNG.tech.921}		
			</div>
			<div id="bdmv" class="prem-box i-p-dm-v" onclick="OpenPrem('dmv');">
	<div class="prem-box-name">{$LNG.premium_10}</div>
	{if $gametoorTime != 0}<div class="prem-box-time c-903">{pretty_time($gametoorTime)} </div>{/if}
	</div>
		{foreach $Bonuses as $ID => $Bonus}{if $Bonus.type == 3}
							<div id="bdm{$Bonus.orderCol}" class="prem-box i-p-dm-{$Bonus.orderCol}" onClick="OpenPrem('dm{$Bonus.orderCol}');">
	<div class="prem-box-name">{$Bonus.name}</div>
</div>{/if}{/foreach}
							
						<div class="clear"></div>
		</div>
		
		<div id="b-res" class="prem-container-box">
			<div class="build-type">
				{$LNG.market_2}			
			</div>
							<div id="bres901" class="prem-box i-p-res-901" onclick="OpenPrem('res901');">
	<div class="prem-box-name">{$LNG.tech.901}</div>
</div>
<div id="bres902" class="prem-box i-p-res-902" onclick="OpenPrem('res902');">
	<div class="prem-box-name">{$LNG.tech.902}</div>
</div>
<div id="bres903" class="prem-box i-p-res-903" onclick="OpenPrem('res903');">
	<div class="prem-box-name">{$LNG.tech.903}</div>
</div>
						<div class="clear"></div>
		</div>
		
	</div>

	<div id="prem-container-bg" class="bg-g-b">
		<div id="prem-container">
		
		
									{foreach $Bonuses as $ID => $Bonus}{if $Bonus.type == 4}<div id="cextra{$Bonus.orderCol}" class="prem-box-content">
	<div class="prem-box-title">
		{$Bonus.name}  
	</div>
	<div class="prem-box-img i-p-extra-{$Bonus.orderCol}"></div>
	
				{$Bonus.bonuses}
	
			
	<form id="pa-extra{$Bonus.orderCol}-0" action="game.php?page=premium" method="post">
		<input name="mode" value="addprem" type="hidden">
		<input name="pack" value="extra" type="hidden">
		<input name="item" value="{$Bonus.orderCol}" type="hidden">
		<input name="days" value="4" type="hidden">
	</form>
	
	<div class="prem-btn prem-btn-0">
		<div class="queue-btn-complete">
			<div class="queue-btn-complete-t">7 {$LNG.premium_4}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c">{$Bonus.priceSeven|number}</div>
			<div class="btn-transp" onclick="Confirm.cost(
					'{$LNG.frame_13}',
					'{$LNG.premium_3} - {$Bonus.name} (7 {$LNG.premium_4})?',
					'{$Bonus.priceSeven}', 
					'$(\'#pa-extra{$Bonus.orderCol}-0\').submit();', 
					931)">
			</div>
		</div>
	</div>
		
	<form id="pa-extra{$Bonus.orderCol}-1" action="game.php?page=premium" method="post">
		<input name="mode" value="addprem" type="hidden">
		<input name="pack" value="extra" type="hidden">
		<input name="item" value="{$Bonus.orderCol}" type="hidden">
		<input name="days" value="5" type="hidden">
	</form>
	<div class="prem-btn prem-btn-1">
		<div class="queue-btn-complete">
			<div class="queue-btn-complete-t">14 {$LNG.premium_4}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c">{$Bonus.priceFourteen|number}</div>
			<div class="btn-transp" onclick="Confirm.cost(
					'{$LNG.frame_13}',
					'{$LNG.premium_3} - {$Bonus.name} (14 {$LNG.premium_4})?',
					'{$Bonus.priceFourteen}', 
					'$(\'#pa-extra{$Bonus.orderCol}-1\').submit();', 
					931)">
			</div>
		</div>
	</div>
		</div>{/if}{/foreach}
		
			
									{foreach $Bonuses as $ID => $Bonus}{if $Bonus.type == 1}<div id="cpvp{$Bonus.orderCol}" class="prem-box-content">
	<div class="prem-box-title">
		{$Bonus.name} 
	</div>
	<div class="prem-box-img i-p-pvp-{$Bonus.orderCol}"></div>
	
	<div class="prem-bonus">
				{$Bonus.bonuses}
			</div>	
	
	

			
	<form id="pa-pvp{$Bonus.orderCol}-0" action="game.php?page=premium" method="post">
		<input type="hidden" name="mode" value="addprem">
		<input type="hidden" name="pack" value="pvp">
		<input type="hidden" name="item" value="{$Bonus.orderCol}">
		<input type="hidden" name="days" value="0">
	</form>
	
					
	<div class="prem-btn prem-btn-0">
		<div class="queue-btn-complete">
			<div class="queue-btn-complete-t">1 {$LNG.premium_4}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c">{$Bonus.priceOne}</div>
			<div class="btn-transp"
				onClick="Confirm.cost(
					'{$LNG.frame_13}',
					'{$LNG.premium_3} - {$Bonus.name} (1 {$LNG.premium_4})?',
					'{$Bonus.priceOne}', 
					'$(\'#pa-pvp{$Bonus.orderCol}-0\').submit();', 
					931)">
			</div>
		</div>
	</div>	
			
	<form id="pa-pvp{$Bonus.orderCol}-1" action="game.php?page=premium" method="post">
		<input type="hidden" name="mode" value="addprem">
		<input type="hidden" name="pack" value="pvp">
		<input type="hidden" name="item" value="{$Bonus.orderCol}">
		<input type="hidden" name="days" value="1">
	</form>
	
					
	<div class="prem-btn prem-btn-1">
		<div class="queue-btn-complete">
			<div class="queue-btn-complete-t">3 {$LNG.premium_4}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c">{$Bonus.priceTree}</div>
			<div class="btn-transp"
				onClick="Confirm.cost(
					'{$LNG.frame_13}',
					'{$LNG.premium_3} - {$Bonus.name} (3 {$LNG.premium_4})?',
					'{$Bonus.priceTree}', 
					'$(\'#pa-pvp{$Bonus.orderCol}-1\').submit();', 
					931)">
			</div>
		</div>
	</div>	
			
	<form id="pa-pvp{$Bonus.orderCol}-2" action="game.php?page=premium" method="post">
		<input type="hidden" name="mode" value="addprem">
		<input type="hidden" name="pack" value="pvp">
		<input type="hidden" name="item" value="{$Bonus.orderCol}">
		<input type="hidden" name="days" value="2">
	</form>
	
					
	<div class="prem-btn prem-btn-2">
		<div class="queue-btn-complete">
			<div class="queue-btn-complete-t">9 {$LNG.premium_4}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c">{$Bonus.priceNine}</div>
			<div class="btn-transp"
				onClick="Confirm.cost(
					'{$LNG.frame_13}',
					'{$LNG.premium_3} - {$Bonus.name} (9 {$LNG.premium_4})?',
					'{$Bonus.priceNine}', 
					'$(\'#pa-pvp{$Bonus.orderCol}-2\').submit();', 
					931)">
			</div>
		</div>
	</div>	
			
	<form id="pa-pvp{$Bonus.orderCol}-3" action="game.php?page=premium" method="post">
		<input type="hidden" name="mode" value="addprem">
		<input type="hidden" name="pack" value="pvp">
		<input type="hidden" name="item" value="{$Bonus.orderCol}">
		<input type="hidden" name="days" value="3">
	</form>
	
					
	<div class="prem-btn prem-btn-3">
		<div class="queue-btn-complete">
			<div class="queue-btn-complete-t">27 {$LNG.premium_4}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c">{$Bonus.priceTwentySev}</div>
			<div class="btn-transp"
				onClick="Confirm.cost(
					'{$LNG.frame_13}',
					'{$LNG.premium_3} - {$Bonus.name} (27 {$LNG.premium_4})?',
					'{$Bonus.priceTwentySev}', 
					'$(\'#pa-pvp{$Bonus.orderCol}-3\').submit();', 
					931)">
			</div>
		</div>
	</div>	
	
</div>{/if}{/foreach}

												{foreach $Bonuses as $ID => $Bonus}{if $Bonus.type == 2}<div id="cpve{$Bonus.orderCol}" class="prem-box-content">
	<div class="prem-box-title">
		{$Bonus.name}
	</div>
	<div class="prem-box-img i-p-pve-{$Bonus.orderCol}"></div>
	
	<div class="prem-bonus">
				{$Bonus.bonuses}
			</div>	
	
	

			
	<form id="pa-pve{$Bonus.orderCol}-0" action="game.php?page=premium" method="post">
		<input type="hidden" name="mode" value="addprem">
		<input type="hidden" name="pack" value="pve">
		<input type="hidden" name="item" value="{$Bonus.orderCol}">
		<input type="hidden" name="days" value="0">
	</form>
	
					
	<div class="prem-btn prem-btn-0">
		<div class="queue-btn-complete">
			<div class="queue-btn-complete-t">1 {$LNG.premium_4}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c">{$Bonus.priceOne}</div>
			<div class="btn-transp"
				onClick="Confirm.cost(
					'{$LNG.frame_13}',
					'{$LNG.premium_3} - {$Bonus.name} (1 {$LNG.premium_4})?',
					'{$Bonus.priceOne}', 
					'$(\'#pa-pve{$Bonus.orderCol}-0\').submit();', 
					931)">
			</div>
		</div>
	</div>	
			
	<form id="pa-pve{$Bonus.orderCol}-1" action="game.php?page=premium" method="post">
		<input type="hidden" name="mode" value="addprem">
		<input type="hidden" name="pack" value="pve">
		<input type="hidden" name="item" value="{$Bonus.orderCol}">
		<input type="hidden" name="days" value="1">
	</form>
	
					
	<div class="prem-btn prem-btn-1">
		<div class="queue-btn-complete">
			<div class="queue-btn-complete-t">3 {$LNG.premium_4}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c">{$Bonus.priceTree}</div>
			<div class="btn-transp"
				onClick="Confirm.cost(
					'{$LNG.frame_13}',
					'{$LNG.premium_3} - {$Bonus.name} (3 {$LNG.premium_4})?',
					'{$Bonus.priceTree}', 
					'$(\'#pa-pve{$Bonus.orderCol}-1\').submit();', 
					931)">
			</div>
		</div>
	</div>	
			
	<form id="pa-pve{$Bonus.orderCol}-2" action="game.php?page=premium" method="post">
		<input type="hidden" name="mode" value="addprem">
		<input type="hidden" name="pack" value="pve">
		<input type="hidden" name="item" value="{$Bonus.orderCol}">
		<input type="hidden" name="days" value="2">
	</form>
	
					
	<div class="prem-btn prem-btn-2">
		<div class="queue-btn-complete">
			<div class="queue-btn-complete-t">9 {$LNG.premium_4}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c">{$Bonus.priceNine}</div>
			<div class="btn-transp"
				onClick="Confirm.cost(
					'{$LNG.frame_13}',
					'{$LNG.premium_3} - {$Bonus.name} (9 {$LNG.premium_4})?',
					'{$Bonus.priceNine}', 
					'$(\'#pa-pve{$Bonus.orderCol}-2\').submit();', 
					931)">
			</div>
		</div>
	</div>	
			
	<form id="pa-pve{$Bonus.orderCol}-3" action="game.php?page=premium" method="post">
		<input type="hidden" name="mode" value="addprem">
		<input type="hidden" name="pack" value="pve">
		<input type="hidden" name="item" value="{$Bonus.orderCol}">
		<input type="hidden" name="days" value="3">
	</form>
	
					
	<div class="prem-btn prem-btn-3">
		<div class="queue-btn-complete">
			<div class="queue-btn-complete-t">27 {$LNG.premium_4}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c">{$Bonus.priceTwentySev}</div>
			<div class="btn-transp"
				onClick="Confirm.cost(
					'{$LNG.frame_13}',
					'{$LNG.premium_3} - {$Bonus.name} (27 {$LNG.premium_4})?',
					'{$Bonus.priceTwentySev}', 
					'$(\'#pa-pve{$Bonus.orderCol}-3\').submit();', 
					931)">
			</div>
		</div>
	</div>	
	
</div>{/if}{/foreach}

					<div id="cdmv" class="prem-box-content">
	<div class="prem-box-title">
		{$LNG.premium_10} 
	</div>
	<div class="prem-box-img i-p-dm-v"></div>
	
	<div class="prem-bonus">
		<div class="prem-bonus-text">&nbsp;</div>
		<div class="prem-bonus-text">&nbsp;</div>
		<div class="prem-bonus-text">
			+25  {$LNG.tech.921}
		</div>
	</div>
	
		<div class="prem-btn prem-btn-0">
				{if $gametoorTime != 0}<div class="btn">{pretty_time($gametoorTime)} </div>{else}
				<div class="btn btn-primary">
			{$LNG.premium_11}			
			<div class="btn-transp" href="http://gametoor.com/in/2635" onclick="parent.Frame.IFrame.close(); window.open('http://gametoor.com/in/2635/{$userID}', 'topwindow');"></div>
		</div>{/if}
			</div>
		

</div>	
					{foreach $Bonuses as $ID => $Bonus}{if $Bonus.type == 3}<div id="cdm{$Bonus.orderCol}" class="prem-box-content">
	<div class="prem-box-title">
		{$Bonus.name} 
	</div>
	<div class="prem-box-img i-p-dm-{$Bonus.orderCol}"></div>
	
	<div class="prem-bonus">
		<div class="prem-bonus-text">&nbsp;</div>
		<div class="prem-bonus-text">&nbsp;</div>
		<div class="prem-bonus-text">
			{$Bonus.bonuses}
		</div>
	</div>
	
	<form id="buydm{$Bonus.orderCol}" action="game.php?page=premium" method="post">
		<input type="hidden" name="mode" value="buydm">
		<input type="hidden" name="item" value="{$Bonus.orderCol}">
	</form>
		
	<div class="prem-btn prem-btn-0"> 
		<div class="queue-btn-complete">
			<div class="queue-btn-complete-t">{$LNG.premium_3}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c">{$Bonus.priceOne}</div>
			<div class="btn-transp"
				onClick="Confirm.cost(
					'{$LNG.frame_13}',
					'{$LNG.premium_3} <br /> {$Bonus.bonuses}?',
					'{$Bonus.priceOne}', 
					'$(\'#buydm{$Bonus.orderCol}\').submit();', 
					931)">
			</div>
		</div>
	</div>	

</div>{/if}{/foreach}

{foreach $Bonuses as $ID => $Bonus}{if $Bonus.type == 5}<div id="cres{$Bonus.orderCol}" class="prem-box-content">

	<div class="prem-box-img i-p-res-{$Bonus.orderCol}"></div>
	
	<div class="prem-bonus">
		<div class="prem-bonus-text">&nbsp;</div>
		<div class="prem-bonus-text">&nbsp;</div>
		
		<div class="prem-bonus-text">
			<form id="buyres{$Bonus.orderCol}" action="game.php?page=premium" method="post">
				<input name="mode" value="buyres" type="hidden">
				<input name="item" value="{$Bonus.orderCol}" type="hidden">
				<div class="fl-res-row">
					<div class="fl-res-ico ri i-{$Bonus.orderCol}"></div>
					<div id="countres{$Bonus.orderCol}" class="fl-fleet-row-input fl-res-input c-{$Bonus.orderCol}">{$Bonus.resValue|number}</div>
				</div>
				<div class="fl-res-row">
					<div onclick="$('#cam{$Bonus.orderCol}').val(1); $('#countres{$Bonus.orderCol}').text('{$Bonus.resValue|number}');" class="fl-fleet-row-input-min">Min</div>
					<div onclick="$('#cam{$Bonus.orderCol}').val({$antimatter}); $('#countres{$Bonus.orderCol}').text(NumberGetHumanReadable({$antimatter}*{$Bonus.resValue}));" class="fl-fleet-row-input-max">Max</div>
					<div class="fl-res-ico ri i-931"></div>                                  
					<input id="cam{$Bonus.orderCol}" name="count" value="1" min="1" max="{$antimatter}" class="fl-fleet-row-input fl-res-input input-text c-931" onkeyup="$('#countres{$Bonus.orderCol}').text(NumberGetHumanReadable($(this).val()*{$Bonus.resValue}));" onchange="$('#countres{$Bonus.orderCol}').text(NumberGetHumanReadable($(this).val()*{$Bonus.resValue}));" type="number">
				</div>
			</form>
		</div>
	</div>
		
	<div class="prem-btn prem-btn-0">		
		<div class="btn btn-primary" onclick="Confirm.action(
				'{$LNG.frame_13}',
				'{$LNG.premExp.$ID}',
				'{$LNG.op_dst_mode_sel.1}',
				'{$LNG.buildings_6}',
				'$(\'#buyres{$Bonus.orderCol}\').submit();')">
				{$LNG.premium_3} {$LNG.tech.{$Bonus.orderCol}}
		</div>
	</div>
</div>{/if}{/foreach}
									

			
		</div>
	</div>
</div>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/premium.js?{$REV}"></script>
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html(
		'<div class="title-text">'
			+'{$LNG.frame_13}'
        +'</div>'		
		+'<div class="title-tabs">'
			+'<div id="tab-boost" class="title-tab" onClick="window.iframe.OpenTab(\'boost\');">{$LNG.premium_9}</div>'
			+'<div id="tab-dm" class="title-tab" onClick="window.iframe.OpenTab(\'dm\');">{$LNG.market_2}</div>'
				+'</div>'
	);
</script>

{/block}