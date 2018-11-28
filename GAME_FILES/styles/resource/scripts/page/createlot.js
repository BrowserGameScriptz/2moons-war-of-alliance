//-- Ð ÐµÑÑƒÑ€ÑÑ‹
function r_check()
{
	removeFormat();
	
	var give	= { 
		'i' : $('#gi').val(),
		'c' : $('#gc').val(),
	};
	var receive	= { 
		'i' : $('#ri').val(),
		'c' : $('#rc').val(),
	};
		
	if(give['i'] == receive['i'])
	{
		parent.Confirm.alert(LNG['gr_title'], LNG['gr_mes_one_resources'], LNG['ok'], '');
	}
	else if(give['c'] > Max || receive['c'] > Max)
	{
		parent.Confirm.alert(LNG['gr_title'], LNG['gr_mes_limit_exceeded'], LNG['ok'], '');
	}
	else
	{
		$.post('game.php?ajax=1&page=createlot&mode=sendresources&gi='+give['i']+'&gc='+give['c']+'&ri='+receive['i']+'&rc='+receive['c']+'', function(data) 
		{	
			var cb = '';
			if(data[0])
				cb = 'parent.$.fancybox.close(); /*parent.location = "game.php?page=market&mode=yourlots";*/';
				 
			parent.Confirm.alert(LNG['gr_title'], data[1], LNG['ok'], cb);
		}, 'json');
	}
	
	setFormat();
	
	return false;
}

function r_cost()
{
	if($('#count').val().length > 3)
		$('#count').val(function(i, old) {
			return NumberGetHumanReadable(old.replace(/[^[0-9]|\.]/g, ''));
		});
		
	var Count	= $('#count').val().replace(/[^[0-9]|\.]/g, '');
	var Course	= $('#course').val();
	
	if($('#count').val().length > 3 && (isNaN(Count) || Count < 1 )) {
		$('#count').val(1);
		Count = 1;
	}
	
	var SCourseFul = SCourse + Math.floor(SCourseSeting * (1 - Course / 100));
	
	var cost = Math.floor(Count / SCourseFul);
	
	$('#cost').text(NumberGetHumanReadable(cost));
}

//-- Ð£ÑÑ‚Ð°Ð½Ð¾Ð²Ð¸Ñ‚ÑŒ Ñ‡Ð¸ÑÑ‚Ð¾Ð²Ð¾Ð¹ Ñ„Ð¾Ñ€Ð¼Ð°Ñ‚ Ð´Ð»Ñ Ð²ÑÐµÑ… Ð¿Ð¾Ð»ÐµÐ¹
function setFormat() {	
	DOM['input_text'].val(function(i, old) {
		return NumberGetHumanReadable(old.replace(/[^[0-9]|\.]/g, ''));
	});	
}
//-- Ð£Ð±Ñ€Ð°Ñ‚ÑŒ Ñ‡Ð¸ÑÑ‚Ð¾Ð²Ð¾Ð¹ Ñ„Ð¾Ñ€Ð¼Ð°Ñ‚ Ð´Ð»Ñ Ð²ÑÐµÑ… Ð¿Ð¾Ð»ÐµÐ¹
function removeFormat() {
	DOM['input_text'].val(function(i, old) {
		return old.replace(/[^[0-9]|\.]/g, '');
	});
}

$(function() {
	DOM['input_text'] = DOM['body'].find('input[type=text]');
	
	//-- ÐŸÑ€Ð¸ÐºÑ€ÑƒÑ‡Ð¸Ð²Ð°ÐµÐ¼ Ñ„Ð¾Ñ€Ð¼Ð°Ñ‚ Ñ‡Ð¸ÑÐµÐ» Ðº input
	DOM['input_text'].keyup(function() {
		$(this).val(function(i, old) {
			return NumberGetHumanReadable(old.replace(/[^[0-9]|\.]/g, ''));
		});		
	});
});

//--ÐÐ¿Ð³Ñ€ÐµÐ¹Ð´Ñ‹
function UpCheck()
{
	var Name	= $('#upgrade_name').val();
	var Cost	= $('#cost').val() || 100;
	var Count	= $('#count').val() || 1;

	$('submit').attr('disabled','disabled');
	$.post('game.php?ajax=1&page=createlot&mode=sendupgrade&count=' + Count +'&cost='+ Cost +'&name='+ Name, function(data) {
		alert(data);
		parent.$.fancybox.close();
		parent.location = "game.php?page=market&mode=yourlots";
		return true;
	});
}

/*ÐŸÐ»Ð°Ð½ÐµÑ‚Ñ‹*/
function PlanetCheck()
{
	var Cost	= $('#cost').val() || 10000;

	$('submit').attr('disabled','disabled');
	$.post('game.php?ajax=1&page=createlot&mode=sendplanet&cost='+ Cost, function(data) {
		alert(data);
		parent.$.fancybox.close();
		parent.location = "game.php?page=market&mode=yourlots";
		return true;
	});

}