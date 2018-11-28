{block name="title" prepend}Tutorial{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">{$trainingTitle}</div>
</div>
<div id="popup">
{if in_array($trainingId, array(1001,1002,1003,1004))}
<div class="tg-bg i-tr-bg-{$trainingPoitio}">
</div>

<div class="tg-content">
    <div class="tg-dialog tg-dialog-left">{$trainingDescr}</div>
	<div class="clear"></div>    
    <div class="tg-btn btn btn-primary" onclick="location.href = '?page=training&step={$trainingNextId}'">Продолжить</div>
</div>
<script type="text/javascript">
$(function() 
{	
	$('#popup').css('top',0);
});
</script>
{else}
<div class="tg-content">
    <div class="tg-dialog">{$trainingDescr}</div>
    <div class="tg-task f-f-b f-fs-15">Задача:</div>
	{$trainingMissio}
	
    <div class="clear"></div>
    
    <div class="tg-btn btn btn-primary" onclick="{$trainingActie}">Продолжить</div>
</div>
{/if}
</div>
{/block}
