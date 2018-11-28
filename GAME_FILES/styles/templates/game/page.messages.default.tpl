{block name="title" prepend}{$LNG.lm_messages}{/block}
{block name="content"}
<div id="ms-message">
	<div id="ms-side-left" class="bg-g-b">
		
		{foreach $CategoryList as $CategoryID => $CategoryRow}
			{if $CategoryID == 50 || $CategoryID == 1 || $CategoryID == 2 || $CategoryID == 999 || $CategoryID == 100 || $CategoryID == 199}
				<div class="ms-side-row btn btn-primary" onclick="Message.getMessages({$CategoryID});">
					{$LNG.mg_type.{$CategoryID}}
					<div id="unread_{$CategoryID}" class="btn-new-count ri bga-red"{if $CategoryRow.unread == 0} style="display:none;"{/if}>{$CategoryRow.unread}</div>
				</div>
				{if $CategoryID == 50 || $CategoryID == 999}<div class="clear">&nbsp;</div>{/if}
			{/if}
		{/foreach}	
		
	</div><!--/.ms-side-left-->
	
	<div id="ms-side-right" class="bg-g-b">
		{foreach $CategoryList as $CategoryID => $CategoryRow}
			{if $CategoryID == 0 || $CategoryID == 3 || $CategoryID == 15 || $CategoryID == 5 || $CategoryID == 4}
				<div class="ms-side-row btn btn-primary" onclick="Message.getMessages({$CategoryID});">
					{$LNG.mg_type.{$CategoryID}}
					<div id="unread_0" class="btn-new-count ri bga-red"{if $CategoryRow.unread == 0} style="display:none;"{/if}>{$CategoryRow.unread}</div>
				</div>
				{if $CategoryID == 5}<div class="clear">&nbsp;</div>{/if}
			{/if}
		{/foreach}	
	</div><!--/.ms-side-right-->
	
	<div id="ms-content">
		
	</div>
</div>
<script type="text/javascript">	
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.mg_message_title}<div>');
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/message.js?{$REV}"></script>
<script type="text/javascript">
	var lng = "{$LNG.planetar_4}";
	var lngsuc = "{$LNG.msgt_5}";
	var ShowCategory = Number(-1);
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.planetar_2}</div>');	
</script>
{/block}