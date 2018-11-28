{block name="title" prepend}{$LNG.lm_chat}{/block}
{block name="content"}
<div id="tooltip" class="tip"></div>
    	<div id="body"><div id="popup_conteirer">
	<div id="content">
<div id="chat" name="chat_form" class="conteiner" style="overflow:hidden; width:550px;">
	<div class="gray_stripe">
		{$LNG.chat_msg19}			</div>
	<div class="conteiner">
					<form action="game.php?page=chat&mode=rooms" method="POST">
				<input name="action" value="create" type="hidden">
				<table style="width:100%; max-width:100%;">
	                <tr>
                    	<td style="width:300px;">{$LNG.chat_msg20}:</td>
                        <td><input name="name" value="" type="text" style="width:165px;"></td>
					</tr>
					<tr>
                    	<td>{$LNG.chat_msg21}</td>
                        <td><input name="pass" value="" type="password" style="width:165px;"></td>
                    </tr>
                    <tr>
                    	<td>{$LNG.chat_msg22}</td>
                        <td><input name="pass2" value="" type="password" style="width:165px;"></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><input class="cursor" value="{$LNG.chat_msg23}" type="submit" style="width:100px;"></td>
                    </tr>
                </table>
			</form>
					</div>
	</div>
</div>
</div>
            <div class="clear"></div>            
        </div><!--/body-->
{/block} 