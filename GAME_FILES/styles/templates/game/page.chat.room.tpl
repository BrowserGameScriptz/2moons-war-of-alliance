{block name="title" prepend}{$LNG.lm_chat}{/block}
{block name="content"}
<script type="text/javascript">
  var lng = { "confirm_exit":"{$LNG.chat_msg4}","confirm_kick":"{$LNG.chat_msg5}","prompt_pass":"{$LNG.chat_msg6}","alert_pass":"{$LNG.chat_msg7}","prompt_pass2":"{$LNG.chat_msg8}","alert_pass2":"{$LNG.chat_msg9}","alert_done":"{$LNG.chat_msg10}" };
</script>
<script type="text/javascript" src="./scripts/chat/actions.js"></script>
<div id="chat" name="rooms" class="conteiner" style="overflow:hidden;">
	<div class="gray_stripe" style="padding:0 20px 0 0 !important;">
		<div id="chat_tabs">
			<a href="game.php?page=chat&mini_chat=1" class="left_tab tab">{$LNG.chat_msg1} (<span id="chat_online">{$chat_online.general}</span>)</a>
						<a class="tab active">{$LNG.chat_msg2} (<span id="chat_room1_online">{$chat_online.room1}</span>)</a>
		</div>
		<div style="float:right;">
			{*<div class="chat_rules" onClick="return Dialog.chatRules();">Правила</div>*}
			<a class="chat_rules" href="game.php?page=chat&mode=roomsActions&action=create">{$LNG.chat_msg18}</a>
		</div>
	</div>
	<div class="conteiner">
		<div id="search_menu">
			<input id="search_name" value="" type="text" onKeyDown="if(event.keyCode == 13){ searchRooms(); }">
			<div class='gr_btn_top_buy'>
				<a id="send" class="cursor" onClick='searchRooms();'>{$LNG.market_10}</a>     
			</div>
		</div>
		<div id="roomsList"></div>
	</div>
	</div>
</div>
</div>
            <div class="clear"></div>            
        </div><!--/body-->
{/block} 