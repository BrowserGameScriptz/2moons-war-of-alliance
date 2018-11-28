{block name="title" prepend}{$LNG.ti_create_head} - {$LNG.lm_support}{/block}
{block name="content"}
<div class="al-content">			
		<div class="al-block bg-g-b" style="width:700px;">			
			<form action="game.php?page=ticket&mode=send" method="post" id="form">
				<input type="hidden" name="id" value="0">

				<div class="al-block-title">
    				<label for="category">{$LNG.ti_category}:</label> <select id="category" name="category">{html_options options=$categoryList}</select>
					<label for="subject" style="margin-left:20px;">{$LNG.ti_subject}:</label> <input type="text" id="subject" name="subject" size="40" maxlength="255" />
   				</div>			
				
				<div class="al-block-content">						
					<textarea placeholder="{$LNG.mg_message}" class="ticket_message_send_text" id="message" name="message" row="60" cols="8" style="height:100px; width:99%"></textarea>			
					<div class="f-ta-c f-fs-11 c-smoke">
						&nbsp;<br />
						{$LNG.ti_create_info}<br />
						&nbsp;
					</div>
					<input class="btn btn-primary" type="submit" value="{$LNG.ti_submit}">
				
					<div class="f-ta-c">
						&nbsp;<br />
						<a href="game.php?page=ticket" class="c-smoke">{$LNG.ti_overview}</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
{/block}
{block name="script" append}
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.lm_support}: {$LNG.ti_create_head}</div>');	
</script>{/block}