{block name="title" prepend}{$LNG.lm_fleet}{/block}
{block name="content"}
<div id="senat-content">
		{foreach $officierSena as $ID => $Element}<div id="senat-{$ID}" class="seant-box">
		
		<div class="seant-title">
			{$LNG.tech.{$ID}} {$LNG.of_lvl} {$Element.level}/{$Element.RowSeant.MaxLevel}
		</div>
		
		<div class="seant-img i-s{$ID}"></div>
		
		{if $Element.timeLeft != 0}<div class="seant-time c-903 tooltip" data-tooltip-content="Time Left:">
			<span id="time{$ID}">{$Element.timeLeft|time}</span>
		</div>{/if}
				
		<div class="senat-bonus-next">
				{foreach $Element.RowSeant.bonus as $BonusName => $Bonus}{$Bonus.bonus.{($Element.level)}*$Bonus.gener} <span class="c-941">+{$Bonus.bonus.0*$Bonus.gener}% </span>{$LNG.bonus.$BonusName}<br>{/foreach}
				<span class="c-921">+{$Element.costDMup}</span> {$LNG.tech.921}
				

		</div>		
		
		<div class="senat-btn-up">
		            
			<div class="btn btn-primary btn-text-cost{if $resour800 < $Element.costAP} btn-danger{/if}" id="price{$ID}">
				<div class="btn-text-cost-t">{$LNG.officer_1}</div>
				<div class="btn-text-cost-i i-800 ri"></div>
				<div class="btn-text-cost-c{if $resour800 < $Element.costAP} c-red{/if}">{$Element.costAP|number}</div>
				
				{if $resour800 >= $Element.costAP}<form action="game.php?page=senat" method="post" id="up{$ID}">
					<input type="hidden" name="upid" value="{$ID}" />			
				</form>	
				<div class="btn-transp"
					onClick="Confirm.cost(
						'{$LNG.frame_10}', 									
						'{sprintf({$LNG.officer_2}, {$LNG.tech.{$ID}})}',
						'{$Element.costAP}', 
						'$(\'#up{$ID}\').submit();', 
						800)">
				</div>{/if}
				
			</div>				        	 	
				</div>		
	
				
		<div class="senat-bonus">
							{foreach $Element.RowSeant.bonus as $BonusName => $Bonus}<span class="c-941">+{$Bonus.bonus.{($Element.level)}*$Bonus.gener}% </span>{$LNG.bonus.$BonusName}<br>{/foreach}
					</div>
		<div class="senat-input-day input-text">		
			<form action="game.php?page=senat" method="post" id="r{$ID}">		
				<input type="hidden" name="id" value="{$ID}" />	
				<div class="senat-label-day">{$LNG.officer_3}:</div>
				<input class="senat-input-number" id="days{$ID}" type="number" onChange="senatPrice('{$ID}', {$Element.costDM});" onKeyUp="senatPrice('{$ID}', {$Element.costDM});" name="days" max="365" min="1" value="1" />		
			</form>	
		</div>	
		<div class="senat-btn-recruit">
		   <div class="btn{if $darkmatter >= $Element.costDM} btn-dm{/if} btn-text-cost{if $darkmatter < $Element.costDM} btn-danger{/if}" id="p{$ID}dm">
				<div class="btn-text-cost-t">{$LNG.of_recruit}</div>
				<div class="btn-text-cost-i i-921 ri"></div>
				<div class="btn-text-cost-c {if $darkmatter < $Element.costDM} c-red{/if}" {if $darkmatter >= $Element.costDM} id="cost{$ID}"{/if}>{$Element.costDM|number}</div>			
				{if $darkmatter >= $Element.costDM}<div class="btn-transp"	onClick="senatUp({$ID});"></div>{/if}
			</div>				        	 	
				</div>
				
		<div class="senat-bottom-bg"></div>
	</div>{/foreach}
		
	
</div>
<script type="text/javascript">
	var SenatList 	= {$officierList|json};
	var	SenatArray	= {$officierSena|json};	
	
	var AllRep 		= 21;
	parent.Frame.IFrame.N[1].html(
		'<div class="title-text">{$LNG.frame_10}</div>'
		+'<div class="title-res tooltip" data-tooltip-content="{$LNG.officer_4}">'
			+'<div class="title-res-ico ri i-800"></div>{$resour800Usado|number} / {$resour800|number}'
        +'</div>'
	);
	parent.setTooltip(parent.Frame.IFrame.N[1]);
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/senat.js?{$REV}"></script>
{/block}
