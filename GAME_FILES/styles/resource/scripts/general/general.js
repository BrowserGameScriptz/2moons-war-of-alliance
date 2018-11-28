var Parser = new DOMParser();
//--
function IPost(url, post, Interval, TimeOut) 
{	
	parent.Frame.IFrame.Plon();
	$.post(url, post, function(data)
	{	
		//-- Отключаем таймеры
		window.clearInterval(SerInt);
		window.clearInterval(STime);
			
		Interval.forEach(function(item, i, arr) {
		  window.clearInterval(item);
		});
		//-- Отключаем таймеры
		TimeOut.forEach(function(item, i, arr) {
		  window.clearTimeout(item);
		});
		
		var Tbody = Parser.parseFromString(data, "text/html").getElementsByTagName('body');
		
		//DOM['body'].replaceWith(Tbody[0]);
		DOM['body'].html($(Tbody[0]).html());
		
		var u = Parser.parseFromString(data, "text/html").getElementsByTagName('script');
		var n = [];
		for(var i = 0; i < u.length-1; i++)
		{
			var s = $(u[i]);
			
			if(s.attr('act') == 'load')
				$.getScript(s.attr('src'));
			else if(s.attr('act') == 'eval')
				n.push(s);
		}	
		//-- Запускаем скрипты со страници
		n.forEach(function(item, i, arr) {
			var s = $(item);
			
			if(s.attr('act') == 'eval')
				$.globalEval(s.html());
		});
		
		//-- подмена URL
        if(url != window.location){
            window.history.pushState(null, null, url);
        }
	});
}
//-- Серверное время
function UhrzeitAnzeigen() {
   DOM['servertime'].text(getFormatedDate(serverTime.getTime(), tdformat));
}
//-- Удаление параметра из URL
function delPrm(Url,Prm) {
	var a=Url.split('?');
	var re = new RegExp('(\\?|&)'+Prm+'=[^&]+','g');
	Url=('?'+a[1]).replace(re,'');
	Url=Url.replace(/^&|\?/,'');
	var dlm=(Url=='')? '': '?';
	return a[0]+dlm+Url;
};
//--
function number_format (number, decimals) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = ' ',
        dec = ',',
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split(' ');
    if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');    }
    return s.join(dec);
}

function NumberGetHumanReadable(value, dec) {
	if(typeof dec === "undefined") {
		dec = 0;
	}
	if(dec == 0)
	{
		value	= removeE(Math.floor(value));
	}
	return number_format(value, dec);
}

function shortly_number(number)
{
	var unit = ["K", "M", "B", "T", "Q", "Q+", "S", "S+", "O", "N"];
	key	= 0;
	while(number >= 1000000)
    {
		++key;
        number = number / 1000000;
    };
	return NumberGetHumanReadable(number, ((number != 0 && number < 100) + 0))+'&nbsp;'+unit[key];
}

function removeE(Number) {
	Number = String(Number);
	if (Number.search(/e\+/) == -1) 
		return Number;
	var e = parseInt(Number.replace(/\S+.?e\+/g, ''));
	if (isNaN(e) || e == 0) 
		return Number;
	else if ($.browser.webkit || $.browser.msie) 
		return parseFloat(Number).toPrecision(Math.min(e + 1, 21));
	else 
		return parseFloat(Number).toPrecision(e + 1);
}

function getFormatedDate(timestamp, format) {
	var currTime = new Date();
	currTime.setTime(timestamp + (ServerTimezoneOffset * 1000));
	str = format;
	str = str.replace('[d]', dezInt(currTime.getDate(), 2));
	str = str.replace('[D]', days[currTime.getDay()]);
	str = str.replace('[m]', dezInt(currTime.getMonth() + 1, 2));
	str = str.replace('[M]', months[currTime.getMonth()]);
	str = str.replace('[j]', parseInt(currTime.getDate()));
	str = str.replace('[Y]', currTime.getFullYear());
	str = str.replace('[y]', currTime.getFullYear().toString().substr(2, 4));
	str = str.replace('[G]', currTime.getHours());
	str = str.replace('[H]', dezInt(currTime.getHours(), 2));
	str = str.replace('[i]', dezInt(currTime.getMinutes(), 2));
	str = str.replace('[s]', dezInt(currTime.getSeconds(), 2));
	return str;
}

function dezInt(num, size, prefix) {
	prefix = (prefix) ? prefix : "0";
	var minus = (num < 0) ? "-" : "", 
	result = (prefix == "0") ? minus : "";
	num = Math.abs(parseInt(num, 10));
	size -= ("" + num).length;
	for (var i = 1; i <= size; i++) {
		result += "" + prefix;
	}
	result += ((prefix != "0") ? minus : "") + num;
	return result;
}

function getFormatedTime(time) {
	hours = Math.floor(time / 3600);
	timeleft = time % 3600;
	minutes = Math.floor(timeleft / 60);
	timeleft = timeleft % 60;
	seconds = timeleft;
	return dezInt(hours, 2) + ":" + dezInt(minutes, 2) + ":" + dezInt(seconds, 2);
}

function GetRestTimeFormat(Secs) {
	var s = Secs;
	var m = 0;
	var h = 0;
	if (s > 59) {
		m = Math.floor(s / 60);
		s = s - m * 60;
	}
	if (m > 59) {
		h = Math.floor(m / 60);
		m = m - h * 60;
	}
	return dezInt(h, 2) + ':' + dezInt(m, 2) + ":" + dezInt(s, 2);
}

function GetDayRestTimeFormat(Secs) {
	var s = Secs;
	var m = 0;
	var h = 0;
	var d = 0;
	if (s > 59) {
		m = Math.floor(s / 60);
		s = s - m * 60;
	}
	if (m > 59) {
		h = Math.floor(m / 60);
		m = m - h * 60;
	}
	if (h > 23) {
		d = Math.floor(h / 24);
		h = h - d * 24;
	}
	return dezInt(d, 2) + ':' + dezInt(h, 2) + ':' + dezInt(m, 2) + ":" + dezInt(s, 2);
}

function GetShortRestTimeFormat(Secs) {
	var s = Secs;
	var m = 0;
	var h = 0;
	var d = 0;
	if (s > 59) {
		m = Math.floor(s / 60);
		s = s - m * 60;
	}
	if (m > 59) {
		h = Math.floor(m / 60);
		m = m - h * 60;
	}
	if (h > 23) {
		d = Math.floor(h / 24);
		h = h - d * 24;
	}
	
	if(d != 0)
		return d + LNG['lng_time']['d'] + ' ' + h + LNG['lng_time']['h'];
	
	if(h != 0)
		return h + LNG['lng_time']['h'] + ' ' + m + LNG['lng_time']['m'];	
	
	return dezInt(m, 2) + ":" + dezInt(s, 2);
}

function GetDayRestFullTimeFormat(Secs) {
	var s = Secs;
	var m = 0;
	var h = 0;
	var d = 0;
	var F = '';
	
	if(s == 0)
		F += lng_time['null'];
	else
	{	
		if (s > 59) {
			m = Math.floor(s / 60);
			s = s - m * 60;			
		}
		if (m > 59) {
			h = Math.floor(m / 60);
			m = m - h * 60;
		}
		if (h > 23) {
			d = Math.floor(h / 24);
			h = h - d * 24;			
		}
		
		if(d != 0)
			F += + dezInt(d, 2) + LNG['lng_time']['d'];
		F += ' ' + dezInt(h, 2) + LNG['lng_time']['h'];
		F += ' ' + dezInt(m, 2) + LNG['lng_time']['m'];
		F += ' ' + dezInt(s, 2) + LNG['lng_time']['s'];	
	}
	return F;
}

function OpenPopup(target_url, win_name, width, height) {
	var new_win = window.open(target_url+'&ajax=1', win_name, 'scrollbars=yes,statusbar=no,toolbar=no,location=no,directories=no,resizable=no,menubar=no,width='+width+',height='+height+',screenX='+((screen.width-width) / 2)+",screenY="+((screen.height-height) / 2)+",top="+((screen.height-height) / 2)+",left="+((screen.width-width) / 2));
	new_win.focus();
}

function OpenPopupGame(target_url, win_name, width, height) {
	var new_win = window.open(target_url, win_name, 'scrollbars=yes,statusbar=no,toolbar=no,location=no,directories=no,resizable=no,menubar=no,width='+width+',height='+height+',screenX='+((screen.width-width) / 2)+",screenY="+((screen.height-height) / 2)+",top="+((screen.height-height) / 2)+",left="+((screen.width-width) / 2));
	new_win.focus();
}

function handleErr(errMessage, url, line) 
{ 
	error = "There is an error at this page.\n";
	error += "Error: " + errMessage+ "\n";
	error += "URL: " + url + "\n";
	error += "Line: " + line + "\n\n";
	error += "Click OK to continue viewing this page,\n";
	alert(error);
	if(typeof console == "object")
		console.log(error);
 
	return true; 
}

var Dialog	= {
		
	Training: function(ID){
		return Dialog.open('game.php?page=training&step='+ID, 600, 450);
	},
		
	info: function(ID){
		return Dialog.open('game.php?page=information&id='+ID, 800, (ID > 600) ? 300 : 800);
	},
	
	news: function(){
		return Dialog.open('game.php?page=information&mode=news', 400, 400);
	},
	actions: function(){
		return Dialog.open('game.php?page=information&mode=actions', 400, 400);
	},
	
	contracts: function(ID){
		return Dialog.open('game.php?page=contracts', 550, 427);
	},
	
	errorarchive: function(){
		return Dialog.open('game.php?page=messages&mode=errorarchive', 300, 100);
	},
	
	manualinfo: function(ID){
		return Dialog.open('game.php?page=manualinfo&id='+ID, 650, 550);
	},
	
	
	minimanualinfo: function(ID){
		return Dialog.open('game.php?page=manualinfo&id='+ID, 650, 275);
	},
		
	complPM: function(ID){
		return Dialog.open('game.php?page=complaintMsg&id='+ID, 550, 500);
	},
	
	alert: function(msg, callback){
		alert(msg);
		if(typeof callback === "function") {
			callback();
		}
	},
	
	PM: function(ID, Subject, Message) {
		if(typeof Subject !== 'string')
			Subject	= '';

		return Dialog.open('game.php?page=messages&mode=write&id='+ID+'&subject='+encodeURIComponent(Subject)+'&message='+encodeURIComponent(Subject), 650, 230);
	},
	
	SRTF: function(ID) {
		return Dialog.open('game.php?page=messages&mode=SRTFshow&RaportID='+ID, 400, 130);
	},
	
	chatBana: function(ID){
		return Dialog.open('game.php?page=chatBana&user_id='+ID, 685, 500);
	},
	
	chatRules: function(ID){
		return Dialog.open('game.php?page=chat&mode=rules', 650, 550);
	},
	
	Playercard: function(ID) {
		return Dialog.open('game.php?page=playerCard&id='+ID, 655, 500);
	},
	
	Buddy: function(ID) {
		return Dialog.open('game.php?page=buddyList&mode=request&id='+ID, 650, 230);
	},
	
	CreateLotResources: function() {
		return Dialog.open('game.php?page=createlot&mode=resources', 400, 200);
	},
		
	CreateLotUpgrade: function(upgrade) {
		var upline = upgrade || '';
		return Dialog.open('game.php?page=createlot&mode=upgrade&upgrade='+upline, 400, 154);
	},
	
	//-- Phalanx 
	Phalanx: function(galaxy, sleeve, system, planet, type) {
		return Dialog.open('game.php?page=phalanx&galaxy='+galaxy+'&sleeve='+sleeve+'&system='+system+'&planet='+planet+'&type='+type, 890, 500);
	},
	
	//-- Ally
	AllyInfo: function(ID) {
		return Dialog.open('game.php?page=alliance&mode=info&id='+ID, 655, 500);
	},
	AllyRankAdd: function(ID) {
		return Dialog.open('game.php?page=alliance&mode=admin&action=permissionsSend&send=1', 760, 500);
	},
	AllyStoragePut: function() {
		return Dialog.open('game.php?page=alliance&mode=storage&action=put', 295, 300);
	},
	AllyStorageLog: function() {
		return Dialog.open('game.php?page=alliance&mode=storage&action=log', 950, 400);
	},
	
	//-- Bonus
	LevelUp: function(){ // Новый уровень
		return Dialog.open('game.php?page=bonus&mode=levelup', 700, 450);
	},
	SOffer: function(){ // Спец. предложение
		return Dialog.open('game.php?page=bonus&mode=offer', 700, 450);
	},
	EntryReward: function(){ // Бонус за вход
		return Dialog.open('game.php?page=bonus&mode=entryreward', 700, 350);
	},
	
	//-- Gm
	GmGlobal: function(){
		return Dialog.open('game.php?page=messages&mode=globalwrite', 650, 650);
	},
	
	open: function(url, width, height) 
	{
		$.fancybox.open({
			src  : url,
			type : 'iframe',
			opts : {
				infobar 	: false,
				buttons 	: false,
				smallBtn  	: true,
				iframe : {
					css : {
						width : width+'px',
						height: height+'px',					
					},
				},
			}
		});
		
		return false;
	},
	
	close: function()
	{
		$.fancybox.close();
	}
}

function IbeforeLoad()
{
	if(!Frame.IFrame.fOpen)
		Frame.IFrame.O.addClass('blur');
	else		
		Frame.IFrame.B.addClass('blur');

	Frame.TopNav.DOM.addClass('blur');
	Frame.ResNav.DOM.addClass('blur');
	Frame.PlanetData.DOM.menu.addClass('blur');
}

function IbeforeClose()
{	
	if(!Frame.IFrame.fOpen)
		Frame.IFrame.O.removeClass('blur');
	else
		Frame.IFrame.B.removeClass('blur');

	Frame.TopNav.DOM.removeClass('blur');
	Frame.ResNav.DOM.removeClass('blur');
	Frame.PlanetData.DOM.menu.removeClass('blur');
	
	if(!Frame.IFrame.fOpen)
		Frame.refresh();
}

function getCookie(name)
{
	var matches = document.cookie.match(new RegExp(
		"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1')  + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}

function fullScreen() {	
	var element = document.documentElement;
	
	if(element.requestFullScreen) {
		element.requestFullScreen();
	} else if(element.webkitRequestFullScreen ) {
		element.webkitRequestFullScreen();
	} else if(element.mozRequestFullScreen) {
		element.mozRequestFullScreen();
	}
}

//-- Покупка АМ
function PayXsolla()
{
	
	if(AppData.token.length != 32)
		return;
	
	if(!AppData.payBtnFlag)
	{
		IbeforeLoad();
		var options = {
			access_token: AppData.token,
			lightbox:{zIndex : 999999},
		};
				
		var s = document.createElement('script');
			s.type = "text/javascript";
			s.async = true;
			s.src = "https://static.xsolla.com/embed/paystation/1.0.4/widget.min.js";
			s.addEventListener('load', function (e) {
				XPayStationWidget.init(options);
				AppData.XPayStationWidget = XPayStationWidget;
				XPayStationWidget.open();
				IbeforeClose();
			}, false);
			
		var head = document.getElementsByTagName('head')[0];
			head.appendChild(s);

		AppData.payBtnFlag = true;
	}
	else
		AppData.XPayStationWidget.open();
}

//-- Сбор фонда производства
function getPlanetFund(planetID) 
{	
	parent.Frame.IFrame.Plon(); 
	
	$('#pfund'+planetID).unbind('click').addClass('or-cur cursor-d');
	
	$.getJSON("game.php?page=orbita&mode=pfund&ajax=1&planetID="+planetID, function(data)
	{	
		if(!data.error){
			parent.NotifyBox(data.mess, 2000);	
		}
		else if(data['data'][1] == 'CAPTCHA')
			Confirm.captcha('getPlanetFund('+data['data'][0]+');');
			
		parent.Frame.IFrame.Ploff();
	});
}
/*---------------------------------------------------------
$(function() {
	$('#drop-admin').on('click', function() {
		$.get('admin.php?page=logout', function() {
			$('.globalWarning').animate({
				'height' :0,
				'padding' :0,
				'opacity' :0
			}, function() {
				$(this).hide();
			});
		});
	});	
	
	$("button#create_new_alliance_rank").click(function() {
		$("div#new_alliance_rank").dialog(		{
			draggable: false,
			resizable: false,
			modal: true,
			width: 760
		});

		return false;
	});
});
*/