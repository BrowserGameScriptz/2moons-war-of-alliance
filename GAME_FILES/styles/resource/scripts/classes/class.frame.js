/* Class Frame - Ð“Ð»Ð°Ð²Ð½Ð¾Ðµ ÑƒÐ¿Ñ€Ð°Ð²Ð»ÐµÐ½Ð¸Ðµ
 * by reemo
 * 14.12.2016
 * rev 10.07.2017
 */
var v  				= new Date(), 	// Ð¢ÐµÐºÑƒÑ‰ÐµÐµ Ð²Ñ€ÐµÐ¼Ñ
	maxQ			= 5,			// ÐœÐ°ÐºÑÐ¸Ð¼ÑƒÐ¼ Ð² Ð¾Ñ‡ÐµÑ€ÐµÐ´Ð¸
	i				= 0;			// Ð´Ð»Ñ For


//-- Ð ÐµÑÑƒÑ€ÑÑ‹
/*
var SetObjIFrames 	= {};
SetObjIFrames['iframe'] 	= $('<iframe id="iframe-extra" frameborder="0" width="100%" height="100%" scrolling="auto"></iframe>');
SetObjIFrames['iframe_box']	= $('<div id="iframe-box"></div>');
SetObjIFrames['iframe_box']	= $('<div id="iframe-close">&times;</div>');
*/
//-- Ð¡Ð¾Ð·Ð´Ð°ÐµÐ¼ ÐžÐ±ÑŠÐµÐºÑ‚
function classFrame() 
{			
	this.IFrame 		= new classIFrame();	
	this.TopNav 		= new classTopNav();
	this.ResNav 		= new classResNav();
	this.Queue 			= new classMainQueue();
	this.Ajax			= new classAjax();
	this.PlanetMenu 	= new classPlanetMenu();
	this.PlanetData		= new classPlanetData();
	this.Chat			= new classChat();
	this.Events			= new classEvents();
	this.Sound			= new classSound();
	
	//-- 
	this.JT 			= 5;
	this.fAttack 		= 0;
	this.fDestr 		= 0;	
	//-- Ð¤Ð»Ð°Ð³Ð¸
	this.fRefresh	= false; // Ð˜Ð´ÐµÑ‚ Ð¾Ð±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ Ð´Ð°Ð½Ð½Ñ‹Ñ…?
	
	//-- Construct | START
	this.construct = function()
	{	
		this.IFrame.construct();
		this.TopNav.construct();
		this.Ajax.construct();
		this.ResNav.construct();
		this.Queue.construct();
		this.PlanetMenu.construct();
		this.PlanetData.construct();
		this.Chat.construct();
		this.Events.construct();
		this.Sound.construct();
		
		this.refresh();
		this.timer();
	}
	//-- Construct | END
	
	//-- Refresh
	this.refresh = function(cp)
	{
		var P = {'frame': 1};		
		this.TopNav.close(true);
		this.PlanetMenu.close();
			
		if(cp !== undefined)
		{
			if(this.IFrame.fOpen)
			{
				this.IFrame.setCP(cp);
				return false;
			}
			
			P['cp'] = cp;
		}
		
		this.fRefresh = true;
		this.Ajax.p('./game.php', P, Frame.Ajax.FullRev);	
	}
	this.refreshEnd = function()
	{
		this.fRefresh = false;
	}	
	//-- timer
	this.timer = function()
	{
		if(!this.fRefresh)
		{
			//-- Ð—Ð°Ð¿ÑƒÑÐº ÐŸÑ€Ð¾Ð¸Ð·Ð²Ð¾Ð´ÑÑ‚Ð²Ð°
			this.ResNav.sP(901);
			this.ResNav.sP(902);
			this.ResNav.sP(903);
			//-- Ð—Ð°Ð¿ÑƒÑÐº Ð¾Ñ‡ÐµÑ€ÐµÐ´ÐµÐ¹
			this.Queue.TB();
			this.Queue.TS();
			this.Queue.TR();
			//-- Ð¢Ð°Ð¹Ð¼ÐµÑ€ Ð½Ð° Ñ‡Ð°ÑÑ‚Ð¸Ñ‡Ð½Ð¾Ðµ Ð¾Ð±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ
			this.TimerJT();
			//-- Ð¢Ð°Ð¹Ð¼ÐµÑ€Ñ‹ ÑÐ¾Ð±Ñ‹Ñ‚Ð¸Ð¹
			this.Events.T();
		}
		setTimeout(function(){Frame.timer();}, 1000);
	}
	
	//-- Ð¢Ð°Ð¹Ð¼ÐµÑ€ Ñ‡Ð°ÑÑ‚Ð¸Ñ‡Ð½Ð¾Ð³Ð¾ Ð¾Ð±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ñ
	this.TimerJT = function() 
	{
		this.JT++;
		
		if(this.JT < 4)
			return false;
		
		this.JT = 0;
		
		var P = {'attack': this.fAttack, 'destr': this.fDestr, 'ajax': 1};
		
		this.Ajax.p('./json.php', P, Frame.Ajax.PartRev);
	}
	//-- Pay
	this.Pay = function()
	{
		switch(AppData.name)
		{
			case 'vk':
			{
				$.cookie('tab_prem', 'am'); 
				Frame.IFrame.open('premium');
				break;
			}
			default:
			{			
				PayXsolla();
				break;
			}
		}
	}
};

//-- ÐŸÐ¾Ð´ÐºÐ»ÑŽÑ‡Ð°ÐµÐ¼ Ðº ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ðµ
var Frame = new classFrame();
//-- Ð—Ð°Ð¿ÑƒÑÐºÐ°ÐµÐ¼ ÐºÐ¾Ð½ÑÑ‚Ñ€ÑƒÐºÑ‚Ð¾Ñ€
$(document).ready(function(){Frame.construct();});

//-------------------------------------------------------------------------------
//-- Ð’Ð½ÑƒÑ‚Ñ€ÐµÐ½Ð½Ð¸Ðµ ÐºÐ»Ð°ÑÑÑ‹
//-- -- IFrame
function classIFrame()
{
	this.fOpen = false;
	//-- Construct | START
	this.construct = function()
	{			
		this.O	= $('#overview');
		this.B	= $('<div id="iframe-box"></div>');
		this.S	= $('<div id="iframe-extra-pos"></div>');
		this.P	= $('<div id="iframe-preloader"><div class="fancybox-loading"></div></div>');
		this.C	= $('<div id="iframe-close">&times;</div>');
		this.I	= $('<iframe name="iframe" id="iframe-extra" frameborder="0" width="100%" height="100%" scrolling="auto"></iframe>');
		
		//-- FrameTopNav
		this.N		= [];		
		this.N.push($('<div class="title-nav bga-tn"></div>'));
		this.N.push($('<div class="title-nav-html"></div>'));		
		this.N.push($('<div class="title-nav-sep"></div>'));
		this.N.push($('<div class="title-nav-btn i-br tooltip" onClick="Frame.IFrame.open(\'research\');" data-tooltip-content="'+LNG['lm_research']+'"></div>'));
		this.N.push($('<div class="title-nav-btn i-bs tooltip" onClick="Frame.IFrame.open(\'shipyard\');" data-tooltip-content="'+LNG['lm_shipshard']+'"></div>'));
		this.N.push($('<div class="title-nav-btn i-bb tooltip" onClick="Frame.IFrame.open(\'buildings\');" data-tooltip-content="'+LNG['lm_buildings']+'"></div>'));			
				
		this.C.click(function(){Frame.IFrame.close();}); 
		this.S.append(this.I);
		
		//-- Ð’ÐºÐ»ÑŽÑ‡Ð°ÐµÐ¼ Ð¿Ð¾Ð´ÑÐºÐ°Ð·ÐºÐ¸
		this.N[0].append(this.N[1]).append(this.N[2]).append(this.N[3]).append(this.N[4]).append(this.N[5]);
		setTooltip(this.N[0]);
		
		//-- Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ð½Ð° ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ñƒ
		this.B.append(this.C).append(this.S).append(this.P).append(this.N[0]);			
		this.B.appendTo('body');
	}
	//-- Construct | END
	
	//-- ÐžÑ‚ÐºÑ€Ñ‹Ñ‚ÑŒ ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ñƒ Ð² Ñ„Ñ€ÐµÐ¹Ð¼Ðµ
	this.open = function(page, mode) 
	{
		this.fOpen = true;
		
		Frame.TopNav.close(true);
		Frame.PlanetMenu.close();
		
		var url = 'game.php?page=' + page;
		
		if(mode !== undefined)
			url += '&mode=' + mode;
		
		this.I.attr('src', url);
		this.Plon();
		this.B.show();
		this.BlurOn();
		//this.N[1].html(LNG['loading']);
	}	
	//-- Ð—Ð°ÐºÑ€Ñ‹Ñ‚ÑŒ Ñ„Ñ€ÐµÐ¹Ð¼
	this.close = function() 
	{
		this.fOpen = false
		this.B.hide();
		this.I.attr('src', '');
		this.BlurOff();
		this.N[1].html('');
		
		Frame.refresh();
	}	
	//-- ÐžÐ±Ð½Ð¾Ð²Ð¸Ñ‚ÑŒ Ñ„Ñ€ÐµÐ¹Ð¼ Ð´Ð»Ñ Ð½Ð¾Ð²Ð¾Ð¹ Ð¿Ð»Ð°Ð½ÐµÑ‚Ñ‹
	this.setCP = function(cp) 
	{
		//this.N[1].html(LNG['loading']);
		//this.I.attr('src', this.I.attr('src')+'&cp='+cp);		
		window.iframe.location.href = delPrm(window.iframe.location.href, 'cp') + '&cp=' + cp;
		
	}
	//-- Ð Ð°Ð·Ð¼Ñ‹Ñ‚Ð¸Ðµ Ð¾Ð±Ð·Ð¾Ñ€Ð°
	//-- -- Ð Ð°Ð·Ð¼Ñ‹Ñ‚Ð¸Ðµ On
	this.BlurOn = function() 
	{		
		this.O.addClass('blur');
	}
	//-- -- Ð Ð°Ð·Ð¼Ñ‹Ñ‚Ð¸Ðµ Off
	this.BlurOff = function() 
	{		
		if(!this.fOpen)
			this.O.removeClass('blur');
	}
	//-- ÐŸÑ€Ð¸Ð»Ð¾Ð°Ð´Ð¸Ð½Ð³
	this.Plon = function() 
	{
		if(this.fOpen)
			this.P.show();
	}
	this.Ploff = function() 
	{
		if(this.fOpen)
			this.P.hide();
	}
};
//-- -- TopNav
function classTopNav()
{	
	this.Data		= {};
	this.D			= {};
	this.curOpen 	= 0;
	
	//-- Construct | START
	this.construct = function()
	{	
		this.DOM			= $('#menu-tn');
		
		this.D['msg']		= this.DOM.find('.i-messag .new-n:first');
		this.D['s']			= this.DOM.find('#menu-s');
		this.D['s_a']		= this.D['s'].find('.i-mis1:first');
		this.D['s_d']		= this.D['s'].find('.i-mis9:first');
		
		this.D['l']			= this.DOM.find('#menu-l');
		this.D['l-c']		= this.D['l'].find('.menu-l-c:first');
		this.D['l-p1']		= this.D['l'].find('.menu-l-p1:first');
		this.D['l-p2']		= this.D['l'].find('.menu-l-p2:first');
		
		if(GM)
		this.D['mgm']		= this.DOM.find('.i-support .new-n:first');
		
		this.A	= $('<audio id="beepataks" preload="auto"><source src="./styles/resource/sound/sirena.mp3"></source><source src="./styles/resource/sound/sirena.ogg"></source></audio>');
		this.A[0].volume = SoundAtaks / 10;
		this.A.appendTo('body');
	}
	//-- Construct | END
	
	//-- ÐžÑ‚ÐºÑ€Ñ‹Ñ‚ÑŒ ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ñƒ Ð² Ñ„Ñ€ÐµÐ¹Ð¼Ðµ
	this.open = function(id) 
	{
		this.close(false);
		
		if(id == this.curOpen)
			this.curOpen = 0;
		else if(this.curOpen != id)
		{
			this.DOM.find('#tn-l-' + id).show();
			this.curOpen = id;
		}
	}
	this.close = function(flag)
	{
		if(this.curOpen != 0)
			this.DOM.find('#tn-l-' + this.curOpen).hide();		
		else if(flag)
		{
			this.curOpen = 0;
		}
	}
	//-- ÐŸÐ¾Ð»ÑƒÑ‡Ð°ÐµÐ¼ Ð´Ð°Ð½Ð½Ñ‹Ðµ
	this.setData = function(data) 
	{	
		this.Data = data;
		
		//console.log(data);
				
		//-- Ð¡Ð¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ
		if(data.M !== undefined)
		{	
			if(data.M != 0)
				this.D['msg'].text(data.M).show();
			else
				this.D['msg'].hide();
		}
		//-- Ð¢Ð¸ÐºÐµÑ‚Ñ‹
		if(GM && data.GM !== undefined)
		{
			if(data.GM != 0)
				this.D['mgm'].text(data.GM).show();
			else
				this.D['mgm'].hide();
		}
		//-- Ð¤Ð»Ð¾Ñ‚Ð°
		if(data.F !== undefined)
		{
			//-- Ð¡Ð¸Ð³Ð½Ð°Ð»
			if(data.F.a > 0)
			{
				this.D['s_a'].addClass('menu-s-i-a tooltip');
				this.D['s_a'].data('tooltip-content', GetDayRestFullTimeFormat(data.F.at));
			}
			else
				this.D['s_a'].removeClass('menu-s-i-a tooltip');
				
			if(data.F.d > 0)
			{
				this.D['s_d'].addClass('menu-s-i-a tooltip');
				this.D['s_d'].data('tooltip-content', GetDayRestFullTimeFormat(data.F.dt));
			}
			else
				this.D['s_d'].removeClass('menu-s-i-a tooltip');
				
			//-- ÐŸÐ¾Ð´ÑÐºÐ°Ð·ÐºÐ¸
			setTooltip(this.D['s']);
						
			//-- Ð¡Ð¸Ñ€ÐµÐ½Ð°
			if((data.F.a != 0) && (data.F.a != Frame.fAttack || (data.F.at > 55 && data.F.at < 65)))
			{
				this.A[0].volume = SoundAtaks / 10;
				this.A[0].play();
			}
			if((data.F.d != 0) && (data.F.d != Frame.fDestr || (data.F.dt > 55 && data.F.dt < 65)))
			{
				this.A[0].volume = SoundAtaks / 10;
				this.A[0].play();
			}
			/*
			if(Frame.fAttack + Frame.fDestr == 0 && data.F.a + data.F.d > 0)
			{
				this.D['s'].unbind('click');
				this.D['s'].click(function(){Frame.IFrame.open('fleetTable&attack=1')});
			}
			else if(Frame.fAttack + Frame.fDestr > 0 && data.F.a + data.F.d == 0)
			{
				this.D['s'].unbind('click');
				this.D['s'].click(function(){Frame.IFrame.open('fleetTable')});				
			}
			*/
			
			Frame.fAttack 	= data.F.a;
			Frame.fDestr 	= data.F.d;
			
			//-- ÐšÐ¾Ð»-Ð²Ð¾ Ð»ÐµÑ‚ÑÑ‰Ð¸Ñ… Ñ„Ð»Ð¾Ñ‚Ð¾Ð²
			Frame.PlanetData.FleetC = data.F.c;
			Frame.PlanetData.setFleet();
			
			//-- ÐšÐ¾Ð»-Ð²Ð¾ Ð»ÐµÑ‚ÑÑ‰Ð¸Ñ… Ð­ÐºÑÐ¿ÐµÐ´Ð¸Ñ†Ð¸Ð¹
			Frame.Events.expedC = data.F.e;
			Frame.Events.TimeE 	= data.F.et;
			Frame.Events.setExped();
			
			//-- ÐžÑ‚Ð¿Ñ€Ð°Ð²Ð»ÑÐµÐ¼ Ñ„Ð»Ð¾Ñ‚Ð° Ð² Ð¿Ð»Ð°Ð½ÐµÑ‚ Ð¼ÐµÐ½ÑŽ
			Frame.PlanetMenu.setFleetData(data.F.no);
			//-- ÐžÐ±Ð½Ð¾Ð²Ð»ÑÐµÐ¼ Ð¸Ð½Ð´Ð¸ÐºÐ°Ñ‚Ð¾Ñ€Ñ‹ ÐµÑÐ»Ð¸ Ð¼ÐµÐ½ÑŽ Ð¾Ñ‚ÐºÑ€Ñ‹Ñ‚Ð¾
			if(Frame.PlanetMenu.fOpen)
				Frame.PlanetMenu.setFleetInd();
		}
	}
	this.setL = function(data) 
	{	
		//this.D['l-c']		= this.D['l'].find('.menu-l-c:first');
		//this.D['l-p1']	= this.D['l'].find('.menu-l-p1:first');
		//this.D['l-p2']	= this.D['l'].find('.menu-l-p2:first');
		
		this.D['l'].data('tooltip-content', data[1] + ' / ' + data[2]);
		setTooltip(this.DOM);
		
		this.D['l-c'].text(data[0]);
		var p = data[1] / data[2] * 100;
		
		if(p > 70)
		{
			this.D['l-p1'].width('100%');
			this.D['l-p2'].width(((p - 70) / 30 * 100)+'%');
		}
		else
		{
			this.D['l-p1'].width((p / 70 * 100)+'%');
			this.D['l-p2'].width('0%');
		}
	}
};
//-- -- ResNav
function classResNav()
{
	this.r = {901:{}, 902:{}, 903:{}, 911:{}, 921:{}, 931:{}};
	this.p = {901:[0,0,0], 902:[0,0,0], 903:[0,0,0], 911:[0,0,0], 921:[0,0,0], 931:[0,0,0], 942:[0,0,0]};
	/*
	 * 0 - ÐšÐ¾Ð»0-Ð²Ð¾
	 * 1 - ÐœÐ°ÐºÑÐ¸Ð¼ÑƒÐ¼
	 * 2 - Ð’Ñ‹Ñ€Ð°Ð±Ð¾Ñ‚ÐºÐ° Ð² ÑÐµÐºÑƒÐ½Ð´Ñƒ
	*/

	//-- Construct | START
	this.construct = function()
	{	
		this.DOM	= $('#menu-rn');
		//-- 901
		this.r[901]['full'] 	= this.DOM.find('#res-901');
		this.r[901]['filling'] 	= this.r[901]['full'].find('.rn-block-filling:first');
		this.r[901]['count'] 	= this.r[901]['full'].find('.rn-block-count:first');
		this.r[901]['percent'] 	= this.r[901]['full'].find('.rn-block-percent:first');
		//-- 902
		this.r[902]['full'] 	= this.DOM.find('#res-902');
		this.r[902]['filling'] 	= this.r[902]['full'].find('.rn-block-filling:first');
		this.r[902]['count'] 	= this.r[902]['full'].find('.rn-block-count:first');
		this.r[902]['percent'] 	= this.r[902]['full'].find('.rn-block-percent:first');
		//-- 903
		this.r[903]['full'] 	= this.DOM.find('#res-903');
		this.r[903]['filling'] 	= this.r[903]['full'].find('.rn-block-filling:first');
		this.r[903]['count'] 	= this.r[903]['full'].find('.rn-block-count:first');
		this.r[903]['percent'] 	= this.r[903]['full'].find('.rn-block-percent:first');
		//-- 911
		this.r[911]['full'] 	= this.DOM.find('#res-911');
		this.r[911]['filling'] 	= this.r[911]['full'].find('.rn-block-filling:first');
		this.r[911]['count'] 	= this.r[911]['full'].find('.rn-block-count:first');
		this.r[911]['percent'] 	= this.r[911]['full'].find('.rn-block-percent:first');	
		//-- 921
		this.r[921]['count'] 	= $('#current-921');
		//-- 931
		this.r[931]['count'] 	= $('#current-931');
	}
	//-- Construct | END
	
	//-- Ð£ÑÑ‚Ð¾Ð²ÐºÐ° Ð´Ð°Ð½Ð½Ñ‹Ñ…
	//-- -- ÐžÐ±Ñ‰Ð¸Ðµ Ð´Ð°Ð½Ð½Ñ‹Ðµ
	this.setData = function(data) 
	{
		this.p = data;
		//-- ÐžÐ±Ð½Ð¾Ð²Ð»ÑÐµÐ¼ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ñ
		this.sR(901);
		this.sR(902);
		this.sR(903);
		this.sR(921);
		this.sR(931);	
		this.sRE();
		//-- Ð”Ð°Ð½Ð½Ñ‹Ðµ Ð¿Ð¾ ÑƒÑ€Ð¾Ð²Ð½ÑŽ
		Frame.TopNav.setL(data.level);
	}
	this.sRE = function() 
	{
		var p = '0%';
		var e = this.p[911][0] + this.p[911][1];		
		this.r[911]['count'].text(NumberGetHumanReadable(e));		
		
		
		var tcontent = "<div class='tip-title'>"+this.p[911][3]+"</div>";
		
		tcontent += "<div class='tip-text'>"+LNG['farme_text'][5]+": <span class='c-911'>"+NumberGetHumanReadable(this.p[911][0])+"</span></div>";
		tcontent += "<div class='tip-text'>"+LNG['farme_text'][6]+": <span class='c-red'>"+NumberGetHumanReadable(this.p[911][1])+"</span></div>";
		
		if(e != 0)
			if(e > 0)
			{
				p = Math.min(100, Math.round( e / this.p[911][0] * 100))+'%';		
				this.r[911]['filling'].width(p).css({'left': 0, 'right': 'auto'});
				this.r[911]['count'].css('color', 'inherit');
				tcontent += "<div class='tip-text'>"+LNG['farme_text'][7]+": +"+p+"</div>";
			}
			else
			{
				p = Math.min(999, Math.round( e / this.p[911][1] * 100))+'%';
				this.r[911]['filling'].width(p).css({'left': 'auto', 'right': 0});
				this.r[911]['count'].css('color', 'red');
				tcontent += "<div class='tip-text'>"+LNG['farme_text'][7]+": +0%</div>";
			}
		else
			this.r[911]['filling'].width(p);
		
		this.r[911]['full'].data('tooltip-content', tcontent);
		this.r[911]['percent'].text('[ ' + p + ' ]');		
	}
	
	//-- ÐžÐ±Ñ‰Ð¸Ðµ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸
	//-- -- ÐŸÐ¾Ð»ÑƒÑ‡Ð¸Ñ‚ÑŒ ÐºÐ¾Ð»-Ð²Ð¾ Ñ€ÐµÑÑƒÑ€ÑÐ¾Ð²
	this.gR = function(id) 
	{
		return this.p[id][0];
	}
	//-- -- Ð”Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ Ñ€ÐµÑÑƒÑ€ÑÐ¾Ð²
	this.aR = function(id, count) 
	{	
		//-- Ð›Ð¸Ð¼Ð¸Ñ‚ Ñ€ÐµÑÑƒÑ€ÑÐ¾Ð² 	
		if(isNaN(count) || count == 0)
			return false;
		
		//-- Ð›Ð¸Ð¼Ð¸Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ
		if(this.p[id][1] != 0)
			if(this.p[id][1] > this.p[id][0])
				count = Math.min(count, this.p[id][1] - this.p[id][0]);
			else
				count = 0;
		
		//-- ÐÐ°Ñ‡Ð°Ð»ÑŒÐ½Ð¾Ðµ Ñ‡Ð¸ÑÐ»Ð¾ Ñ€ÐµÑÑƒÑ€ÑÐ°
		var startRes = this.p[id][0];
		
		//-- Ð”Ð¾Ð±Ð°Ð²Ð»ÑÐµÐ¼
		this.p[id][0] += count;
		
		//-- ÐšÐ¾Ð½ÐµÑ‡Ð½Ð¾Ðµ Ñ‡Ð¸ÑÐ»Ð¾ Ñ€ÐµÑÑƒÑ€ÑÐ°
		var endRes = Math.floor(this.p[id][0]);
			
		//-- ÐÑƒÐ¶Ð½Ð¾Ð»Ð¸ Ð¸Ð·Ð¼ÐµÐ½ÑÑ‚ÑŒ?
		if(startRes < endRes)
			this.sR(id);

		return true;
	}	
	//-- -- Ð’Ð¸Ð·ÑƒÐ°Ð»ÑŒÐ½Ð¾ Ð¾Ñ‚Ð¾Ð±Ñ€Ð°Ð·Ð¸Ñ‚ÑŒ Ñ€ÐµÑÑƒÑ€ÑÑ‹
	this.sR = function(id) 
	{	
		this.r[id]['count'].text(NumberGetHumanReadable(this.p[id][0]));
					
		//-- ÐžÑ‚Ð¾Ð±Ñ€Ð°Ð¶Ð°ÐµÐ¼ Ð·Ð°Ð¿Ð¾Ð»Ð½ÐµÐ½Ð¾ÑÑ‚ÑŒ
		if(this.p[id][1] != 0)
		{
			var p = String(Math.min(100, Math.round(this.p[id][0] / this.p[id][1] * 100)))+'%';
			this.r[id]['filling'].width(p);
			this.r[id]['percent'].text('[ ' + p + ' ]');			

			var tcontent = "<div class='tip-title'>"+this.p[id][3]+"</div>";
			
			tcontent += "<div class='tip-text'>"+LNG['farme_text'][1]+": "+NumberGetHumanReadable(this.p[id][1])+".</div>";
			
			if(this.p[id][2])
			{
				tcontent += "<div class='tip-text'>"+LNG['farme_text'][0]+": "+NumberGetHumanReadable(Math.round(this.p[id][2] * 3600))+" "+LNG['lng_time']['h']+".</div>";
				
				if(this.p[id][1] > this.p[id][0])
				{
					var t = Math.round((this.p[id][1] - this.p[id][0]) / this.p[id][2]);
					tcontent += "<div class='tip-text'>"+LNG['farme_text'][2]+": "+GetDayRestFullTimeFormat(t)+".</div>";
				}
			}
			this.r[id]['full'].data('tooltip-content', tcontent);
		}
	}
	
	//-- -- Ð—Ð°Ð¿ÑƒÑÐº ÐŸÑ€Ð¾Ð´ÑƒÐºÑ†Ð¸Ð¸
	this.sP = function(id) 
	{	
		this.aR(id, this.p[id][2]);
	}
};
//-- -- MainQueue
function classMainQueue()
{	
	this.QB 	= {};
	this.QS 	= {};
	this.QR 	= {};

	//-- Construct | START
	this.construct = function()
	{	
		var AllDOM	= $('#ov-queue-mount');
		//-- Build
		this.QB['block']	= $('<div class="queue-block" onClick="Frame.IFrame.open(\'buildings\');"><div class="queue-img tooltip" data-tooltip-content=""></div><div class="queue-level"></div></div>');
		this.QB['status'] 	= AllDOM.find('.c-qb .ov-queue-status:first');
		this.QB['box']		= AllDOM.find('#ov-queue-build');
		//-- -- big block
		this.QB['b_b'] 		= this.QB['box'].find('.queue-block-big:first');		
		this.QB['b_b_a'] 	= this.QB['b_b'].find('.queue-arr-left:first');
		this.QB['b_b_s'] 	= this.QB['b_b'].find('.queue-text:first');
		this.QB['b_b_t'] 	= this.QB['b_b'].find('.queue-time:first');
		this.QB['b_b_p'] 	= this.QB['b_b'].find('.queue-p:first');
		this.QB['b_b_c'] 	= this.QB['b_b'].find('.queue-btn-complete:first');		
		this.QB['b_b_d'] 	= this.QB['b_b_c'].find('.queue-btn-complete-c:first');
		this.QB['b_b_b'] 	= this.QB['block'].clone();
		this.QB['b_b'].append(this.QB['b_b_b']);
		//-- -- blocks
		this.QB['b_a']		= this.QB['box'].find('.queue-block-big + .i-arr-l:first');
		//-- -- ÑÐ¾Ð·Ð´Ð°ÐµÐ¼ Ð¼Ð°ÐºÑÐ¸Ð¼ÑƒÐ¼ Ð±Ð»Ð¾ÐºÐ¾Ð²
		for(i = 1; i <= maxQ; i++)
		{
			this.QB['b_'+i]	= this.QB['block'].clone();
			this.QB['box'].append(this.QB['b_'+i])
		}
		
		//-- shipyard
		this.QS['block']	= $('<div class="queue-block" onClick="Frame.IFrame.open(\'shipyard\');"><div class="queue-img tooltip" data-tooltip-content=""></div><div class="queue-count"></div></div>');
		this.QS['status'] 	= AllDOM.find('.c-qs .ov-queue-status:first');
		this.QS['box']		= AllDOM.find('#ov-queue-shipyard');
		//-- -- big block
		this.QS['b_b'] 		= this.QS['box'].find('.queue-block-big:first');		
		this.QS['b_b_a'] 	= this.QS['b_b'].find('.queue-arr-left:first');
		this.QS['b_b_s'] 	= this.QS['b_b'].find('.queue-text:first');
		this.QS['b_b_t'] 	= this.QS['b_b'].find('.queue-time:first');
		this.QS['b_b_p'] 	= this.QS['b_b'].find('.queue-p:first');
		this.QS['b_b_c'] 	= this.QS['b_b'].find('.queue-btn-complete:first');
		this.QS['b_b_d'] 	= this.QS['b_b_c'].find('.queue-btn-complete-c:first');
		this.QS['b_b_b'] 	= this.QS['block'].clone();
		this.QS['b_b'].append(this.QS['b_b_b']);
		//-- -- blocks
		this.QS['b_a']		= this.QS['box'].find('.queue-block-big + .i-arr-l:first');
		//-- -- ÑÐ¾Ð·Ð´Ð°ÐµÐ¼ Ð¼Ð°ÐºÑÐ¸Ð¼ÑƒÐ¼ Ð±Ð»Ð¾ÐºÐ¾Ð²
		for(i = 1; i <= maxQ; i++)
		{
			this.QS['b_'+i]	= this.QS['block'].clone();
			this.QS['box'].append(this.QS['b_'+i])
		}

		//-- research
		this.QR['block']	= $('<div class="queue-block" onClick="Frame.IFrame.open(\'research\');"><div class="queue-img tooltip" data-tooltip-content=""></div><div class="queue-level"></div></div>');
		this.QR['status'] 	= AllDOM.find('.c-qr .ov-queue-status:first');
		this.QR['box']		= AllDOM.find('#ov-queue-research');
		//-- -- big block
		this.QR['b_b'] 		= this.QR['box'].find('.queue-block-big:first');		
		this.QR['b_b_a'] 	= this.QR['b_b'].find('.queue-arr-left:first');
		this.QR['b_b_s'] 	= this.QR['b_b'].find('.queue-text:first');
		this.QR['b_b_t'] 	= this.QR['b_b'].find('.queue-time:first');
		this.QR['b_b_p'] 	= this.QR['b_b'].find('.queue-p:first');
		this.QR['b_b_c'] 	= this.QR['b_b'].find('.queue-btn-complete:first');
		this.QR['b_b_d'] 	= this.QR['b_b_c'].find('.queue-btn-complete-c:first');		
		this.QR['b_b_b'] 	= this.QR['block'].clone();
		this.QR['b_b'].append(this.QR['b_b_b']);
		
		setTooltip(AllDOM);
	}
	//-- Construct | END
	
	//-- Ð·Ð°Ð²ÐµÑ€ÑˆÐµÐ½Ð¸Ðµ
	this.complete = function(x)
	{
		var P = {};
		switch(x){
			case 'b':
			{
				P = {'frame': 1, "cmd":"complete", "listid": 0, "building": this.QB['q'][0]['element'], "level": this.QB['q'][0]['level']};
				Frame.Ajax.p('./game.php?page=buildings', P, Frame.Ajax.FullRev);
				break;
			}
			case 's':
			{
				P = {'frame': 1, "action":"complete", "listid": 1, "building": this.QS['data']['queue'][0][3]};
				Frame.Ajax.p('./game.php?page=shipyard', P, Frame.Ajax.FullRev);
				break;
			}
			case 'r':
			{
				P = {'frame': 1, "cmd":"complete", "tech": this.QR['q']['id']};
				Frame.Ajax.p('./game.php?page=research', P, Frame.Ajax.FullRev);
				break;
			}
		}
	}
	//-- Ð£ÑÑ‚Ð¾Ð²ÐºÐ° Ð´Ð°Ð½Ð½Ñ‹Ñ…
	//-- -- Build
	this.setQB = function(data) 
	{	
		var Queue = this.QB['q'] = data['queue'];
		
		this.QB['status'].text(data['status'][0]+'/'+data['status'][1]);
		
		//-- Ð¡ÐºÑ€Ñ‹Ð²Ð°ÐµÐ¼ Ð²ÑÐµ
		//-- -- big bloc
		this.QB['b_b_a'].hide();
		this.QB['b_b_s'].hide();
		this.QB['b_b_t'].hide();
		this.QB['b_b_c'].hide();
		this.QB['b_b_b'].hide();
		this.QB['b_b_p'].width(0);
		//-- -- blocks		
		this.QB['b_a'].hide();		
		//-- -- Ð¡ÐºÑ€Ñ‹Ð²Ð°ÐµÐ¼ Ð²ÑÐµ Ð±Ð»Ð¾ÐºÐ¸		
		for(i = 1; i <= maxQ; i++) 
			this.QB['b_'+i].hide();
		
		//-- ÐžÑ‡ÐµÑ€ÐµÐ´ÑŒ Ð¿ÑƒÑÑ‚Ð°
		if(Queue.length == 0)
		{
			this.QB['b_b_a'].show();
			this.QB['b_b_s'].show();
			this.setBa(this.QB['b_b_b']);
			return false;
		}
				
		//-- -- big block		
		this.QB['b_b_c'].show();
		this.QB['b_b_t'].show();
		
		//-- -- ÐšÐ½Ð¾Ð¿ÐºÐ° "Ð—Ð°Ð²ÐµÑ€Ñ‰Ð¸Ñ‚ÑŒ"	
		if(Queue[0]['destroy'])
			var text = LNG['bd_complete_w']['d'];
		else
			var text = LNG['bd_complete_w']['b'];
		
		text  +='<br />'+ Queue[0]['name'] +' ('+ Queue[0]['level'] +' '+ LNG['lvl'] +')?';
		
		this.QB['b_b_c'].unbind().click({Confirm}, function(){
			Confirm.cost(
				LNG['lm_buildings'], 									
				text,
				NumberGetHumanReadable(Queue[0]['cost']), 
				'Frame.Queue.complete("b");', 
				921
			);		
		});
		
		this.setBb(this.QB['b_b_b'], Queue[0]['element'], Queue[0]['level'], Queue[0]['name']);		
		
		if(data['status'][1] == 1)// Ð²Ñ‹Ñ…Ð¾Ð´Ð¸Ð¼ Ð¾Ñ‡ÐµÑ€ÐµÐ´ÑŒ Ð¿Ð¾Ð»Ð½Ð°	
			return false;
			
		this.QB['b_a'].show();
		
		//-- ÐŸÑ€Ð¾Ð²ÐµÑ€ÑÐµÐ¼ Ð²ÑÐµ Ð±Ð»Ð¾ÐºÐ¸		
		for(i = 1; i <= maxQ; i++) 
		{
			//-- -- ÐžÐ±Ñ€Ð°Ð±Ð¾Ñ‚ÐºÐ° Ð´Ð¾Ð¿. Ð±Ð»Ð¾ÐºÐ¾Ð²
			if(data['status'][1] == i)// Ð²Ñ‹Ñ…Ð¾Ð´Ð¸Ð¼ Ð¾Ñ‡ÐµÑ€ÐµÐ´ÑŒ Ð¿Ð¾Ð»Ð½Ð°	
				return false;	
			
			//-- -- Ð² Ð¾Ñ‡ÐµÑ€ÐµÐ´Ð¸ Ð¼ÐµÐ½ÑŒÑˆÐµ i
			if(Queue.length == i)  
			{				
				this.setBa(this.QB['b_'+i]);
				return false;
			}
			
			//-- -- i-Ð¹ Ð±Ð»Ð¾Ðº | Ð·Ð°Ð½ÑÑ‚
			this.setBb(this.QB['b_'+i], Queue[i]['element'], Queue[i]['level'], Queue[i]['name']);
		}

		return false;
	}
	//-- -- Build Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Add Ð±Ð»Ð¾ÐºÐ°
	this.setBa = function(b) 
	{
		b.find('.queue-img:first').attr('class', 'queue-img i-add').data('tooltip-content', '');
		b.find('.queue-level:first').text('');	
		b.show();
	}
	//-- -- Build Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ð—Ð°Ð½ÑÑ‚Ð¾Ð³Ð¾ Ð±Ð»Ð¾ÐºÐ°
	this.setBb = function(b,i,c,n) 
	{
		b.find('.queue-img:first').attr('class', 'queue-img i-u' + i).data('tooltip-content', n);
		b.find('.queue-level:first').text(c);
		b.show();
	}
	//-- -- Build Timer
	this.TB = function() 
	{
		if(this.QB['q'] === undefined || this.QB['q'].length == 0)
			return false;
			
		this.QB['q'][0]['resttime']--;
		
		if(this.QB['q'][0]['resttime'] <= 0)
		{	
			if(!Frame.IFrame.fOpen)		
				Frame.refresh();
			return false;
		}
		
		this.QB['b_b_t'].text(GetDayRestFullTimeFormat(this.QB['q'][0]['resttime']));
		this.QB['b_b_d'].text(NumberGetHumanReadable(this.QB['q'][0]['cost']));
		this.QB['b_b_p'].width((100 - Math.min(1, ((this.QB['q'][0]['resttime']+1) / this.QB['q'][0]['time'])) * 100)+'%');
	}
	
	//-- -- Shipyard
	this.setQS = function(data) 
	{
		if(data != undefined)
			this.QS['data'] = data;
		
		this.QS['status'].text(this.QS['data']['status'][0]+'/'+this.QS['data']['status'][1]);
		
		//-- Ð¡ÐºÑ€Ñ‹Ð²Ð°ÐµÐ¼ Ð²ÑÐµ
		//-- -- big bloc
		this.QS['b_b_a'].hide();
		this.QS['b_b_s'].hide();
		this.QS['b_b_t'].hide();
		this.QS['b_b_c'].hide();
		this.QS['b_b_b'].hide();
		this.QS['b_b_p'].hide().width(0).show();
		
		//-- -- blocks
		this.QS['b_a'].hide();
		//-- -- Ð¡ÐºÑ€Ñ‹Ð²Ð°ÐµÐ¼ Ð²ÑÐµ Ð±Ð»Ð¾ÐºÐ¸		
		for(i = 1; i <= maxQ; i++) 
			this.QS['b_'+i].hide();
		
		var Queue = this.QS['data']['queue'];
		
		//-- ÐžÑ‡ÐµÑ€ÐµÐ´ÑŒ Ð¿ÑƒÑÑ‚Ð°
		if(Queue.length == 0)
		{
			this.QS['b_b_a'].show();
			this.QS['b_b_s'].show();
			this.setSa(this.QS['b_b_b']);
			return false;
		}
				
		//-- -- big block		
		this.QS['b_b_c'].show();
		this.QS['b_b_t'].show();
		
		//-- -- ÐšÐ½Ð¾Ð¿ÐºÐ° "Ð—Ð°Ð²ÐµÑ€Ñ‰Ð¸Ñ‚ÑŒ"
		var text = LNG['bd_complete_w']['s'] + '<br />'+ Queue[0][0] +' ('+ NumberGetHumanReadable(Queue[0][1]) +')?';
		
		this.QS['b_b_c'].unbind().click({Confirm}, function(){
			Confirm.cost(
				LNG['lm_shipshard'], 									
				text,
				NumberGetHumanReadable(Queue[0][4]), 
				'Frame.Queue.complete("s");', 
				921
			);		
		});
		
		this.setSb(this.QS['b_b_b'], Queue[0][3], Queue[0][1], Queue[0][0]);
		this.QS['b_b_t'].html(GetDayRestFullTimeFormat(Math.max(1, this.QS['data']['queue'][0][1] * this.QS['data']['queue'][0][2] - this.QS['data']['b'])));
		this.QS['b_b_d'].text(NumberGetHumanReadable(this.QS['data']['queue'][0][4]));
		
		//-- -- ÐžÐ±Ñ€Ð°Ð±Ð¾Ñ‚ÐºÐ° Ð´Ð¾Ð¿. Ð±Ð»Ð¾ÐºÐ¾Ð²
		if(this.QS['data']['status'][1] == 1)// Ð²Ñ‹Ñ…Ð¾Ð´Ð¸Ð¼ Ð¾Ñ‡ÐµÑ€ÐµÐ´ÑŒ Ð¿Ð¾Ð»Ð½Ð°	
			return false;
			
		this.QS['b_a'].show();		
		
		//-- ÐŸÑ€Ð¾Ð²ÐµÑ€ÑÐµÐ¼ Ð²ÑÐµ Ð±Ð»Ð¾ÐºÐ¸		
		for(i = 1; i <= maxQ; i++) 
		{
			//-- -- ÐžÐ±Ñ€Ð°Ð±Ð¾Ñ‚ÐºÐ° Ð´Ð¾Ð¿. Ð±Ð»Ð¾ÐºÐ¾Ð²
			if(this.QS['data']['status'][1] == i)// Ð²Ñ‹Ñ…Ð¾Ð´Ð¸Ð¼ Ð¾Ñ‡ÐµÑ€ÐµÐ´ÑŒ Ð¿Ð¾Ð»Ð½Ð°	
				return false;	
			
			//-- -- Ð² Ð¾Ñ‡ÐµÑ€ÐµÐ´Ð¸ Ð¼ÐµÐ½ÑŒÑˆÐµ i
			if(Queue.length == i)  
			{
				this.setSa(this.QS['b_'+i]);
				return false;
			}
			
			this.setSb(this.QS['b_'+i], Queue[i][3], Queue[i][1], Queue[i][0]);
		}

		return false;
	}
	//-- -- Shipyard Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Add Ð±Ð»Ð¾ÐºÐ°
	this.setSa = function(b) 
	{
		b.find('.queue-img:first').attr('class', 'queue-img i-add').data('tooltip-content', '');
		b.find('.queue-count:first').text('');			
		b.show();
	}
	//-- -- Shipyard Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ð—Ð°Ð½ÑÑ‚Ð¾Ð³Ð¾ Ð±Ð»Ð¾ÐºÐ°
	this.setSb = function(b,i,c,n) 
	{
		b.find('.queue-img:first').attr('class', 'queue-img i-u' + i).data('tooltip-content', n);
		b.find('.queue-count:first').text(NumberGetHumanReadable(c));
		b.show();
	}
	//-- -- Shipyard Timer
	this.TS = function() 
	{
		if(this.QS['data']['queue'] === undefined || this.QS['data']['queue'].length == 0)
			return false;
		
		this.QS['data']['b']++;
		
		if(this.QS['data']['b'] >= this.QS['data']['queue'][0][2]) //-- 1-Ñ†Ð° Ð¿Ð¾ÑÑ‚Ñ€Ð¾ÐµÐ½Ð°
		{
			this.QS['data']['b'] = 0;
			
			var count = 1;
			if(this.QS['data']['queue'][0][2] < 1)
				count = 1 / this.QS['data']['queue'][0][2];
			
			if(this.QS['data']['queue'][0][1] > count) //-- ÐÐ°Ñ‡Ð°Ñ‚ÑŒ Ð½Ð¾Ð²ÑƒÑŽ
			{				
				this.QS['data']['queue'][0][1] -= count;
				this.QS['b_b_b'].find('.queue-count:first').text(NumberGetHumanReadable(this.QS['data']['queue'][0][1]));
			}
			else //-- ÐŸÐ°Ñ‡ÐºÐ° Ð¿Ð¾ÑÑ‚Ñ€Ð¾ÐµÐ½Ð° Ð¾Ð±Ð½Ð¾Ð²Ð»ÑÐµÐ¼ Ð´Ð°Ð½Ð½Ñ‹Ðµ
			{				
				this.QS['data']['status'][0]--;
				this.QS['data']['queue'].shift();
				this.setQS();
				return false;
			}
		}
		
		if(this.QS['data']['queue'][0][2] <= 1)
			i = 1;
		else if ((this.QS['data']['queue'][0][2] - this.QS['data']['b']) <= 1)
			i = this.QS['data']['queue'][0][2];
		else
			i = this.QS['data']['b'];
				
		this.QS['b_b_t'].html(GetDayRestFullTimeFormat(Math.max(1, this.QS['data']['queue'][0][1] * this.QS['data']['queue'][0][2] - this.QS['data']['b'])));	
		this.QS['b_b_p'].width((Math.min(1, (i / this.QS['data']['queue'][0][2])) * 100)+'%');
	}
	//-- -- Research
	this.setQR = function(data) 
	{		
		var Queue		= data['queue'];
		this.QR['q'] 	= data['queue'];
		this.QR['status'].text(NumberGetHumanReadable(data['status']));
		
		//-- Ð¡ÐºÑ€Ñ‹Ð²Ð°ÐµÐ¼ Ð²ÑÐµ
		//-- -- big bloc
		this.QR['b_b_a'].hide();
		this.QR['b_b_s'].hide();
		this.QR['b_b_t'].hide();
		this.QR['b_b_c'].hide();
		this.QR['b_b_b'].hide();
		
		//-- ÐžÑ‡ÐµÑ€ÐµÐ´ÑŒ Ð¿ÑƒÑÑ‚Ð°
		if(Queue.id == 0)
		{
			this.QR['b_b_a'].show();
			this.QR['b_b_s'].show();
			this.setRa(this.QR['b_b_b']);
			this.QR['b_b_p'].width(0);
			return false;
		}
		
		//-- -- ÐšÐ½Ð¾Ð¿ÐºÐ° "Ð—Ð°Ð²ÐµÑ€Ñ‰Ð¸Ñ‚ÑŒ"
		var text = LNG['bd_complete_w']['r'] + '<br />'+ Queue['name'] +' ('+ Queue['level'] +' '+ LNG['lvl'] +')?';
		
		this.QR['b_b_c'].unbind().click({Confirm, Queue}, function(){
			Confirm.cost(
				LNG['lm_research'], 									
				text,
				NumberGetHumanReadable(Queue['cost']), 
				'Frame.Queue.complete("r");', 
				921
			);		
		});
		
		//-- -- big block		
		this.QR['b_b_c'].show();
		this.QR['b_b_t'].show();
		this.setRb(this.QR['b_b_b'], Queue['id'], Queue['level'], Queue['name']);
		
		return false;
	}
	//-- -- Research Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Add Ð±Ð»Ð¾ÐºÐ°
	this.setRa = function(b) 
	{
		b.find('.queue-img:first').attr('class', 'queue-img i-add').data('tooltip-content', '');
		b.find('.queue-level:first').text('');			
		b.show();
	}
	//-- -- Research Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ð—Ð°Ð½ÑÑ‚Ð¾Ð³Ð¾ Ð±Ð»Ð¾ÐºÐ°
	this.setRb = function(b,i,c,n) 
	{
		b.find('.queue-img:first').attr('class', 'queue-img i-u' + i + 'b').data('tooltip-content', n);
		b.find('.queue-level:first').text(c);	
		b.show();
	}
	//-- -- Research Timer
	this.TR = function() 
	{
		if(this.QR['q'] === undefined || this.QR['q']['id'] == 0)
			return false;
			
		this.QR['q']['resttime']--;
		
		if(this.QR['q']['resttime'] <= 0)
		{	
			if(!Frame.IFrame.fOpen)		
				Frame.refresh();
			return false;
		}
		
		this.QR['b_b_t'].html(GetDayRestFullTimeFormat(this.QR['q']['resttime']));
		this.QR['b_b_d'].text(NumberGetHumanReadable(this.QR['q']['cost']));
		this.QR['b_b_p'].width((100 - Math.min(1, ((this.QR['q']['resttime']+1) / this.QR['q']['time'])) * 100)+'%');
	}
}
//-- -- PalnetMenu
function classPlanetMenu()
{
	this.FD		= {};	// Ð›ÐµÑ‚ÑÑ‰Ð¸Ð¹ Ñ‡ÑƒÐ¶Ð¾Ð¹ Ñ„Ð»Ð¾Ñ‚
	this.Data	= {}; 	// Ð»Ð¸ÑÑ‚
	this.Count	= 0;	// ÐšÐ¾Ð»-Ð²Ð¾ Ð¿Ð»Ð°Ð½ÐµÑ‚
	this.Cur	= 0;	// â„– Ð¿Ð»Ð°Ð½ÐµÑ‚Ñ‹
	
	
	//-- flags
	this.fOpen		= false; // ÑÐ¿Ð¸ÑÐ¾Ðº Ð¾Ñ‚ÐºÑ€Ñ‹Ñ‚?
	this.fMoon		= false; // Ð½Ð° Ð»ÑƒÐ½Ðµ?
	this.fList		= false; // Ð»Ð¸ÑÑ‚ ÑÑ„Ð¾Ñ€Ð¼ÐµÑ€Ð¾Ð²Ð°Ð½?
	//-- Construct | START
	this.construct = function()
	{	
		this.F	= $('<div id="pl-fool"></</div>');
		this.B	= $('<div id="pl-box"></</div>');
		this.L	= $('<div id="pl-l"></div>');
		//this.C	= $('<div id="pl-close">&times;</div>');
			
		this.F.click(function(){Frame.PlanetMenu.close();});
		//this.C.click(function(){Frame.PlanetMenu.close();}); 
		
		this.B.append(this.L); //.append(this.C)
		this.F.append(this.B);
		this.F.appendTo('body');
	}
	//-- Construct | END
	
	//-- ÐžÑ‚ÐºÑ€Ñ‹Ñ‚ÑŒ
	this.open = function() 
	{
		if(this.Data == {})
			return false;
				
		if(!this.fList)
			this.createList();
		
		//-- Ð£ÑÑ‚Ð°Ð½Ð¾Ð²Ð¸Ñ‚ÑŒ Ð¸Ð½Ð´Ð¸ÐºÐ°Ñ†Ð¸ÑŽ Ð°Ñ‚Ð°Ðº
		this.setFleetInd();
		
		this.fOpen		= true;
		this.F.stop(true, true).show();
		Frame.IFrame.BlurOn();
	}	
	//-- Ð—Ð°ÐºÑ€Ñ‹Ñ‚ÑŒ
	this.close = function() 
	{
		this.fOpen		= false;
		this.F.stop(true, true).hide();
		Frame.IFrame.BlurOff();
	}
	//-- ÐžÑ‚ÐºÑ€Ñ‹Ñ‚ÑŒ / Ð—Ð°ÐºÑ€Ñ‹Ñ‚ÑŒ	
	this.openToggle = function() 
	{
		if(this.fOpen)
			this.close();
		else
			this.open();
	}
	
	//-- Ð¡Ð»ÐµÐ´ÑƒÑŽÑ‰Ð°Ñ Ð¿Ð»Ð°Ð½ÐµÑ‚Ð°
	this.next = function() 
	{
		if(this.Count == 1 && this.Data[0]['id_luna'] == 0)
			return false;
		
		//-- Ð˜Ð´ÐµÐ¼ Ð½Ð° Ð»ÑƒÐ½Ñƒ
		if(!this.fMoon && this.Data[this.Cur]['id_luna'] != 0)
		{
			this.fMoon = true;
			Frame.refresh(this.Data[this.Cur]['id_luna']);
			return false;
		}
		
		//-- ÐšÐ¾Ð½ÐµÑ† ÑÐ¿Ð¸ÑÐºÐ° Ð¸Ð´ÐµÐ¼ Ðº Ð½ÑƒÐ»ÐµÐ²Ð¾Ð¹ Ð¿Ð»Ð°Ð½ÐµÑ‚Ðµ
		if(this.Count <= this.Cur + 1)
		{
			this.Cur 	= 0;		
		}
		//-- Ð¡Ð»ÐµÐ´ÑƒÑŽÑ‰Ð°Ñ Ð¿Ð»Ð°Ð½ÐµÑ‚Ð°
		else
		{
			this.Cur++;	
		}
		
		this.fMoon = false;
		Frame.refresh(this.Data[this.Cur]['id']);
	}
	//-- ÐŸÑ€ÐµÐ´Ñ‹Ð´ÑƒÑ‰Ð°Ñ Ð¿Ð»Ð°Ð½ÐµÑ‚Ð°
	this.prev = function() 
	{
		if(this.Count == 1 && this.Data[0]['id_luna'] == 0)
			return false;
		
		//-- Ð˜Ð´ÐµÐ¼ Ð»ÑƒÐ½Ñ‹ Ð½Ð° Ð¿Ð»Ð°Ð½ÐµÑ‚Ñƒ
		if(this.fMoon)
		{
			this.fMoon = false;
			Frame.refresh(this.Data[this.Cur]['id']);
			return false;
		}
		
		//-- ÐÐ°Ñ‡Ð°Ð»Ð¾ ÑÐ¿Ð¸ÑÐºÐ° Ð¸Ð´ÐµÐ¼ Ðº Ð¿Ð¾ÑÐ»ÐµÐ´Ð½ÐµÐ¹ Ð¿Ð»Ð°Ð½ÐµÑ‚Ðµ
		if(this.Cur <= 0)
		{
			this.Cur = this.Count - 1;
		}
		//-- Ð¡Ð»ÐµÐ´ÑƒÑŽÑ‰Ð°Ñ Ð¿Ð»Ð°Ð½ÐµÑ‚Ð°
		else
		{				
			this.Cur--;	
		}
		
		//-- Ð˜Ð´ÐµÐ¼ Ð½Ð° Ð»ÑƒÐ½Ñƒ
		if(this.Data[this.Cur]['id_luna'] != 0)
		{
			this.fMoon = true;
			Frame.refresh(this.Data[this.Cur]['id_luna']);
			return false;
		}
		
		this.fMoon = false;
		Frame.refresh(this.Data[this.Cur]['id']);
	}
	
	//-- ÐžÐ±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ Ð´Ð°Ð½Ð½Ñ‹Ñ…
	this.setData = function(data)
	{
		this.Data 	= data;
		this.Count	= data.length;
		
		//-- flags
		this.fList	= false;
		
		for(i = 0; i < this.Count; i++)
		{
			//-- Ð¼Ñ‹ Ð½Ð° Ð¿Ð»Ð°Ð½ÐµÑ‚Ðµ
			if(this.Data[i]['id'] == CurPlanet)
			{
				this.Cur 		= i;
				this.fMoon		= false;
				//console.log('planeta');
				break;
			}
			//-- ÐœÑ‹ Ð½Ð° Ð»ÑƒÐ½Ðµ
			if(this.Data[i]['id_luna'] == CurPlanet)
			{
				this.Cur 		= i;
				this.fMoon		= true;
				//console.log('moon');
				break;
			}
		}		
		
		//-- ÐœÐµÐ½ÑŽ Ð¾Ñ‚ÐºÑ€Ñ‹Ñ‚Ð¾ | Ð¾Ð±Ð½Ð¾Ð²Ð¸Ñ‚ÑŒ
		if(this.fOpen)
			this.createList();
	}
	
	//-- Ð¡Ð¾Ð·Ð´Ð°ÐµÐ¼ ÑÐ¿Ð¸ÑÐ¾Ðº Ð¿Ð»Ð°Ð½ÐµÑ‚
	this.createList = function()
	{		
		var HTML = '';
		
		//-- Ð§Ð¸ÑÑ‚Ð¸Ð¼ ÑÐ¿Ð¸ÑÐ¾Ðº
		this.L.html('');
		
		for(i = 0; i < this.Count; i++)
		{
			var aClass = '';
			
			//-- Ð¼Ñ‹ Ð½Ð° Ð¿Ð»Ð°Ð½ÐµÑ‚Ðµ
			if(this.Data[i]['id'] == CurPlanet)		
				aClass = 'pl-block-p-a';

			//-- ÐœÑ‹ Ð½Ð° Ð»ÑƒÐ½Ðµ
			else if(this.Data[i]['id_luna'] == CurPlanet)
				aClass = 'pl-block-m-a';
				
			if(this.Data[i]['id_luna'] == 0)
				aClass += ' pl-block-one';
				
			//-- ÐžÐ±Ñ‰Ð¸Ð¹ Ð±Ð»Ð¾Ðº
			HTML += '<div class="pl-block '+aClass+'">';	
				
				//-- Ð¿Ð»Ð°Ð½ÐµÑ‚Ð°		
				HTML += '<div id="p'+this.Data[i]['id']+'" class="pl-block-p" onClick="Frame.refresh('+this.Data[i]['id']+')">';
				
					HTML += this.Data[i]['name']+'<br/><span>'+this.Data[i]['coord']+'</span>';
					
					if(this.Data[i]['build']['build'] !== undefined)
						HTML += '<div class="pl-i-b i-qb ri"></div>';					
					if(this.Data[i]['build']['hangar'] !== undefined)
						HTML += '<div class="pl-i-s i-qs ri"></div>';
						
				HTML += '</div>';	
				
				//-- Ð»ÑƒÐ½Ð°
				if(this.Data[i]['id_luna'] != 0)
				{
					//-- ÑÐµÐ¿Ð¾Ñ€Ð°Ñ‚Ð¾Ñ€					
					HTML += '<div class="pl-block-s"></div>';
					//-- Ð±Ð»Ð¾Ðº Ð»ÑƒÐ½Ñ‹
					HTML += '<div id="p'+this.Data[i]['id_luna']+'" class="pl-block-m" onClick="Frame.refresh('+this.Data[i]['id_luna']+')">';
					
						HTML += '<div class="pl-i-m i-moon ri"></div>';	
					
						if(this.Data[i]['moon']['Build'] !== undefined)
							HTML += '<div class="pl-i-b i-qb ri"></div>';					
						if(this.Data[i]['moon']['hangar'] !== undefined)
							HTML += '<div class="pl-i-s i-qs ri"></div>';
							
					HTML += '</div>';
				}
			
			HTML += '<div class="clear"></div></div>';			
		}
		
		this.L.html(HTML);
			
		//-- flags
		this.fList	= true;
	}
	
	//-- Ð¡Ð¾Ð·Ð´Ð°ÐµÐ¼ ÑÐ¿Ð¸ÑÐ¾Ðº Ð¿Ð»Ð°Ð½ÐµÑ‚
	this.setFleetData = function(data)
	{
		this.FD = data;
	}
	
	//-- Ð˜Ð½Ð´Ð¸ÐºÐ°Ñ‚Ð¾Ñ€ Ð°Ñ‚Ð°ÐºÐ¾Ð²Ð°Ð½Ð½Ð¾Ð¹ Ð¿Ð»Ð°Ð½ÐµÑ‚Ñ‹
	this.setFleetInd = function()
	{
		//-- Ð£Ð±ÐµÑ€Ð°ÐµÐ¼ Ð¸Ð½Ð´Ð¸ÐºÐ°Ñ†Ð¸ÑŽ
		this.L.find('.pl-a').removeClass('pl-a');
		
		if(this.FD.length == 0)
			return false;		
		
		//-- Ð’Ñ‹ÑÑ‚Ð°Ð²Ð»ÑÐµÐ¼ Ð¸Ð½Ð´Ð¸ÐºÐ°Ñ†Ð¸ÑŽ
		jQuery.each(this.FD, function(i, val){
			if(Number(val.fleet_mission) == 1 || Number(val.fleet_mission) == 9)
				Frame.PlanetMenu.setFI(val.fleet_end_id, val.fleet_mission);
		});
	}
	this.setFI = function(id, mission)
	{
		this.L.find('#p'+id).addClass('pl-a');
	}
};
//-- -- classChat
function classChat()
{
	this.fOpen = false;
	//-- Construct | START
	this.construct = function()
	{	
		this.Btn	= $('#btn-chat');
		 
		this.B	= $('<div id="chat" class="chat-mini"></div>');
		this.P	= $('<div id="chat-preloader"><div class="fancybox-loading"></div></div>');
		this.C	= $('<div id="chat-close">&times;</div>');
		this.I	= $('<iframe name="ichat" id="iframe-cat" frameborder="0" width="100%" height="100%" scrolling="auto" src="//'+ChatUrl+'"></iframe>');
					
		this.C.click(function(){Frame.Chat.close();});

		//-- Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ð½Ð° ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ñƒ
		this.B.append(this.I).append(this.C);//.append(this.P);			
		this.B.appendTo('body');
	}
	//-- Construct | END
	
	//-- ÐžÑ‚ÐºÑ€Ñ‹Ñ‚ÑŒ Ñ‡Ð°Ñ‚
	this.open = function() 
	{
		if(this.fOpen){
			this.close();
			return;
		}
		this.fOpen = true;	
		
		//-- Ð¡ÐºÑ€Ñ‹Ñ‚ÑŒ ÐºÐ½Ð¾Ð¿ÐºÑƒ
		this.Btn.hide();			
		this.Plon();
		this.B.removeClass('chat-mini');//.show();
		
		//-- Ð Ð°Ð·Ð²ÐµÑ€Ð½ÑƒÑ‚ÑŒ Ñ‡Ð°Ñ‚
		window.ichat.goShow();
		
		//-- Ð Ð°Ð·Ð¼Ñ‹Ð²Ð°ÐµÐ¼ Ð¸Ð½Ñ„Ñƒ Ð¿Ð»Ð°Ð½ÐµÑ‚Ñ‹		
		Frame.PlanetData.DOM.info.addClass('blur');
		//-- Ð Ð°Ð·Ð¼Ñ‹Ð²Ð°ÐµÐ¼ ÑÐ¿ÐµÑ† Ð¿Ñ€ÐµÐ´Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ
		Frame.Events.DOM.offer.addClass('blur');
	}	
	//-- Ð—Ð°ÐºÑ€Ñ‹Ñ‚ÑŒ Ñ„Ñ€ÐµÐ¹Ð¼
	this.close = function() 
	{
		//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ ÐºÐ½Ð¾Ð¿ÐºÑƒ
		this.Btn.show();		
		//-- Ð¡Ð½Ð¸Ð¼Ð°ÐµÐ¼ Ñ€Ð°Ð·Ð¼Ñ‹Ñ‚Ð¸Ðµ Ñ Ð¸Ð½Ñ„Ñ‹ Ð¿Ð»Ð°Ð½ÐµÑ‚Ñ‹		
		Frame.PlanetData.DOM.info.removeClass('blur');
		//-- Ð¡Ð½Ð¸Ð¼Ð°ÐµÐ¼ Ñ€Ð°Ð·Ð¼Ñ‹Ñ‚Ð¸Ðµ Ñ ÑÐ¿ÐµÑ† Ð¿Ñ€ÐµÐ´Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ
		Frame.Events.DOM.offer.removeClass('blur');
		//-- Ð¡Ð²ÐµÑ€Ð½ÑƒÑ‚ÑŒ Ñ‡Ð°Ñ‚
		window.ichat.goHide();
			
		this.fOpen = false
		this.B.addClass('chat-mini');//.hide();
	}
	//-- ÐŸÑ€Ð¸Ð»Ð¾Ð°Ð´Ð¸Ð½Ð³
	this.Plon = function() 
	{
		if(this.fOpen)
			this.P.show();
	}
	this.Ploff = function() 
	{
		if(this.fOpen)
			this.P.hide();
	}
};
//-- -- PlanetData
function classPlanetData()
{
	this.DOM 			= {};
	this.Data 			= {};
	this.FleetC			= 0;
	this.FleetS			= 0;
	this.newsN			= 0;

	//-- Construct | START
	this.construct = function()
	{		
		this.DOM['menu']		= $('#menu-bn');	
		this.DOM['name']		= this.DOM['menu'].find('#btn-pl');
		this.DOM['maxFS']		= this.DOM['menu'].find('#btn-fleet');
		
		this.DOM['planet']		= $('#ov-planet');
		this.DOM['planet-i']	= this.DOM['planet'].find('#ov-planet-i');		
		this.DOM['debris']		= $('#ov-debris');
		this.DOM['moon']		= $('#ov-moon');
		this.DOM['moon-i']		= this.DOM['moon'].find('#ov-moon-i');
		
		this.DOM['info']		= $('#ov-info-mount');
		this.DOM['i_debris'] 	= this.DOM['info'].find('#ov-i-debris'); 
		this.DOM['i_temp']		= this.DOM['info'].find('#ov-i-temp');
		this.DOM['i_diameter']	= this.DOM['info'].find('#ov-i-diameter');
		
		//-- ÐÐ¾Ð²Ð¾ÑÑ‚Ð¸
		this.DOM['ov-news']		= $('#ov-ev-a');
	}
	//-- Construct | END
		
	//-- Ð£ÑÑ‚Ð¾Ð²ÐºÐ° Ð´Ð°Ð½Ð½Ñ‹Ñ…
	//-- -- ÐžÐ±Ñ‰Ð¸Ðµ Ð´Ð°Ð½Ð½Ñ‹Ðµ
	this.setData = function(data) 
	{
		this.Data = data;
		
		this.DOM['debris'].hide();
		this.DOM['moon'].hide();
		
		//-- Name / coord
		this.DOM['name'].find('.menu-bn-btn-p-name:first').text(this.Data['name']);
		this.DOM['name'].find('.menu-bn-btn-p-coord:first').text(this.Data['coord'][1] + ' : ' + this.Data['coord'][2] + ' : ' + this.Data['coord'][3]);
		//-- Fleet
		this.FleetS = this.Data['maxFS'];
		this.setFleet();
		
		//-- Ð˜Ð·Ð¾Ð±Ñ€Ð°Ð¶ÐµÐ½Ð¸Ñ 
		this.DOM['planet-i'].attr('class','gl-img i-p-'+this.Data['image'] +' gl-img-'+this.Data['df']);
		
		if (typeof p3D !== 'undefined') // Any scope
		{
			//p3D.metadata.urls.earth.surfaceMaterial = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/297733/earthSurfaceNormal.jpg';
			//p3D.render.resfarsh();
		}
		
		if(this.Data['moon'] != 0)	
		{
			this.DOM['moon'].show();
			this.DOM['moon-i'].attr('class','gl-img i-p-s-'+this.Data['moon_i']+' gl-img-'+Math.min(100, (this.Data['moon_df']*2)));
		}
		
		//-- ÐžÐ±Ð»Ð¾Ð¼ÐºÐ¸
		if(this.Data['debris'][0] + this.Data['debris'][1] > 0)
			this.DOM['debris'].attr('class','i-d-1').show();
		
		//-- Info		
		this.DOM['i_temp'].text(this.Data['temp'][1]);// + ' | ' + this.Data['temp'][1]);
		this.DOM['i_diameter'].text(this.Data['diameter'][1] + ' / ' + this.Data['diameter'][2] + ' ('+NumberGetHumanReadable(this.Data['diameter'][0])+')');
		this.DOM['i_debris'].text(NumberGetHumanReadable(Number(this.Data['debris'][0]) + Number(this.Data['debris'][1])));
		
		if(this.newsN != this.Data['news'][0])
		{
			if(this.Data['news'][0] != 0)
				this.DOM['ov-news'].show();
			else
				this.DOM['ov-news'].hide();
				
			this.newsN = this.Data['news'][0];
		}
		
	}
	//-- -- Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ð°ÐºÑ‚Ð¸Ð²Ð½Ð¾ÑÑ‚Ð¸ Ñ„Ð»Ð¾Ñ‚Ð°
	this.setFleet = function() 
	{
		this.DOM['maxFS'].find('.menu-bn-btn-p-coord:first').text(this.FleetC + ' / ' + this.FleetS);
	}
};

//-- -- Events
function classEvents()
{
	this.DOM 			= {};
	this.Data 			= {};
	this.expedC			= 0;
	this.expedM			= 0;
	
	//-- Ð¢Ð°Ð¹Ð¼ÐµÑ€Ñ‹
	this.TimeE			= 0;	
	this.TimeC			= 0;
	this.TimeP			= 0;
	this.TimeT			= 0;
	this.TimeA			= 0;
	
	//-- Construct | START
	this.construct = function()
	{		
		this.DOM['events']	= $('#ov-events');	
		//-- Exped
		this.DOM['ov-e']	= this.DOM['events'].find('#ov-ev-e');
		this.DOM['e-text']	= this.DOM['ov-e'].find('.ov-event-text:first');
		this.DOM['e-time']	= this.DOM['ov-e'].find('.ov-event-time:first');
		//-- Contract
		this.DOM['ov-j']	= this.DOM['events'].find('#ov-ev-j');
		this.DOM['j-text']	= this.DOM['ov-j'].find('.ov-event-text:first');
		this.DOM['j-time']	= this.DOM['ov-j'].find('.ov-event-time:first');
		//-- Prem
		this.DOM['ov-p']	= this.DOM['events'].find('#ov-ev-p');
		this.DOM['p-text']	= this.DOM['ov-p'].find('.ov-event-text:first');
		this.DOM['p-time']	= this.DOM['ov-p'].find('.ov-event-time:first');
		//-- Turnir
		this.DOM['ov-t']	= this.DOM['events'].find('#ov-ev-t');
		this.DOM['t-text']	= this.DOM['ov-t'].find('.ov-event-text:first');
		this.DOM['t-time']	= this.DOM['ov-t'].find('.ov-event-time:first');
		//-- Action
		this.DOM['ov-a']	= this.DOM['events'].find('#ov-ev-a');
		this.DOM['a-text']	= this.DOM['ov-a'].find('.ov-event-text:first');
		this.DOM['a-time']	= this.DOM['ov-a'].find('.ov-event-time:first');
		//-- special-offer
		this.DOM['offer']		= $('#special-offer');
		this.DOM['offer-name']	= this.DOM['offer'].find('.ov-special-name:first');
		this.DOM['offer-time']	= this.DOM['offer'].find('.ov-special-time:first');
		this.DOM['offer-cost']	= this.DOM['offer'].find('.queue-btn-complete-c:first');
	}
	//-- Construct | END
		
	//-- Ð£ÑÑ‚Ð¾Ð²ÐºÐ° Ð´Ð°Ð½Ð½Ñ‹Ñ…
	//-- -- ÐžÐ±Ñ‰Ð¸Ðµ Ð´Ð°Ð½Ð½Ñ‹Ðµ
	this.setData = function(data) 
	{
		var tcontent = '';
		
		this.Data = data;
		
		//-- Ð¢Ð°Ð¹Ð¼ÐµÑ€Ñ‹	
		this.TimeC			= this.Data['Contract'][3];
		this.TimeP			= this.Data['PD']['T'];
		this.TimeT			= this.Data['TimeT'];
		this.TimeA			= this.Data['TimeA'];
		this.TimeS			= this.Data['Offer'][1];
		
		//-- Ð­ÐºÐ¿Ð¸Ð´Ð¸Ñ†Ð¸Ñ
		this.expedM = this.Data['expedM'];
		this.setExped();
		
		//-- ÐŸÑ€ÐµÐ¼
		if(this.TimeP)
		{
			tcontent = "<div class='wight-200'><div class='tip-title'>"+this.Data['PD']['TXT'][0]+"</div><div class='tip-text'>"+this.Data['PD']['TXT'][1];
			
			if(this.Data['PD']['TXT'][2] != undefined)
				tcontent += "<br />" + this.Data['PD']['TXT'][2];			
			
			if(this.Data['PD']['TXT'][3] != undefined)
				tcontent += "<br />" + this.Data['PD']['TXT'][3];			
				
				tcontent += "</div></div>";
				
			this.DOM['ov-p'].data('tooltip-content', tcontent);
			
			this.DOM['p-text'].text(this.Data['PD']['AC']+ ' / ' + this.Data['PD']['MC']);
			this.DOM['ov-p'].show();
		}
		else
			this.DOM['ov-p'].hide();
			
		//-- ÐšÐ¾Ñ‚Ñ€Ð°ÐºÑ‚Ñ‹
		if(this.TimeC)
		{
			this.DOM['j-text'].text(Math.min(100, Math.floor(this.Data['Contract'][1] / this.Data['Contract'][2] * 100))+'%').show();
		}
		else this.DOM['j-text'].text('').hide();
		
		//-- ÐÐ°Ð³Ñ€Ð°Ð´Ñ‹ Ð·Ð° ÑƒÑ€Ð¾Ð²ÐµÐ½ÑŒ	
		if(this.Data['LevelUp'])
			Dialog.LevelUp();
		
		//-- Ð¡Ð¿ÐµÑ† Ð¿Ñ€ÐµÐ´Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ
		if(this.Data['Offer'][0] != 0)
		{
			
			this.DOM['offer-name'].text(this.Data['Offer'][3]);			
			this.DOM['offer-cost'].text(this.Data['Offer'][2]);
			this.DOM['offer'].attr('class', 'i-offer-'+this.Data['Offer'][0]+'m');	
			this.DOM['offer'].show();
			
			if(this.Data['Offer'][4])
				Dialog.SOffer();
		}
		else this.DOM['offer'].hide();
	}
	//-- -- Ð¢Ð°Ð¹Ð¼ÐµÑ€Ñ‹
	this.T = function() 
	{	
		if(this.TimeE >= 1)
		{
			this.TimeE--; 
			this.DOM['e-time'].text(GetShortRestTimeFormat(this.TimeE));
		}else{this.DOM['e-time'].text('');}
		
		if(this.TimeC >= 1)
		{
			this.TimeC--; 
			this.DOM['j-time'].text(GetShortRestTimeFormat(this.TimeC));
		}else{this.DOM['j-time'].text('')}
		
		if(this.TimeP >= 1)
		{
			this.TimeP--; 
			this.DOM['p-time'].text(GetShortRestTimeFormat(this.TimeP));
		}else{this.DOM['p-time'].text('');}
		
		if(this.TimeT >= 1)
		{
			this.TimeT--; 
			this.DOM['t-time'].text(GetShortRestTimeFormat(this.TimeT));
		}else{this.DOM['t-time'].text('');}		
		
		if(this.TimeS >= 1)
		{
			this.TimeS--; 
			this.DOM['offer-time'].text(GetDayRestFullTimeFormat(this.TimeS));
		}else{this.DOM['offer-time'].text('');}
	}
	//-- -- Ð£ÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ð°ÐºÑ‚Ð¸Ð²Ð½Ð¾ÑÑ‚Ð¸ Ð­ÐºÑÐ¿ÐµÐ´Ð¸Ñ†Ð¸Ð¸
	this.setExped = function() 
	{
		this.DOM['e-text'].text(this.expedC + ' / ' + this.expedM);
	}
};
//--
function classSound()
{
	this.DOM 		= {};
	this.faudio		= false;
	
	if($.cookie('faudio') !== undefined)
		this.faudio = $.cookie('faudio');
	
	//-- Construct | START
	this.construct = function()
	{			
		this.DOM['btn']	= $('#btn-sound');		
		
		if(this.faudio == 'true')
		{
			this.DOM['btn'].addClass('i-music-on')
			audio.play();		
		}
	}
	//-- Construct | END
	
	this.music = function() 
	{
		if(audio === undefined)
			return;
			
		if(this.faudio)
		{
			this.faudio = false;			
			audio.pause();
			this.DOM['btn'].removeClass('i-music-on');
		}
		else
		{
			this.faudio = true;
			audio.play();
			this.DOM['btn'].addClass('i-music-on');
		}
		$.cookie('faudio', this.faudio);
	}
}

//-- -- Ajax
function classAjax()
{	
	this.DOM 		= {};
		
	//-- Construct | START
	this.construct = function()
	{			
		
	}
	//-- Construct | END
	
		
	//-- ÐŸÐ¾ÑÑ‚ Ð·Ð°Ð¿Ñ€Ð¾Ñ
	this.p = function(url, parameters, success) 
	{
	   	$.post(url, parameters, success, "json");
		//console.log('classAjax.p');
	}
	
	//-- Ð§Ð°ÑÑ‚Ð¸Ñ‡Ð½Ð¾Ðµ Ð¾Ð±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ
	this.PartRev = function(data) 
	{
		//if(data.length > 0)		
			Frame.TopNav.setData(data);
	}
	//-- ÐŸÐ¾Ð»Ð½Ð¾Ðµ Ð¾Ð±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ
	this.FullRev = function(data) 
	{
		//console.log('FullRev');
		//-- CurPlanet
		if(data.pi !== undefined)	
			CurPlanet = data.pi;
		//-- ResNav
		if(data.rd !== undefined)
			Frame.ResNav.setData(data.rd);
		//-- Queue
		if(data.qb !== undefined)
			Frame.Queue.setQB(data.qb);
		
		if(data.qs !== undefined)
			Frame.Queue.setQS(data.qs);		
		
		if(data.qr !== undefined)
			Frame.Queue.setQR(data.qr);		
		//-- PlanetMenu
		if(data.pl !== undefined)
			Frame.PlanetMenu.setData(data.pl);
		//-- PlanetData
		if(data.pd !== undefined)
			Frame.PlanetData.setData(data.pd);
		//-- Events
		if(data.ev !== undefined)
			Frame.Events.setData(data.ev);
		
		//-- JS
		if(data.js !== undefined)
			eval(data.js);
		
		Frame.refreshEnd();
	}
}