{block name="title" prepend}{$LNG.lm_chat}{/block}
{block name="content"}
<div id="tooltip" class="tip"></div>
    	<div id="body"><div id="popup_conteirer">
	<div id="content">
<div id="chat" name="chat_form" class="conteiner" style="overflow:hidden; width:550px;">
	<div class="gray_stripe">
				{$LNG.chat_msg28}	</div>
	<div class="conteiner">
							<form action="game.php?page=chat&mode=rooms" method="POST">
				<input name="action" value="login" type="hidden">
				<input name="room" value="{$room}" type="hidden">
				{$LNG.chat_msg29}:<br /><br />
                <input name="pass" value="" type="password" style="margin-right:5px;width:165px;"><input class="cursor" value="{$LNG.chat_msg15}" type="submit">
			</form>
			</div>
	</div>
</div>
</div>
            <div class="clear"></div>            
        </div><!--/body-->

{/block} 