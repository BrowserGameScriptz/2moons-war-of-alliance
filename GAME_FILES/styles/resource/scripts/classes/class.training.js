/*
 * training JS
 * Class
 * 24.11.2017 by reemo
 * rev 28.11.2017
 */
//var TrLNG		= [];
//var tStep 	= 0;
var TrLNG		= [];
var tStep 		= 0;


//qtips(UTable, TrLNG[0], 'left center', 'right center');
//ApiQtipCell = UTable.qtip('api');	

//-- Ð¡Ð»Ð¸Ð»Ð¸ Ð¿Ð¾Ð´ÑÐºÐ°Ð·Ð¾Ðº
var StyleQtip 	= [
	{ 
		classes: 'qtip-designation',
		tip: 
		{
			border:  1,
			width:  10,
			height: 10,
		}
	},
	{
		classes: 'qtip-dialog',
		tip: 
		{
			border: 2,
			width: 20,
			height: 20,
			corner: 'left center',
			mimic: 'top left',
		}
	},
	{
		classes: 'qtip-dialog',
		tip: 
		{
			border: 2,
			width: 20,
			height: 20,
			corner: 'right center',
			mimic: 'top right',
		}
	},
]
//-- Ð¤ÑƒÐ½ÐºÑ†Ð¸Ð¸ 
function qtips(selector, message, p_my, p_at)	
{
	selector.qtip(
	{ 
		style: StyleQtip[0],
		show:
		{
			ready: true,
			event: false,
		},		
		hide: false,
			
		content:{
			text: message,
		},
		
		position: 
		{	
			my: p_my,  
			at: p_at,
			target:selector,
		}
	});
}

function qtips_wide(selector, message, p_my, p_at, width)	
{
	$(selector).qtip(
	{ 
		style: StyleQtip[0],
		show:
		{
			ready: true,
			event: false,
		},				
		hide: false,
			
		content:{
			text: '',
		},
		
		position: 
		{	
			my: 'left bottom',  
			at: 'center right',
		}
	});
}

function AddArrowInterval(selector, position, tik)
{
	if($(selector).length != 0)
		 AddArrow(selector, position);
	else if(tik >= 0)
	{
		tik--;
		setTimeout('AddArrowInterval("'+selector+'", "'+position+'", '+tik+');',1000);
	}
}
function AddArrow(selector, position)
{
	var e = $(selector);

	if(e.find('.a-pointer:first').length == 0)
		e.prepend('<span class="a-pointer a-pointer-'+position+'"></span>').on('click', RemoveArrow);
}
function RemoveArrow(){
	$(this).find('.a-pointer').remove().off('click', RemoveArrow);
}
//-- ÐžÐ±ÑŠÐµÐºÑ‚ ÐžÐ±ÑƒÑ‡ÐµÐ½Ð¸Ñ
function classTraining() 
{  	
	this.step = 0;
	
	//-- Constructor | Start
	this.construct = function() 
	{
		//-- Ð¡Ð¾Ð·Ð´Ð°ÐµÐ¼ Ð¡Ñ‚Ñ€ÑƒÐºÑ‚ÑƒÑ€Ñƒ
		//this.General 	= $('<div id="training"></div>');
		//-- Ð”Ð¾Ð±Ð°Ð²ÑÐµÐ¼ Ð² Ñ‚ÐµÐ»Ð¾ ÑÑ‚Ñ€Ð°Ð½Ð¸Ñ†Ñ‹
		//$('body').prepend(this.General);		
	
	}//-- Constructor | End
		
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
	//-- -- ÐŸÐ¾Ð´Ð¼ÐµÐ½Ð° ÑˆÐ¿Ð¸Ð¾Ð½Ð°Ð¶Ð°
	this.spy = function() 
	{
		$.getJSON("game.php?page=training&ajax=1&mode=spy", function(data){
			NotifyBox(data.mess, 2000);
			parent.Dialog.Training(10);
		});
	}
	
};

var Training = new classTraining();
$('document').ready(function()
{
	Training.construct();
});