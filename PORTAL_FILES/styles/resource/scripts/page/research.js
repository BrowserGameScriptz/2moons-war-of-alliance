var resttime		= 0;
var time			= 0;
var interval		= 0;
var buildname		= "";
var ContainerBox	= $();
var Container		= $();

function Buildlist() {
	var rest	= resttime - (serverTime.getTime() - startTime) / 1000;
	if (rest <= 0) {
		window.clearInterval(interval);
		$('#time').text(Ready);
		//$('#command').remove();
		//document.title	= Ready + ' | ' + Gamename;
		DOM['resttime'].width('100%');
		window.setTimeout(function() {
			window.location.href = 'game.php?page=research';
		}, 1000);
		return true;
	}
	//document.title	= GetRestTimeFormat(rest) + ' - ' + buildname + ' | ' + Gamename;
	
	DOM['time'].text(parent.GetDayRestFullTimeFormat(rest));
	DOM['resttime'].width(Math.max(100 - (rest / time) * 100, 1) +'%');
}

$(document).ready(function() {
	
	Container		= $('#tech-container');
	ContainerBox	= $('#tech-container-box');
	
	//-- ÐŸÑ€Ð¾Ð³Ñ€ÐµÑÑ
	if(ResearchQueue.length != 0)
	{
		DOM['time']		= $('#t'+ResearchQueue.id);
		DOM['resttime']	= $('.queue-p');
		
		time		= ResearchQueue.time;
		resttime	= ResearchQueue.resttime;
		
		if(Number(resttime) > 0){
			//buildname	= $('.onlist:first').text();
			interval	= window.setInterval(Buildlist, 1000);
			//window.setTimeout(CreateProcessbar, 5);
			Buildlist();
		}
	}

	OpenTech(aTech);
});

//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ Ð¸ÑÑÐ»ÐµÐ´Ð¾Ð²Ð°Ð½Ð¸Ðµ
function OpenTech(id)
{	
	ContainerBox.find('.tech-active').removeClass('tech-active');
	ContainerBox.find('#b'+id).addClass('tech-active');
	
	Container.find('.tech-box-active').removeClass('tech-box-active');
	Container.find('#c'+id).addClass('tech-box-active');
}