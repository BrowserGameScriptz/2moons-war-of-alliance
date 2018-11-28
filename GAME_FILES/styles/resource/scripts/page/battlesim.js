//-- Ð”Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ ÑÐ»Ð¾Ñ‚
function slotAdd(){
	DOM['form'].attr('action', 'game.php?page=battleSimulator&action=moreslots');
	DOM['form'].attr('method', 'POST');
	DOM['form'].submit();
	return true;
}

//-- Ð¡Ð¸Ð¼ÑƒÐ»Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ
function sim()
{	
	removeFormat();
	
	var kb = window.open('about:blank', 'kb', 'scrollbars=yes,statusbar=no,toolbar=no,location=no,directories=no,resizable=no,menubar=no,width='+(screen.width - 10)+',height='+(screen.height - 10)+', screenX=0, screenY=0, top=0, left=0');
	DOM['submit'].hide();
	DOM['wait'].fadeIn();
	$.post('game.php?page=battleSimulator&mode=send', DOM['form'].serialize(), function(data){
		data = JSON.parse(data);
		var rid	= data[0];
		var uni	= data[1];
		if(rid != '') {
			var r = new RegExp("\x22+","g");
			kb.focus();
			var s = ("CombatReport.php?raport=" + rid + "&uni=" + uni).replace(r,"");
			kb.location.href = s;
		} else {
			kb.window.close();
			Dialog.alert(rid);
		}
	});	
	
	setFormat();
	
	setTimeout(function(){DOM['submit'].fadeIn();}, 10000);
	setTimeout(function(){DOM['wait'].hide();}, 10000);
	return true;
}

$(function() {
	
	DOM['form'] 		= $('#form');	
	DOM['input_text'] 	= DOM['form'].find('input[type=text]');
	
	//-- ÐŸÑ€Ð¸ÐºÑ€ÑƒÑ‡Ð¸Ð²Ð°ÐµÐ¼ Ñ„Ð¾Ñ€Ð¼Ð°Ñ‚ Ñ‡Ð¸ÑÐµÐ» Ðº input
	DOM['input_text'].keyup(function() {
		$(this).val(function(i, old) {
			return NumberGetHumanReadable(old.replace(/[^[0-9]|\.]/g, ''));
		});		
	});
	
	DOM['f-a'] 	= DOM['form'].find('.f-a');
	DOM['f-d'] 	= DOM['form'].find('.f-d');
	
	DOM['f-a'].keyup(function() {
		fleetAttPoints();
	});
	DOM['f-d'].keyup(function() {
		fleetDefPoints();
	});
	
	//-- ÐžÑ‡ÐºÐ¸ ÑÑ‚Ð¾Ñ€Ð¾Ð½
	DOM['AttPoints'] = $('#AttPoints');
	DOM['DefPoints'] = $('#DefPoints');
	
	//-- ÐšÐ½Ð¾Ð¿ÐºÐ° "Ð¡Ð¸Ð¼ÑƒÐ»Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ"
	DOM['submit'] 	= $('#submit');
	DOM['wait'] 	= $('#wait');	
	
	setFormat();
		
	fleetAttPoints();
	fleetDefPoints();
	
	//-- tabs
	DOM['tabs'] = $('#tabs');
	
	tab(0);
});

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
//-- Ð¡Ð±Ñ€Ð¾Ñ Ð—Ð½Ð°Ñ‡ÐµÐ½Ð¸Ð¹
function resetInput(s) {
	DOM['form'].find('.'+s).val(0);
	fleetAttPoints();
	fleetDefPoints();
}
//-- Tab
function tab(id) {
	DOM['form'].find('.tab-slot').hide();	
	DOM['form'].find('#tabs-'+id).show();
	DOM['tabs'].find('.btn-primary').removeClass('btn-primary');
	DOM['tabs'].find('#tb-'+id).addClass('btn-primary');	
}
//-- ÐžÑ‡ÐºÐ¸ Ð°Ñ‚Ð°ÐºÑƒÑŽÑ‰ÐµÐ³Ð¾
function fleetAttPoints() {
	var pointsCost = 0;
	DOM['f-a'].each(function() {
		el_count	= Number($(this).val().replace(/[^[0-9]|\.]/g, ''));
		el_name		= $(this).attr('name');
		pointsCost += (Number(pointsPrice[el_name]) * el_count);
	});
	DOM['AttPoints'].text(NumberGetHumanReadable(Number(pointsCost)));
}
//-- ÐžÑ‡ÐºÐ¸ Ð¾Ð±Ð¾Ñ€Ð¾Ð½ÑÑŽÑ‰ÐµÐ³Ð¾ÑÑ
function fleetDefPoints() {
	var pointsCost = 0;
	DOM['f-d'].each(function() {
		el_count	= Number($(this).val().replace(/[^[0-9]|\.]/g, ''));
		el_name		= $(this).attr('name');
		pointsCost += (Number(pointsPrice[el_name]) * el_count);
	});
	DOM['DefPoints'].text(NumberGetHumanReadable(Number(pointsCost)));
}