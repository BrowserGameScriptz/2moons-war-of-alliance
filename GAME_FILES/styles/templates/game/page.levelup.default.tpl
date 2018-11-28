{block name="title" prepend}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text"></div>
</div>
<div id="popup">
	
<div class="foll-scroll">
	<div class="bn-lup-bg i-level-up">
		<div class="bn-lup-title">{$LNG.commander_1}</div>
		<div class="bn-lup-level c-921">{$newLevelReached|number}</div>
	</div>
	
	<div class="bn-awards-title c-smoke">{$LNG.commander_2}</div>
	<div class="bn-awards-content">
		{foreach $templateAr as $elementId => $count}<div class="msg-res-row c-{$elementId} tooltip" data-tooltip-content="{$LNG.tech.{$elementId}}"><div class="msg-res-row-i ri i-{if $elementId < 500}u{/if}{$elementId}"></div>{$count|number}</div>{/foreach}
	</div>
</div>
<script type="text/javascript">
$(function() 
{	
	$('.title-nav:first').hide();
	$('#popup').css('top',0);
});
</script>

</div>

{/block}
{block name="script" append}

{/block}