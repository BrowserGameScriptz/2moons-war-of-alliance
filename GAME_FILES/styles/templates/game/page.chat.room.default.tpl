{block name="title" prepend}{$LNG.lm_chat}{/block}
{block name="content"}
<script type="text/javascript">
  var ally_id = "{$ally_id}";
  var lng = { "confirm_exit":"{$LNG.chat_msg4}","confirm_kick":"{$LNG.chat_msg5}","prompt_pass":"{$LNG.chat_msg6}","alert_pass":"{$LNG.chat_msg7}","prompt_pass2":"{$LNG.chat_msg8}","alert_pass2":"{$LNG.chat_msg9}","alert_done":"{$LNG.chat_msg10}" };
</script>
<script type="text/javascript" src="./scripts/chat/room.js"></script>
<script type="text/javascript" src="./scripts/chat/actions.js"></script>
<audio id="beepchat" preload="auto">
	<source src="./sound/beep.mp3"></source>
	<source src="./sound/beep.ogg"></source>
</audio>
<link rel="stylesheet" type="text/css" href="./styles/css/chat.mini.css"><div id="chat" class="conteiner" style="overflow:hidden;">
<form name="chat_form">
	<div class="gray_stripe" style="padding-left:0;">
		<div id="chat_tabs">
			<a href="game.php?page=chat&mini_chat=1" class="left_tab tab">{$LNG.chat_msg1} (<span id="chat_online">{$chat_online.general}</span>)</a>
						<a class="tab active">{$LNG.chat_msg2} (<span id="chat_room1_online">{$chat_online.room1}</span>)</a>
		</div>
		<div style="float:right;">
			<a class="chat_rules" onClick="exitRoom();">{$LNG.chat_msg30}</a>
		</div>
	</div>
	<div class="chat_content" onClick="closeAllMenu();">
		<div id="online_chat"></div>
		<div id="shoutbox"></div>                    
	</div>
		<div class="bottom_chat_panel">
    	<div class="input_msg_block">
			<textarea class="input_msg" name="msg" id="msg" maxlength="520" onClick="closeAllMenu();" onKeyPress="if(event.keyCode == 13){ document.chat_form.send.click(); }" onKeyUP="if(event.keyCode != 27){ keyUp(); }"></textarea>
        </div>
    	<div class="input_msg_block_right">
            <input class="button_send cursor" type="button" name="send" value="{$LNG.mg_send}" id="send" onClick="closeAllMenu();addMessage();event.returnValue = false;return false;">
            <span style="line-height:25px;float:left;position:relative;display:block;margin-left:5px;color:#808080;"><span id="lost_symbols">0</span>/520</span>
            <div class="right_bottom_buttons">
                <div id="last_smiles"></div>
                <div class="button_smiles chat_btn" onClick="showSmilesMenu();">
                    <div id="chat_smiles" name="chat_smiles" class="conteiner">
                        {include file="page.chat.smiles.tpl"}
                    </div>
                    <img src="/styles/images/smile.png">
                </div>
                <div class="color_button chat_btn">
                    <div id="chat_msg_color_short" style="background:{$user_color};" onClick="showMsgColorMenu();"></div>
						{include file="page.chat.msg_color.tpl"}
                </div>
                <div class="sound_button chat_btn" onClick="chatSoundMute();">
                    <img id="sound_mute" style="display:none;" src="/styles/images/chat/mute.png">
                    <img id="sound_unmute" style="display:block;" src="/styles/images/chat/unmute.png">
                </div>
            </div>
            <div class="clear"></div>
        </div>        
        <div class="clear"></div>
	</div>
	</form>
</div>
</div>
</div>
            <div class="clear"></div>            
        </div><!--/body-->
{/block}