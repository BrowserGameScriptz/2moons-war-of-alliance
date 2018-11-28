{block name="title" prepend}{$LNG.lm_statistics}{/block}
{block name="content"}
<div id="st-contint" class="full-scroll">
    <div class="st-header">
		 {$LNG.statis_1}: <div id="st-out" class="c-902" data-time="{$nextStatUpdate}"></div>
    </div>
	<div class="st-switchs">
				<div class="st-switc-btn float-l i-st-1-1 tooltip {if $type == 1}st-switc-btn-a{/if}" data-tooltip-content="{$LNG.playercar_2}" onclick="goPage(0,1);"></div>
				<div class="st-switc-btn float-l i-st-1-2 tooltip {if $type == 2}st-switc-btn-a{/if}" data-tooltip-content="{$LNG.playercar_1}" onClick="goPage(0,2);"></div>
				<div class="st-switc-btn float-l i-st-1-3 tooltip {if $type == 3}st-switc-btn-a{/if}" data-tooltip-content="{$LNG.st_buildings}" onClick="goPage(0,3);"></div>
				<div class="st-switc-btn float-l i-st-1-4 tooltip {if $type == 4}st-switc-btn-a{/if}" data-tooltip-content="{$LNG.st_defenses}" onClick="goPage(0,4);"></div>
				<div class="st-switc-btn float-l i-st-1-5 tooltip {if $type == 5}st-switc-btn-a{/if}" data-tooltip-content="{$LNG.st_fleets}" onClick="goPage(0,5);"></div>
				<div class="st-switc-btn float-l i-st-1-6 tooltip {if $type == 6}st-switc-btn-a{/if}" data-tooltip-content="{$LNG.frame_7}" onClick="goPage(0,6);"></div>
				<div class="st-switc-btn float-l i-st-1-7 tooltip {if $type == 7}st-switc-btn-a{/if}" data-tooltip-content="{$LNG.st_points}" onClick="goPage(0,7);"></div>
				<select name="range" id="range" class="st-switc-range float-r" onchange="goPage(0,0);">{html_options options=$Selectors.range selected=$range}
</select>
				<div class="st-switc-btn float-r i-st-2-2 tooltip {if $who == 2}st-switc-btn-a{/if}" data-tooltip-content="{$LNG.st_alliance}" onClick="goPage(2,0);"></div>
				<div class="st-switc-btn float-r i-st-2-1 tooltip {if $who == 1}st-switc-btn-a{/if}" data-tooltip-content="{$LNG.st_player}" onClick="goPage(1,0);"></div>
			</div>
	<div class="st-content">
{if $who == 1}
	{include file="shared.statistics.playerTable.tpl"}
{elseif $who == 2}
	{include file="shared.statistics.allianceTable.tpl"}
{/if}
</div>
<script type=text/javascript>
	var who		= {$who};
	var type	= {$type};
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.st_statistics}  &rArr;&nbsp;<span class="f-f-a">({$LNG.st_statistics} {$LNG.st_updated}: {$stat_date})</span></div>');
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/statistics.js?{$REV}"></script>
{/block}