{block name="title" prepend}{$LNG.lm_research}{/block}
{block name="content"}
<div id="build_content">	
	{if !empty($Queue)}
	<div id="queue-research">														
		<div id="time" class="queue-time" data-time="{$Queue.time}"></div>
		<div class="timer" data-time="{$Queue.endtime}"></div>
		<div id="progressbar" class="queue-p" data-time="{$Queue.resttime}"></div>

		<form id="fc" action="game.php?page=research" method="post">
			<input type="hidden" name="cmd" value="complete">
			<input type="hidden" name="tech" value="{$TechQueueId}">
		</form>
		<form id="fr" action="game.php?page=research" method="post">			
			<input type="hidden" name="cmd" value="cancel">
			<input type="hidden" name="tech" value="{$TechQueueId}">
		</form>
	</div>
	{/if}
	<div class="conteiner"> 	
				 
		<div id="tech-elements">
			<div id="tech-container-box">
									{foreach $ResearchList as $ID => $Element}
									<div id="b{$ID}" class="tech-box tbt-{$Element.arbrePositionSec} tbl-{$Element.arbrePosition} i-u{$ID}{if !$Element.techacc}g{elseif $Element.level == $Element.maxLevel}b{/if} tooltip " 
	onClick="OpenTech({$ID});"	data-tooltip-content="
		<div class='tip-title'>{$LNG.tech.{$ID}}</a>{if $Element.level != 0} ({$LNG.bd_lvl} {$Element.level}{if $Element.maxLevel != 255}/{$Element.maxLevel}{/if}){/if}</div>
		<div class='tip-text'>
					<div class='tip-bonus'>{$Element.shortTipsOne}</div>
				</div>
	">
			<div class="tech-box-level">{if $Element.level != 0}{$Element.level}{/if}</div>
			{if $TechQueueId == $ID}<div class="queue-p" style="width: 0%;"></div>
			<div class="tech-queue"></div>{/if}
	</div>{/foreach}
									
							</div>
			<!--row-1-->
			<div class="tech-row trt-1">
				<div class="ts-left tbl-4"></div>
				<div class="ts-h tshl-4 tshw-8"></div>
				<div class="ts-three tbl-12"></div>
				<div class="ts-h tshl-12 tshw-6"></div>
				<div class="ts-right tbl-18"></div>
			</div>
			<!--row-2-->
			<div class="tech-row trt-2">
				<div class="ts-left tbl-2"></div>
				<div class="ts-h tshl-2 tshw-2"></div>
				<div class="ts-two tbl-4"></div>
				<div class="ts-h tshl-4 tshw-2"></div>
				<div class="ts-right tbl-6"></div>
				
				<div class="ts-left tbl-11"></div>
				<div class="ts-h tshl-11 tshw-1"></div>
				<div class="ts-two tbl-12"></div>
				<div class="ts-h tshl-12 tshw-1"></div>
				<div class="ts-right tbl-13"></div>
				
				<div class="ts-left tbl-17"></div>
				<div class="ts-h tshl-17 tshw-1"></div>
				<div class="ts-two tbl-18"></div>
				<div class="ts-h tshl-18 tshw-1"></div>
				<div class="ts-right tbl-19"></div>				
			</div>
			<!--row-3-->
			<div class="tech-row trt-3">
				<div class="ts-one tbl-2"></div>
				
				<div class="ts-left tbl-5"></div>
				<div class="ts-h tshl-5 tshw-1"></div>
				<div class="ts-two tbl-6"></div>
				<div class="ts-h tshl-6 tshw-1"></div>
				<div class="ts-right tbl-7"></div>
				
				<div class="ts-one tbl-11"></div>
				<div class="ts-one tbl-13"></div>
				<div class="ts-one tbl-17"></div>
				<div class="ts-one tbl-19"></div>
			</div>			
			<!--row-4-->
			<div class="tech-row trt-4">
				<div class="ts-one tbl-2"></div>
								
				<div class="ts-one tbl-5"></div>
				<div class="ts-one tbl-7"></div>				
				<div class="ts-one tbl-11"></div>
				<div class="ts-one tbl-13"></div>
				<div class="ts-one tbl-17"></div>
				<div class="ts-one tbl-19"></div>
			</div>
			<!--row-5-->
			<div class="tech-row trt-5">
				<div class="ts-one tbl-5"></div>
				<div class="ts-one tbl-7"></div>				
				<div class="ts-one tbl-11"></div>
				<div class="ts-one tbl-13"></div>
				<div class="ts-one tbl-17"></div>
				<div class="ts-one tbl-19"></div>
			</div>			
			<!--row-6-->
			<div class="tech-row trt-6">
				<div class="ts-one tbl-7"></div>				
				<div class="ts-one tbl-11"></div>
				<div class="ts-one tbl-13"></div>
				<div class="ts-one tbl-17"></div>
				<div class="ts-one tbl-19"></div>
			</div>
			<!--row-7-->
			<div class="tech-row trt-7">
				<div class="ts-one tbl-17"></div>
				<div class="ts-one tbl-19"></div>
			</div>
		</div>
    </div>
	
	<div id="tech-container-bg" class="bg-g-b">
		<div id="tech-container">
								{foreach $ResearchList as $ID => $Element}<div id="c{$ID}" class="tech-box-content">
	<div class="tech-box-title">
		<div class="tech-i i-i ri bga-i" onclick="return parent.Dialog.info({$ID})"></div>  
		{$LNG.tech.{$ID}}	
	</div>
	<div class="tech-box-img i-u{$ID}b"></div>
	<div class="tech-box-level-big"></div>
	<div class="tech-prices">
		<div class="tech-price">			  
			<div class="tech-price-ico ri i-level i-000"></div>
			<div class="tech-price-text">{$Element.levelToBuild} / {$Element.maxLevel}</div>                              
		</div>
		
		{foreach $Element.costResources as $RessID => $RessAmount}
		<div class="tech-price">			  
			<div class="tech-price-ico ri i-{$RessID}"></div>
			<div class="tech-price-text">{$RessAmount|number}</div>                              
		</div>
		{/foreach}
		<div class="tech-price">			  
			<div class="tech-price-ico ri i-time"></div>
			<div class="tech-price-text" id="t{$ID}">{$Element.elementTime|time} </div>                              
		</div>		
	</div>
		<!-- tech-btn -->
		{if !$Element.techacc}
		{elseif $Element.maxLevel == $Element.levelToBuild}
		<div class="tech-btn">
			<div class="btn btn-danger">{$LNG.bd_maxlevel}</div>
		</div>
		{elseif !empty($Queue) && $TechQueueId == $ID}
		<div class="tech-btn">
			<div class="queue-p" style="width: 7.77454%;"></div>
			<div class="queue-btn-complete">
				<div class="queue-btn-complete-t">{$LNG.frame_26}</div>
				<div class="queue-btn-complete-i i-921 ri"></div>
				<div class="queue-btn-complete-c">{$Queue.dmPrice|number}</div>
				<div class="btn-transp" onclick="Confirm.cost(
						'{$LNG.buildings_3}',
						'{$LNG.research_4} <br /> {$LNG.tech.{$TechQueueId}} ({$Queue.level})?',
						'{$Queue.dmPrice}', 
						'$(\'#fc\').submit();', 
						921)">
				</div>
			</div>
		</div>
		{elseif !empty($Queue) && $TechQueueId != $ID}
		<div class="tech-btn" onclick="Confirm.action(
			'{$LNG.frame_28}',
			'{$LNG.research_5} <br /> {$LNG.tech.{$TechQueueId}} ({$Queue.level})?',
			'{$LNG.buildings_5}',
			'{$LNG.buildings_6}',
			'$(\'#fr\').find(\'[name=tech]\').val({$ID});$(\'#fr\').submit();')">
			<div class="btn btn-danger">{$LNG.research_3}</div>
		</div>
		{elseif $IsLabinBuild || $IsFullQueue}
		<div class="tech-btn">
			<div class="btn btn-danger">{if $Element.level == 0}{$LNG.bd_tech}{else}{$LNG.bd_tech_next_level}{$Element.levelToBuild + 1}{/if}</div>
		</div>
		{else}
		<div class="tech-btn">
			<form action="game.php?page=research" method="post">
				<input type="hidden" name="cmd" value="insert">
				<input type="hidden" name="tech" value="{$ID}">
				<button class="btn btn-primary" type="submit">{if $Element.level == 0}{$LNG.bd_tech}{else}{$LNG.bd_tech_next_level}{$Element.levelToBuild + 1}{/if}</button>                                
			</form>
		</div>
		{/if}
		
		<!-- /tech-btn -->
	<div class="tech-bonus">
		<div class="tech-bonus-title">
			{$LNG.research_1}
		</div>
				<div class="tech-bonus-text">
			{$Element.shortTipsDos}
		</div>
			</div>
			

	<div class="tech-required-block">
		{if !$Element.techacc}
		<div class="tech-bonus-title">
			{$LNG.buildings_1}
		</div>
		{foreach $Element.AllTech as $elementID => $requireList}		
		{foreach $requireList as $requireID => $NeedLevel}
		{if $NeedLevel.count > $NeedLevel.own}
		<div class="tech-required-box i-u{$requireID} tooltip" onclick="parent.Dialog.info({$requireID})" data-tooltip-content="{$LNG.bd_research}:<br /> {$LNG.tech.{$requireID}} lvl. {$NeedLevel.count}"><div class="tech-required-box-level">{$NeedLevel.count}</div></div>
		{/if}
		{/foreach}
		{/foreach}
		{elseif !empty($Element.unlockIds)}
		<div class="tech-bonus-title">
			{$LNG.research_2}
		</div>
		{foreach $Element.unlockIds as $unlockId}<div class="tech-required-box i-u{$unlockId} tooltip" data-tooltip-content="{$LNG.tech.$unlockId}"></div>{/foreach}
		{/if}
	</div>
	</div>{/foreach}
													
							</div>
	</div>
</div><!--/build-->

<script type="text/javascript">
	ResearchQueue	= {$Queue|json};
	aTech			= {$TechQueueId1};
	
	parent.Frame.IFrame.N[1].html(
		'<div class="title-text">'
			+'{$LNG.pl_tech}'
        +'</div>'
		+'<div class="title-res">'
			+'<div class="title-res-ico ri i-941"></div>'
			+'{$researchRes|number}'
        +'</div>'
	);
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/research.js?{$REV}"></script>
{/block}