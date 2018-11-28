//-- Ð‘Ð»Ð¾ÐºÐ¸Ñ€Ð¾Ð²ÐºÐ° Ñ‡Ð°Ñ‚Ð°
function muteChat(mode, id)
{
	parent.window.ichat.muteChat(mode, id);			
}
//-- Ð‘Ð»Ð¾ÐºÐ¸Ñ€Ð¾Ð²ÐºÐ° Ð¡Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ð¹
function mutePM(Carma, id)
{
	$.getJSON('game.php?page=support&mode=banPM&id='+id+'&carma='+Carma+'&ajax=1', function(data) {
		$('#loading').hide();
		parent.NotifyBox(data,3000);
	});				
}
/*
$(function() {
	
});
*/