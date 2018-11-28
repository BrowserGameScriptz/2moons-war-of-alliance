{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">
<div class="title-tabs">
	
	<div class="title-tab {if $timeSelect == 1}title-tab-active{/if}" onclick="location = 'game.php?page=alliance&mode=storage&action=log&time=1';">{$LNG.alliance_16}</div>
	<div class="title-tab {if $timeSelect == 2}title-tab-active{/if}" onClick="location = 'game.php?page=alliance&mode=storage&action=log&time=2';">{$LNG.alliance_17}</div>
	<div class="title-tab {if $timeSelect == 3}title-tab-active{/if}" onClick="location = 'game.php?page=alliance&mode=storage&action=log&time=3';">{$LNG.alliance_18}</div>
</div>
</div>
</div>
<div id="popup">
	
<div class="full-scroll">
	<div class="al-block-content">
		<div class="al-block al-block-one bg-g-b">
						
			{foreach $Userlist as $playerId => $logs}<div class="al-block-content">
            	<div class="al-card-option al-log-res" style="padding-left:0;">
                	{$logs.depositPlayer}
                </div>
								<div class="al-card-option c-901 al-log-res tooltip" data-tooltip-content="{$LNG.tech.901}">
					<div class="al-card-option-ico ri i-901"></div> 
					{$logs.depositMetal|number}
				</div>
								<div class="al-card-option c-902 al-log-res tooltip" data-tooltip-content="{$LNG.tech.902}">
					<div class="al-card-option-ico ri i-902"></div>
					{$logs.depositCrystal|number}
				</div>
								<div class="al-card-option c-903 al-log-res tooltip" data-tooltip-content="{$LNG.tech.903}">
					<div class="al-card-option-ico ri i-903"></div>
					{$logs.depositDeuteirum|number}
				</div>
								<div class="al-card-option c-941 al-log-res tooltip" data-tooltip-content="{$LNG.tech.941}">
					<div class="al-card-option-ico ri i-941"></div>
					{$logs.depositResearch|number}
				</div>
								<div class="al-card-option c-921 al-log-res tooltip" data-tooltip-content="{$LNG.tech.921}">
					<div class="al-card-option-ico ri i-921"></div>
					{$logs.depositDarkmatter|number}
				</div>
								<div class="al-card-option c-942 al-log-res tooltip" data-tooltip-content="{$LNG.tech.942}">
					<div class="al-card-option-ico ri i-942"></div>
					{$logs.depositStellar|number}
				</div>
								<div class="clear"></div>
			</div>{/foreach}
			
					</div>
	</div>
</div>

</div>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/alliance.js?0020"></script>
{/block}