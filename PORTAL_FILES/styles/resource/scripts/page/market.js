var Gr = new classGr();
$(function()
{
	Gr.construct();
});

//-- ÐšÐ»Ð°ÑÑ Ñ€Ñ‹Ð½ÐºÐ°
function classGr() 
{  	
	this.DOM = {};
	
	//-- Constructor | Start
	this.construct = function()
	{
		this.DOM['left_side'] 	= $('#gr-left-menu');
		this.DOM['content'] 	= $('#gr-content');	
	}
	
	//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ Ð»ÐµÐ²Ð¾Ðµ Ð¼ÐµÐ½ÑŽ
	this.LeftShow = function(line) 
	{
		parent.Frame.IFrame.Plon();
		$.post("./market.php", {'left_line': line, 'ajax': 1}, Gr.html, "json");
	}
	
	//-- ÐžÐ±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ html
	this.html = function(data)
	{
		if(data.LEFT.HTML !== undefined)
		{
			Gr.DOM['left_side'].html(data.LEFT.HTML);
			Gr.DOM['content'].html('');
		}
		
		if(data.CONTENT.HTML !== undefined)
		{			
			Gr.DOM['content'].html(data.CONTENT.HTML);
		}
		parent.Frame.IFrame.Ploff();
	}
	
	//-- ÐŸÐ¾Ð¸ÑÐº Ð»Ð¾Ñ‚Ð¾Ð²
	this.searchLot = function(s)
	{
		parent.Frame.IFrame.Plon();
		switch (s)
		{
			//-- Ð ÐµÑÑƒÑ€ÑÑ‹
			case 'resources':
			{
				$.post("./market.php", {'content_line': 'resources', 'ri': $('#ri').val(), 'gi': $('#gi').val(), 'ajax': 1}, Gr.html, "json");
				break;
			}
		}		
	}
	
	//-- ÐŸÐ¾ÐºÑƒÐ¿ÐºÐ° Ð»Ð¾Ñ‚Ð¾Ð²
	this.buy = function(s, id, p) 
	{
		switch(s)
		{
			//-- Ð ÐµÑÑƒÑ€ÑÑ‹
			case 'resources':
			{
				//p=[ri, rc]
			
				var CurR = parent.Frame.ResNav.gR(p[0]);
				
				//-- ÐÐµÑ…Ð²Ð°Ñ‚Ð°ÐµÑ‚ Ð ÐµÑÑƒÑ€ÑÐ¾Ð²
				if(p[1] > CurR) 
				{
					NotifyBox(LNG['gr_mes_resources_no_ress'], 1500);
					return;
				}
				
				/*
				Confirm.cost(
				'{$LNG.lm_buildings}', 									
				{if $List.destroy}
				'{$LNG.bd_complete_w.d} <br /> {$LNG.tech.{$ID}} ({$List.level} {$LNG.bd_lvl})?',
				{else}
				'{$LNG.bd_complete_w.b} <br /> {$LNG.tech.{$ID}} ({$List.level} {$LNG.bd_lvl})?',
				{/if}
				'{$List.cost|number}', 
				'PostBuild({$ID},\'complete\',{$List@iteration}, {$List.level});', 
				921);
				*/
				parent.Frame.IFrame.Plon();
				$.post("./market.php", {'purchase_line': 'resources', 'id': id, 'ajax': 1, 'ri': p[0]}, Gr.answer, "json");				
				break;
			}	
		}		
	}
	//-- Ð£Ð²ÐµÐ´Ð¾Ð¼Ð»ÐµÐ½Ð¸Ðµ Ð¾ Ð¿Ð¾ÐºÑƒÐ¿ÐºÐµ
	this.answer = function(data) 
	{		
		if(data.MSG === "undefined")
			return;
				
		NotifyBox(data.MSG, 2000);
		
		if(data.ERROR)
			return;
			
		//-- Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ðµ Ñ€ÐµÑÑƒÑ€ÑÐ¾Ð²
		if(data.RES !== "undefined")
		{
			data.RES.forEach(function(item, i, arr) {
				parent.Frame.ResNav.p[item[0]][0] += Number(item[1]);
				parent.Frame.ResNav.sR(item[0]);
			});
		}			
				
		if(data.S !== "undefined")		
			Gr.searchLot(data.S);
		
		parent.Frame.IFrame.Ploff();
	}
}

function SEARCHUPGRADE() /*ÐŸÐ¾Ð¸ÑÐº Ð°Ð¿Ð³Ñ€ÐµÐ¹Ð´Ð°*/
{
	$('#gr_search').attr("disabled", "disabled");
	setTimeout("$('#gr_search').removeAttr('disabled')", 3000);
	jQuery.post("./market.php", {'content_line': 'upgrade', 'max_cost': $('#max_cost').val(), 'min_count': $('#min_count').val(), 'name': $('#upgrade_name').val(), 'ajax': 1}, 
	function(data)
	{
		var div = document.getElementById('market_content');
		if(data.CONTENT.HTML !== "undefined")
		{
			div.innerHTML = data.CONTENT.HTML;
		}
	}, "json");
	
}

function BUYUPGRADE(ID, Msg, NoMsg, Cost) /*ÐŸÐ¾ÐºÑƒÐ¿ÐºÐ° Ð´ÐµÐ¹Ñ‚ÐµÑ€Ð¸Ñ*/
{
	var am 			= Number(String($('#current_am').text()).replace(/[.]/g, ''));
	
	if(am < Cost) // ÐÐµÑ…Ð²Ð°Ñ‚Ð°ÐµÑ‚ ÐÐœ
	{
		alert(NoMsg);
		return (false);
	}
	
	if(confirm(Msg))
	{	
		jQuery.post("./market.php", {'purchase_line': 'upgrade', 'id': ID, 'ajax': 1}, 
		function(data)
		{
			if(data.MSG !== "undefined")
			{
				var div = document.getElementById('market_lost_msg');
				//alert(data.MSG);
				div.innerHTML = '<p>'+data.MSG+'</p>'
				if(!data.ERROR)
				{
					$('#current_am').text(NumberGetHumanReadable(am - Cost));
				}
			}
		}, "json");
		
		SEARCHUPGRADE();
	}
}

function SEARCHPLANET() /*ÐŸÐ¾Ð¸ÑÐº Ð¿Ð»Ð°Ð½ÐµÑ‚*/
{
	$('#gr_search').attr("disabled", "disabled");
	setTimeout("$('#gr_search').removeAttr('disabled')", 3000);
	
	var Sort = 0;
	var Luna = 0;
	if($("#sort").attr("checked") == 'checked')
    	Sort = 1;
	if($("#luna").attr("checked") == 'checked')
    	Luna = 1;  
	
	jQuery.post("./market.php", 
	{
		'content_line': 'planet',
		'max_cost': $('#max_cost').val(),
		'ssort': $('#ssort').val(),
		'sort': Sort,
		'fildes': $('#fildes').val(),
		'points_b_p': $('#points_b_p').val(),
		'points_d_p': $('#points_d_p').val(),
		'luna': Luna,
		'points_b_l': $('#points_b_l').val(),
		'points_d_l': $('#points_d_l').val(),
		'collider': $('#collider').val(), 
		'ajax': 1
	}, 
	function(data)
	{
		var div = document.getElementById('market_content');
		if(data.CONTENT.HTML !== "undefined")
		{
			div.innerHTML = data.CONTENT.HTML;
		}
	}, "json");
}