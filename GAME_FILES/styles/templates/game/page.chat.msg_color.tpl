 <div id="msg_color_menu" class="chat_img_add conteiner">
	<div style="color:#c6ff00;"  class="tooltip" data-tooltip-content="<div>В поле ниже введите HEX-код цвета, если вы хотите использовать свой цвет.<br />
Заметьте, использовать нужно только HEX-код (!), в таком виде: #e7b10e<hr />
Использование красного цвета, и его ближайших оттенков, напоминающих чистый красный, ЗАПРЕЩЕНО законом администрации, и будет караться. Розовый и фиолетовый допускаются.</div>">Правила</div>
	<div class="separator"></div>
	<input name="msg_color" type="hidden" value="{$user_color}">
	<div id="msg_color_my">
		<input class="chat_submenu_txt_input" name="chat_msg_color_my" value="{$user_color}" maxlength="7" type="text" id="chat_msg_color_my" onKeyPress="if(event.keyCode == 13){ document.chat_form.chat_msg_color_send.click();event.returnValue = false;return false; }">
		<input class="chat_submenu_btn_send cursor" type="button" name="chat_msg_color_send" value="{$LNG.mg_send}" id="chat_msg_color_send" onClick="msgColorSelect('my', {$authlevel}, {$userID});event.returnValue = false;return false;">
	</div>
	<div class="separator"></div>
		<div class="msg_color_selector" style="background:#ffffff;" onClick="msgColorSelect('#ffffff', {$authlevel}, {$userID});"></div>
	<div class="msg_color_selector" style="background:#b0e700;" onClick="msgColorSelect('#b0e700', {$authlevel}, {$userID});"></div>
	<div class="msg_color_selector" style="background:#634673;" onClick="msgColorSelect('#634673', {$authlevel}, {$userID});"></div>
	<div class="msg_color_selector" style="background:#ff7fbd;" onClick="msgColorSelect('#ff7fbd', {$authlevel}, {$userID});"></div>
	<div class="msg_color_selector" style="background:#53c156;" onClick="msgColorSelect('#53c156', {$authlevel}, {$userID});"></div>
	<div class="msg_color_selector" style="background:#056495;" onClick="msgColorSelect('#056495', {$authlevel}, {$userID});"></div>
	<div class="msg_color_selector" style="background:#e7b10e;" onClick="msgColorSelect('#e7b10e', {$authlevel}, {$userID});"></div>
	<div class="msg_color_selector" style="background:#7145a8;" onClick="msgColorSelect('#7145a8', {$authlevel}, {$userID});"></div>
	<div class="msg_color_selector" style="background:#00ffde;" onClick="msgColorSelect('#00ffde', {$authlevel}, {$userID});"></div>
</div>