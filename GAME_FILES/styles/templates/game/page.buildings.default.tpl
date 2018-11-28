{block name="title" prepend}{$LNG.lm_buildings}{/block}
{block name="content"}
<div id="build-content" class="full-scroll">
{if !empty($Queue)}
<div id="queue-build" class="queue-box">
		{foreach $Queue as $List}
		{$ID = $List.element}
		{if $List@first}											
				<div class="queue-block queue-block-big{if $List.destroy} queue-block-d{/if}">
							
					<div id="time" class="queue-time" data-time="{$List.time}" style="display: block;"></div>
					<div class="queue-btn-complete timer" data-time="{$List.endtime1}" style="display: block;">
						<div class="queue-btn-complete-t">{$LNG.frame_26}</div>
						<div class="queue-btn-complete-i i-921 ri"></div>
						<div class="queue-btn-complete-c">{$List.DMprice|number}</div>
						<form id="fc1" action="game.php?page=buildings" method="post">
							<input type="hidden" name="cmd" value="complete">
							<input type="hidden" name="listid" value="{$List@iteration}">
							<input type="hidden" name="building" value="{$List.element}">
							<input type="hidden" name="level" value="{$List.level}">
						</form>
						<div class="btn-transp"
							onClick="Confirm.cost(
								'{$LNG.frame_24}', 									
																'{if !$List.destroy}{$LNG.buildings_7}{else}{$LNG.buildings_12}{/if} <br /> {$LNG.tech.{$List.element}} ({$List.level})?',
																'{$List.DMprice|number}', 
								'PostBuild({$List.element},\'complete\',{$List@iteration}, {$List.level});', 
								921)">
						</div>
					</div>
					
					<div id="progressbar" class="queue-p" data-time="{$List.resttime}"></div>
						
					<div class="queue-block" style="display: block;">
						<div class="queue-img i-u{$List.element} tooltip" data-tooltip-content="{$LNG.tech.{$List.element}}"></div>
						<div class="queue-level">{$List.level}</div>
				
						{if $List.destroy}<div class="queue-destroy ri i-down tooltip" data-tooltip-content="{$LNG.buildings_10}"></div>{/if}
						
						<div class="queue-cancel ri i-x bga-x"
							onClick="Confirm.action(
								'{$LNG.frame_24}', 									
																'{if !$List.destroy}{$LNG.buildings_8}{else}{$LNG.buildings_11}{/if} <br /> {$LNG.tech.{$List.element}} ({$List.level})?',
																'{$LNG.buildings_5}',
								'{$LNG.buildings_6}',
								'PostBuild({$List.element},\'cancel\',{$List@iteration},{$List.level});')">
						</div>
					</div>
					
				</div>
				{else}		
																	<div class="queue-block{if $List.destroy} queue-block-d{/if}" style="display: block;">
					<div class="queue-img i-u{$List.element} tooltip" data-tooltip-content="{$LNG.tech.{$List.element}}"></div>
					<div class="queue-level">{$List.level}</div>
					
					<div class="queue-cancel ri i-x bga-x"
						onClick="Confirm.action(
							'{$LNG.frame_24}', 									
														'{if !$List.destroy}{$LNG.buildings_8}{else}{$LNG.buildings_11}{/if} <br /> {$LNG.tech.{$List.element}} ({$List.level})?',
														'{$LNG.buildings_5}',
							'{$LNG.buildings_6}',
							'PostBuild({$List.element},\'remove\',{$List@iteration},{$List.level});')">
					</div>
									</div>					{/if}	{/foreach}				
							</div>
		 {/if}
	<div id="build-elements">

			{foreach $BuildInfoList as $ID => $Element}
			<div id="build_{$ID}" class="build-box{if !$Element.techacc} build-box-required{/if}">

	<div class="build-head">
		<div class="build-i i-i ri bga-i" onclick="return parent.Dialog.info({$ID})"></div>           
		<div onclick="return parent.Dialog.info({$ID})" class="build-title">
			{$LNG.tech.{$ID}} {if $Element.level > 0} ({$LNG.bd_lvl} {$Element.level}{if $Element.maxLevel != 255}/{$Element.maxLevel}{/if}){/if}		</div>
	</div>
	
		<div class="build-content-box">
		<div class="build-img i-u{$ID}"></div>
		 {if $Element.techacc}
		<div class="build-prices">
						{foreach $Element.costResources as $RessID => $RessAmount}
						<div class="build-price">
				<div class="build-price-ico ri i-{$RessID}"></div>
				<div class="build-price-text">
					<span class="c-{if $Element.costOverflow[$RessID] == 0}{$RessID}{else}red{/if}">{$RessAmount|number}</span>
				</div>
			</div>
			{/foreach}			
			<div class="build-price build-time">
				<div class="build-price-ico ri i-time"></div>
				<div class="build-price-text">{$Element.elementTime|time} </div>
			</div>		
		</div>
		{else}
		<div class="build-prices">
			<div class="build-price">
				{$LNG.buildings_1}:
			</div>

			{foreach $Element.AllTech as $elementID => $requireList}
									{foreach $requireList as $requireID => $NeedLevel}
									{if $NeedLevel.count > $NeedLevel.own}
									<div class="build-required tooltip" onclick="parent.Dialog.info({$requireID})" data-tooltip-content="
				{if $requireID < 100}{$LNG.bd_build}{elseif $requireID < 200}{$LNG.bd_tech}{else}{$LNG.bd_build}{/if}:<br /> {$LNG.tech.{$requireID}} lvl.  {$NeedLevel.count}
			">
				<div class="build-required-img i-u{$requireID}"></div>
				<div class="build-required-level">{$NeedLevel.count}</div>			
			</div>
			{/if}
			{/foreach}
			{/foreach}						
									
		</div>
		{/if}
				{if !empty($Element.infoEnergy)}
				<div class="build-price build-energy">			  
			<div class="build-price-ico ri i-911"></div>
			<div class="build-price-text">{$Element.infoEnergy}</div>                              
		</div>
		{/if}		
				
		{if $Element.level != 0}<div class="build-break bga-br ri i-down tooltip" data-tooltip-content="{$LNG.bd_dismantle}" 
			onClick="Confirm.action(
				'{$LNG.frame_24}', 
				'{$LNG.buildings_9} <br /> {$LNG.tech.{$ID}} ({$Element.level})?', 
				'{$LNG.buildings_10}',
				'{$LNG.buildings_6}',
				'PostBuild({$ID},\'destroy\',0,{$Element.level})');">
		</div>{/if}
		
	</div><!--/build-content-box-->
	
	<div class="build-btn-box">
				{if !$Element.techacc}
				{elseif $Element.maxLevel == $Element.levelToBuild}
					<div class="btn btn-danger">{$LNG.bd_maxlevel}</div>
				{elseif ($isBusy.research && ($ID == 6 || $ID == 31)) || ($isBusy.shipyard && ($ID == 15 || $ID == 21))}
					<div class="btn btn-danger">{$LNG.bd_working}</div>
				{else}
					{if $RoomIsOk}
						{if $CanBuildElement && $Element.buyable}
							<div onClick="PostBuild({$ID},'insert',0,{$Element.level+1});" class="btn btn-primary" type="submit">
								{if $Element.level == 0}{$LNG.bd_build}{else}{$LNG.bd_build_next_level}{$Element.levelToBuild + 1}{/if}			
							</div>
						{else}
							<div class="btn btn-danger">{if $Element.level == 0}{$LNG.bd_build}{else}{$LNG.bd_build_next_level}{$Element.levelToBuild + 1}{/if}</div>
						{/if}
					{else}
						<div class="btn btn-danger">{$LNG.bd_no_more_fields}</div>
					{/if}
				{/if}

										</div><!--/build-btn-->
	
	</div>
	{/foreach}	
		</div>
	 
</div><!--/build-->

<script type="text/javascript">
	DatatList		= {
	{foreach $BuildInfoList as $ID => $Element}
	"{$ID}":{ "level":"{$Element.level}","maxLevel":"{$Element.maxLevel}","factor":"{$Element.factor}","infoEnergy":'{$Element.infoEnergy}',"costRessources":{ {foreach $Element.costResources as $RessID => $RessAmount}"{$RessID}":{$RessAmount}{if !$RessAmount@last},{/if}{/foreach} },"costOverflow":{ {foreach $Element.costOverflow as $RessID => $RessAmount}"{$RessID}":{$RessAmount}{if !$RessAmount@last},{/if}{/foreach} },"elementTime":{$Element.elementTime},"destroyFlag":{$Element.destroyFlag},"destroyRessources":{ {foreach $Element.destroyResources as $RessID => $RessAmount}"{$RessID}":{$RessAmount}{if !$RessAmount@last},{/if}{/foreach} },"destroyTime":{$Element.destroyTime},"buyable":{$Element.buyable1} }{if !$Element@last},{/if}
	{/foreach}
	};
	bd_operating	= '({$LNG.bd_working})';
	LNGning			= '{$LNG.buildings_2}:';
	
	parent.Frame.IFrame.N[1].html(
		'<div class="title-text">'
			+'{$LNG.buildings_3}: '			
        	+'<span class="f-f-a">{$msgBuild}</span>'
        +'</div>'
		+'<div class="title-res tooltip" data-tooltip-content="{$LNG.planetar_8}">'
			+'<div class="title-res-ico ri i-qb bga-0"></div>{$constructionBonus}%'
		+'</div>'
		+'<div class="title-res c-903 tooltip" data-tooltip-content="{$LNG.tech.3}">'
			+'<div class="title-res-ico ri i-u3"></div>{$deuteriumBonus}%'
		+'</div>'
		+'<div class="title-res c-911 tooltip" data-tooltip-content="{$LNG.tech.212}">'
			+'<div class="title-res-ico ri i-u212"></div>{$solarBonus}%'
		+'</div>'
	);
	parent.setTooltip(parent.Frame.IFrame.N[1]);
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/buildlist.js?{$REV}"></script>
{/block}