var chat_refreshing = false;
var chat_last_message = 0;

if(!status_smiles_menu){
	var status_smiles_menu = false;
}
if(!status_msg_color_menu){
	var status_msg_color_menu = false;
}
if(!status_img_add_menu){
	var status_img_add_menu = false;
}
if(!status_chat_sound){
	var status_chat_sound = true;
}

function msgEnterClean(message)
{
	var reg = new RegExp("\\n+", "i");
	message = message.replace(reg,"");
	return message;
}

function addSmiley(smiley,smileyName)
{
	if(smileyName != 'nickname')
		smiley = ' '+smiley+' ';
	document.chat_form.msg.value += smiley;
	//document.chat_form.msg.focus();
	setCursorPosition(document.chat_form.msg);
	if(smileyName != 'nickname'){
		coockRefresh(smileyName);
		coockView();
	}
}

// РІРѕР·РІСЂР°С‰Р°РµС‚ cookie СЃ РёРјРµРЅРµРј name, РµСЃР»Рё РµСЃС‚СЊ, РµСЃР»Рё РЅРµС‚, С‚Рѕ undefined
function getCookie(name)
{
	var matches = document.cookie.match(new RegExp(
		"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1')  + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}

// Р’С‹РІРѕРґ РїРѕСЃР»РµРґРЅРёС… СЃРјР°Р№Р»РѕРІ РёР· РєСѓРєРёСЃРѕРІ
function coockView()
{
	// СЂР°Р·Р±РёРІР°РµРј РїРѕР»СѓС‡Р°РµРјСѓСЋ СЃС‚СЂРѕРєСѓ РёР· РєСѓРєРё РЅР° РјР°СЃСЃРёРІ
	cook = getCookie("SmilesXterium").split(',');
	
	// РѕР±РЅСѓР»СЏРµРј Р±Р»РѕРє СЃРѕ РїРѕСЃР»РµРґРЅРёРјРё СЃРјР°Р№Р»Р°РјРё
	$('#last_smiles').text('');

	// СѓСЃС‚Р°РЅР°РІР»РёРІР°РµРј СЃС‡С‘С‚С‡РёРє С†РёРєР»Р° РІ РЅСѓР»РµРІСѓСЋ РїРѕР·РёС†РёСЋ
	i = 0;
	// РІС‹РІРѕРґРёРј РєР°Р¶РґРѕРµ Р·РЅР°С‡РµРЅРёРµ РјР°СЃСЃРёРІР° РІ РІРёРґРµ html-СЌР»РµРјРµРЅС‚Р°
	while(i < cook.length){
		// РїСЂРёСЃРІР°РёРІР°РµРј РїРµСЂРµРјРµРЅРЅРѕ СЃРјР°Р№Р», СЃРѕС…СЂР°РЅС‘РЅРЅС‹Р№ РІ РєСѓРєР°С…
		smile = document.getElementById(cook[i]);
		
		// СЃРѕР·РґР°С‘Рј СЌР»РµРјРµРЅС‚ IMG
		var newImg = document.createElement('img');
		newImg.setAttribute('src', smile.getAttribute('src'));
		newImg.setAttribute('style', smile.getAttribute('style'));
		newImg.setAttribute('title', smile.getAttribute('title'));
		newImg.setAttribute('alt', smile.getAttribute('alt'));
		newImg.setAttribute('onClick', smile.getAttribute('onClick'));
		
		// СЌР»РµРјРµРЅС‚ DIV СЃ РїРѕСЃР»РµРґРЅРёРјРё СЃРјР°Р№Р»Р°РјРё
		var smilesDiv = document.getElementById('last_smiles');
	
		smilesDiv.appendChild(newImg);
		i++;
	}
}

// РћР±РЅРѕРІР»РµРЅРёРµ РєСѓРєРё СЃ РїРѕСЃР»РµРґРЅРёРјРё СЃРјР°Р№Р»Р°РјРё
function coockRefresh(val)
{
	// СѓСЃС‚Р°РЅРѕРІРєР° РґР°С‚С‹ РІ +30 РґРЅРµР№
	date = new Date;
	date.setDate( date.getDate() + 30 );
	
	// Р•СЃР»Рё С‚Р°РєРѕР№ РєСѓРєРё РЅРµС‚, С‚Рѕ РїСЂРѕСЃС‚Рѕ СЃРѕР·РґР°С‘Рј РЅРѕРІСѓСЋ СЃ РѕРґРЅРёРј Р·РЅР°С‡РµРЅРёРµРј
	if(getCookie("SmilesXterium") == undefined){
		document.cookie = "SmilesXterium="+val+"; expires="+date.toUTCString();;
		return;
	}
	
	// Р•СЃР»Рё РєСѓРєР° РµСЃС‚СЊ, С‚Рѕ СЂР°Р·Р±РёСЂР°РµРј РµС‘ РЅР° РјР°СЃСЃРёРІ
	cook = getCookie("SmilesXterium").split(',');
	
	// Р•СЃР»Рё РґР»РёРЅР° РјР°СЃСЃРёРІР° РјРµРЅСЊС€Рµ С€РµСЃС‚Рё,
	// С‚Рѕ РїСЂРѕРІРµСЂСЏРµРј РЅРѕРІРѕРµ Р·РЅР°С‡РµРЅРёРµ РЅР° РЅР°Р»РёС‡РёРёРµ, Рё РµСЃР»Рё РµРіРѕ РЅРµС‚
	// РїСЂРѕСЃС‚Рѕ РґРѕР±Р°РІР»СЏРµРј РµРіРѕ РІ РєРѕРЅРµС†. РЎРѕС…СЂР°РЅСЏРµРј РєСѓРєСѓ
	if(cook.length != 6){
		i = cook.length;
		while(i > 0){
			if(cook[i-1] == val)
				return;
			i--;
		}
		cook[cook.length] = val;
		document.cookie = "SmilesXterium="+cook+"; expires="+date.toUTCString();;
	}
	// Р•СЃР»Рё Р·РЅР°С‡РµРЅРёР№ С€РµСЃС‚СЊ, С‚Рѕ РїСЂРѕРІРµСЂСЏРµРј РЅРѕРІРѕРµ Р·РЅР°С‡РµРЅРёРµ РЅР° РЅР°Р»РёС‡РёРёРµ, Рё РµСЃР»Рё РµРіРѕ РЅРµС‚
	// РґРѕР±Р°РІР»СЏРµРј РµРіРѕ РїРѕ РїСЂРёРЅС†РёРїСѓ СЃС‚РµРєР°. РЎРѕС…СЂР°РЅСЏРµРј РєСѓРєСѓ
	else{
		i = cook.length;
		while(i > 0){
			if(cook[i-1] == val)
				return;
			i--;
		}
		i = 0;
		while(i < cook.length){
			if(i != 5){
				cook[i] = cook[i+1]
			}else{
				cook[i] = val;
			}
			i++;
		}
		document.cookie = "SmilesXterium="+cook+"; expires="+date.toUTCString();;
	}
}

function msgColorSelect(color, authlevel, userID)
{
	if(color == 'my'){
		color = document.chat_form.chat_msg_color_my.value;
	}

	if(userID == 17){
		color = color;
	}
	else if(authlevel != 3 && color == '#ff0000'){
		color = '#ffffff';
	}
	
	$.get("game.php?page=chat&mode=colorselect", {'color': color, 'ajax': 1}, function(data) {});
	document.chat_form.msg_color.value = color;
	document.getElementById('chat_msg_color_short').style.background = color;

	showMsgColorMenu('close');
}

function addImage()
{
	url = document.chat_form.chat_img.value;
	document.chat_form.chat_img.value = '';

	img = NUUL; //"[img="+url+"]";

	jQuery.post("chat_room_add.php", {'ally': ally_id, 'message': img, 'ajax': 1}, function(data)
	{
		showMessage();
	});

	//document.chat_form.msg.focus();
	setCursorPosition(document.chat_form.msg);
	closeAllMenu();
}

function closeAllMenu(){
	showMsgColorMenu('close');
	showSmilesMenu('close');
	showImgAddMenu("close");
}

function showSmilesMenu(act)
{
	if(act != 'close'){
		showMsgColorMenu("close");
		showImgAddMenu("close");
	}
	if(act == 'close'){
		status_smiles_menu = true;
	}
	if(act == 'open'){
		status_smiles_menu = false;
	}

	if(status_smiles_menu == false){
		$('#chat_smiles').stop(true,false).slideDown(300);
		status_smiles_menu = true;
		act ='';
	} else if(status_smiles_menu == true){
		$('#chat_smiles').stop(true,false).slideUp(300);
		status_smiles_menu = false;
		//document.chat_form.msg.focus();
		//setCursorPosition(document.chat_form.msg);
		act ='';
	}
}

function showMsgColorMenu(act)
{
	if(act != 'close'){
		showSmilesMenu("close");
		showImgAddMenu("close");
	}
	if(act == 'close'){
		status_msg_color_menu = true;
	}
	if(act == 'open'){
		status_msg_color_menu = false;
	}

	if(status_msg_color_menu == false){
		$('#msg_color_menu').stop(true,false).slideDown(300);
		status_msg_color_menu = true;
		act ='';
	} else if(status_msg_color_menu == true){
		$('#msg_color_menu').stop(true,false).slideUp(300);
		status_msg_color_menu = false;
		//document.chat_form.msg.focus();
		//setCursorPosition(document.chat_form.msg);
		act ='';
	}
}

function showImgAddMenu(act)
{
	if(act != 'close'){
		showMsgColorMenu("close");
		showSmilesMenu("close");
	}
	if(act == 'close'){
		status_img_add_menu = true;
	}
	if(act == 'open'){
		status_img_add_menu = false;
	}

	if(status_img_add_menu == false){
		$('#chat_img_add').stop(true,false).slideDown(300);
		status_img_add_menu = true;
		act ='';
	} else if(status_img_add_menu == true){
		$('#chat_img_add').stop(true,false).slideUp(300);
		status_img_add_menu = false;
		//document.chat_form.msg.focus();
		//setCursorPosition(document.chat_form.msg);
		act ='';
	}
}

function chatSoundMute(act)
{
	if(status_chat_sound == false || act == 'unmute'){
		status_chat_sound = true;
		chatSoundMuteCookie('unmute');
		$('#sound_mute').hide();
		$('#sound_unmute').show();
	} else if(status_chat_sound == true || act == 'mute'){
		status_chat_sound = false;
		chatSoundMuteCookie('mute');
		$('#sound_unmute').hide();
		$('#sound_mute').show();
	}
	document.chat_form.msg.focus();
	setCursorPosition(document.chat_form.msg);
}

function chatSoundMuteCookie(val)
{
	// СѓСЃС‚Р°РЅРѕРІРєР° РґР°С‚С‹ РІ +30 РґРЅРµР№
	date = new Date;
	date.setDate( date.getDate() + 30 );
	
	// Р—Р°РїРёСЃС‹РІР°РµРј РєСѓРєСѓ
	document.cookie = "ChatSound="+val+"; expires="+date.toUTCString();;
}

function addMessage()
{
	var message = document.chat_form.msg.value;
	
	message = msgEnterClean(message);
	
	if(!message){
		document.chat_form.msg.value = '';
		$('#lost_symbols').text('0');
		return;
	}

	document.chat_form.msg.value = '';
	var color = document.chat_form.msg_color.value;
	if(color == ''){
		color = 'white';
	}
	$('#lost_symbols').text('0');
  
	message = "[c="+color+"]" + message + "[/c]";

	jQuery.post("chat_room_add.php", {'ally': ally_id, 'message': message, 'ajax': 1}, function(data){
		showMessage();
		$('#lost_symbols').text('0');
	});
}

function showMessage(norefresh)
{
  if(chat_refreshing)
  {
    return;
  }
  
  chat_refreshing = true;

  jQuery.post("chat_room_msg.php", {'ally': ally_id, 'last_message': chat_last_message, 'online': 1, 'ajax': 1}, function(data)
  {
      if(data != undefined)
	  {
		  var shoutbox = document.getElementById('shoutbox');
		  var onlinecat = document.getElementById('online_chat');
		  var beepchat = document.getElementById('beepchat');
		  if(data.html)
		  {
			chat_last_message = data.last_message;
			shoutbox.innerHTML += data.html;
			jQuery('#shoutbox').animate({scrollTop: jQuery('#shoutbox').prop('scrollHeight')}, 1);
			if(data.sound && status_chat_sound == true)
			{
				beepchat.play();
			}
		  }
		  if(data.online)
		  {
			onlinecat.innerHTML = data.online;
		  }
	  }
	  chat_refreshing = false;
      window.setTimeout(showMessage, 5000);
    }, "json"
  );
}

function setCursorPosition(inputObject)
{
	if (inputObject.selectionStart){
		var end = inputObject.value.length;
		inputObject.setSelectionRange(end,end);
		inputObject.focus();
	}
}

function ChatSoundGetCookie()
{
	status = getCookie("ChatSound");
	if(status == 'unmute')
		chatSoundMute('unmute');
	if(status == 'mute')
		chatSoundMute('mute');
}

jQuery(document).ready(function(){
    showMessage();
	coockView();
	ChatSoundGetCookie();
	$('#msg').keyup(function(e) {
		if(e.which == 27) {
			document.chat_form.msg.value = '';
			$('#lost_symbols').text('0');
			e.preventDefault();
			return false;
		}
	});
});
function keyUp()
{
	message = document.chat_form.msg.value;
	$('#lost_symbols').text(message.length);
	document.chat_form.msg.value = msgEnterClean(message);
}