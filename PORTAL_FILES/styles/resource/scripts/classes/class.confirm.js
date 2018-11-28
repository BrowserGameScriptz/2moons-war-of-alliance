/*
 * confirmation JS
 * Class
 * 13.05.2016 by reemo
*/
//var TrLNG		= [];
//var tStep 		= 0;

//-- ÐžÐ±ÑŠÐµÐºÑ‚ ÐžÐ±ÑƒÑ‡ÐµÐ½Ð¸Ñ
function classConfirm() 
{  	
	this.flagCaptcha = false;
	
	//-- Constructor | Start
	this.construct = function() 
	{
		//-- Ð¡Ð¾Ð·Ð´Ð°ÐµÐ¼ Ð¡Ñ‚Ñ€ÑƒÐºÑ‚ÑƒÑ€Ñƒ
		this.General 	= $('<div id="confirm"></div>');
		this.Box 		= $('<div id="cm-box"><div id="cm-closed" onClick="Confirm.hide();">x</div></div>');		
		this.Title 		= $('<div id="cm-title"></div>');
		this.Content 	= $('<div id="cm-content"></div>');		
		this.Btn 		= $('<div id="cm-btn"><div class="btn btn-primary"><div class="btn-ico ri"></div><div class="btn-content"></div></div>');
		this.BtnTrue	= $('<div id="cm-btn-true"><div class="btn btn-success"></div>');
		this.BtnFalse	= $('<div id="cm-btn-false"><div class="btn btn-danger"></div>');		
		
		//-- ÐžÐ±ÑŠÐµÐ´ÐµÐ½ÑÐµÐ¼		
		this.Box	
			.append(this.Title)
			.append(this.Content)
			.append(this.Btn)
			.append(this.BtnTrue)
			.append(this.BtnFalse);
		this.General.append(this.Box);
		
		//-- Ð”Ð¾Ð±Ð°Ð²ÑÐµÐ¼ Ð² Ñ‚ÐµÐ»Ð¾ ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ñ‹
		$('body').prepend(this.General);			
	
	}//-- Constructor | End
	
	this.constructCaptcha = function(ExtraTitle, LngUpdate)
	{
		this.ExtraTitle	= $('<div class="cm-boost-name">'+ExtraTitle+'</div>');
		this.Captcha 	= $(
			'<img id="captcha" class="cm-captcha" alt="" src="/captcha.php" />'+
			'<input id="t-captcha" type="text" class="cm-in-captcha" name="captcha" required autofocus placeholder="" maxlength="3" value="" />'+
			'<div class="cm-captcha-reload" onClick="reloadCaptcha();">'+LngUpdate+'</div>'
		);
		
		this.Content	
			.append(this.ExtraTitle)
			.append(this.Captcha);
			
		this.flagCaptcha = true;
	}
	
	//-- ÐžÐ±Ñ‰Ð¸Ðµ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸
	//-- -- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ
	this.show = function() 
	{
		this.General.show();
	}
	//-- -- Ð¡ÐºÑ€Ñ‹Ñ‚ÑŒ
	this.hide = function() 
	{
		this.General.hide();
	}
	//-- -- Ð£Ñ‚Ð°Ð½Ð¾Ð²Ð¸Ñ‚ÑŒ ÐºÐ»Ð°ÑÑ
	this.setCalss = function(strClass) 
	{
		this.General.attr('class', strClass);
	}
	
	//-- Ð¤ÑƒÐ½ÐºÑ†Ð¸Ð¸ Ð´Ð¸Ð°Ð»Ð¾Ð³Ð°
	//-- -- Ð¡Ð¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ
	this.alert = function(Title, Message, BtnText, StrEval) 
	{	
		// Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð±Ð»Ð¾ÐºÐ¾Ð² ÐºÐ°Ð¿Ñ‡Ð¸
		this.flagCaptcha = false;
		
		this.setCalss('cm-alert');
		//-- Ð Ð°Ð±Ð¾Ñ‚Ð° Ñ Ñ‚ÐµÐºÑÑ‚Ð¾Ð¼
		this.Title.text(Title);
		this.Content.html('<div class="cm-text-depiction">'+Message+'</div>');
		this.Btn.find('.btn-content:first').text(BtnText);		
		//-- ÐžÐ±Ñ€Ð°Ð±Ð¾Ñ‚Ñ‡Ð¸Ðº ÐºÐ½Ð¾Ð¿ÐºÐ¸
		this.Btn.unbind('click');
		this.Btn.bind('click', function() {eval(StrEval);Confirm.hide();});
		//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ
		this.show();
	}
	//-- -- ÐŸÐ¾Ð´Ñ‚Ð²ÐµÑ€Ð¶Ð´ÐµÐ½Ð¸Ðµ Ð·Ð°Ñ‚Ñ€Ð°Ñ‚
	this.cost = function(Title, Message, Count, StrEval, rID) 
	{	
		// Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð±Ð»Ð¾ÐºÐ¾Ð² ÐºÐ°Ð¿Ñ‡Ð¸
		this.flagCaptcha = false;
		
		this.setCalss('cm-cost');
		//-- Ð Ð°Ð±Ð¾Ñ‚Ð° Ñ Ñ‚ÐµÐºÑÑ‚Ð¾Ð¼
		this.Title.text(Title);
		this.Content.html('<div class="cm-text-depiction">'+Message+'</div>');
		//-- ÐšÐ½Ð¾Ð¿ÐºÐ° Ñ†ÐµÐ½Ñ‹
		this.Btn.find('.btn-ico:first').attr('class', 'btn-ico ri i-'+rID);
		this.Btn.find('.btn-content:first').text(Count);	
		//-- ÐžÐ±Ñ€Ð°Ð±Ð¾Ñ‚Ñ‡Ð¸Ðº ÐºÐ½Ð¾Ð¿ÐºÐ¸
		this.Btn.unbind('click');
		this.Btn.bind('click', function() {eval(StrEval);Confirm.hide();});
		//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ
		this.show();
	}
	//-- -- ÐŸÐ¾Ð´Ñ‚Ð²ÐµÑ€Ð¶Ð´ÐµÐ½Ð¸Ðµ Ð´ÐµÐ¹ÑÑ‚Ð²Ð¸Ñ
	this.action = function(Title, Message, BtnTrue, BtnFalse, StrEval) 
	{	
		// Ð£Ð´Ð°Ð»ÐµÐ½Ð¸Ðµ Ð±Ð»Ð¾ÐºÐ¾Ð² ÐºÐ°Ð¿Ñ‡Ð¸
		this.flagCaptcha = false;
		
		this.setCalss('cm-action');
		//-- Ð Ð°Ð±Ð¾Ñ‚Ð° Ñ Ñ‚ÐµÐºÑÑ‚Ð¾Ð¼
		this.Title.text(Title);
		this.Content.html('<div class="cm-text-depiction">'+Message+'</div>');
		this.BtnTrue.find('.btn-success:first').text(BtnTrue);	
		this.BtnFalse.find('.btn-danger:first').text(BtnFalse);
		//-- ÐžÐ±Ñ€Ð°Ð±Ð¾Ñ‚Ñ‡Ð¸Ðº ÐºÐ½Ð¾Ð¿ÐºÐ¸ false
		this.BtnFalse.unbind('click');
		this.BtnFalse.bind('click', function() {Confirm.hide();});
		//-- ÐžÐ±Ñ€Ð°Ð±Ð¾Ñ‚Ñ‡Ð¸Ðº ÐºÐ½Ð¾Ð¿ÐºÐ¸ true
		this.BtnTrue.unbind('click');
		this.BtnTrue.bind('click', function() {eval(StrEval);Confirm.hide();});
		//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ
		this.show();
	}
	//-- -- ÐšÐ°Ð¿Ñ‡Ð°
	this.captcha = function(Title, BtnText, StrEval) 
	{	
		if(!this.flagCaptcha)
		{
			this.Content	
				.append(this.ExtraTitle)
				.append(this.Captcha);
			
			this.flagCaptcha = true;
		}
		
		reloadCaptcha();
		
		this.setCalss('cm-captcha');
		//-- Ð Ð°Ð±Ð¾Ñ‚Ð° Ñ Ñ‚ÐµÐºÑÑ‚Ð¾Ð¼
		this.Title.text(Title);
		this.Btn.find('.btn-content:first').text(BtnText);
		//-- ÐžÐ±Ñ€Ð°Ð±Ð¾Ñ‚Ñ‡Ð¸Ðº ÐºÐ½Ð¾Ð¿ÐºÐ¸
		this.Btn.unbind('click');
		this.Btn.bind('click', function() {eval(StrEval);Confirm.hide();});
		//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ
		this.show();
		this.Content.find('#t-captcha').val('').focus();
	}
};