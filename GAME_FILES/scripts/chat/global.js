var DOM 			= {};
var Refreshing 		= false;
var LastMessage 	= 0;
var SoundFlag 		= false;

function muteChat(mode, id)
{
	$.post('?page=chatBana', {'id':id,'mode':mode}, function(data){
		data = JSON.parse(data);
		parent.NotifyBox(data, 1600);
	});			
}

function goHide(){
	DOM['chat'].addClass('chat-mini');
	DOM['msg-box'].animate({scrollTop: DOM['msg-box'].prop('scrollHeight')}, 1);
}

function goShow(){
	DOM['chat'].removeClass('chat-mini');
	DOM['msg-box'].animate({scrollTop: DOM['msg-box'].prop('scrollHeight')}, 1);
}

function addMessage()
{
	var message = DOM['msg-text'].val();
	
	DOM['msg-text'].val('');
	
	if(!message)		
		return;

	jQuery.post("chat_add.php", {'ally': ally_id, 'message': message, 'ajax': 1}, function(data){
		showMessage();
	});
}

function showMessage()
{
  	if(Refreshing)
 		return;
  
	Refreshing = true;
	
	jQuery.post("chat_msg.php", {'ally': ally_id, 'last_message': LastMessage, 'online': 1, 'ajax': 1}, function(data)
	{
		if(data != undefined)
		{		  
			if(data.html)
			{
				LastMessage = data.last_message;
				DOM['msg-box'].html(DOM['msg-box'].html() + data.html);
				DOM['msg-box'].animate({scrollTop: DOM['msg-box'].prop('scrollHeight')}, 1);
			
				if(data.sound && SoundFlag)
					beepchat.play();
			}
			DOM['online'].text(data.online[0]);
			
			if(DOM['aonline'] != undefined)
			DOM['aonline'].text(data.online[1]);
		
			if(data.silence)
				DOM['silence'].text(getFormatedTime(data.silence)).show();
			else
				DOM['silence'].hide();
		}
	  	Refreshing = false;
		window.setTimeout(showMessage, 5000);
	}, "json");
}

function addNick(Nick)
{
	DOM['msg-text'].val(DOM['msg-text'].val()+Nick);
}

jQuery(document).ready(function()
{
	DOM['chat']		= $('#ichat');
    DOM['msg-text']	= $('#msg-text');
	DOM['msg-box'] 	= $('#msg-box');
	DOM['silence'] 	= $('#silence');
	
	DOM['online']	= $('#online');
	DOM['aonline'] 	= $('#aonline');
	
	DOM['msg-text'].keyup(function(e) {
		if(e.which == 27) {
			DOM['msg-text'].val('');
			e.preventDefault();
			return false;
		}
	});
	
	//-- Ð•ÑÐ»Ð¸ Ñ‡Ð°Ñ‚ Ð¾Ñ‚ÐºÑ€Ñ‹Ñ‚
	if(parent.Frame.Chat.fOpen)
		goShow();
	//--ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ñ
	showMessage();	
});