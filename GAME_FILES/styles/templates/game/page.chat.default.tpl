{block name="title" prepend}{$LNG.lm_chat}{/block}
{block name="content"}
<div id="tooltip" class="tip"></div>
<div id="ichat" class="chat-mini">
	
	<div class="title-nav bga-tn">
		<div class="title-tabs">
			<a {if $ally_id != 0}href="?page=chat"{/if} class="title-tab{if $ally_id == 0} title-tab-active{/if}">{$LNG.chat_msg1} (<span id="online"></span>)</a>
			{if $user_ally != 0}<a {if $ally_id == 0}href="?page=chat&amp;chat=ally"{/if} class="title-tab{if $ally_id != 0} title-tab-active{/if}">{$LNG.al_goto_chat} (<span id="aonline"></span>)</a>{/if}
					</div>
			<div class="nav-i ri tooltip" data-tooltip-content="<table>
			<tr>
				<td colspan='2'><span style='color:#ECECEC'>{$LNG.chat_msg31}</span></td>
			</tr>
			<tr>
				<td>{$LNG.chat_msg32}</td>
				<td><span style='color:#cc3232'>UserName</span></td>
			</tr>
			<tr>
				<td>{$LNG.chat_msg33}</td>
				<td><span style='color:#00cc00'>UserName</span></td>
			</tr>
			<tr>
				<td>{$LNG.chat_msg34}</td>
				<td><span style='color:#ffff00'>UserName</span></td>
			</tr>
		</table>">i</div>
			</div>
		
	<div id="msg-box"></div>
	<div id="chat-footer">
			<div id="msg-text-box">
			<input id="msg-text" type="text" maxlength="520" onKeyPress="if(event.keyCode == 13){ addMessage();}" />
		</div>
		<div id="msg-btn">
			<div class="btn btn-primary" onClick="addMessage();">{$LNG.mg_send}</div>
		</div>
		<div id="silence"></div>
	</div>
	
</div>
<audio id="beepchat" preload="auto">
	<source src="./sound/beep.mp3"></source>
	<source src="./sound/beep.ogg"></source>
</audio>
<script type="text/javascript">
  var ally_id = "{$ally_id}";
</script>
{/block}