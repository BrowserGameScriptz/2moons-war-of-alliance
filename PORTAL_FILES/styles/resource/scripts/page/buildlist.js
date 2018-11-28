var resttime	= 0;
var time		= 0;
var endtime		= 0;
var interval	= 0;
//var buildname	= "";

function Buildlist() {
	var rest	= resttime - (serverTime.getTime() - startTime) / 1000;
	if (rest <= 0) {
		window.clearInterval(interval);
		$('#time').text(Ready);
		//$('#command').remove();
		//document.title	= Ready + ' | ' + Gamename;
		DOM['resttime'].width('100%');
		window.setTimeout(function() {
			//window.location.href = 'game.php?page=buildings';
			IPost("game.php?page=buildings", {}, [interval, SerInt], []);
		}, 1000);
		return true;
	}
	//document.title	= GetRestTimeFormat(rest) + ' - ' + buildname + ' | ' + Gamename;
	
	DOM['time'].text(parent.GetDayRestFullTimeFormat(rest));
	DOM['resttime'].width(Math.max(100 - (rest / time) * 100, 0.01) +'%');
}

function PostBuild(id, cmd, listid, level) 
{	
	IPost("game.php?page=buildings", {'cmd': cmd, 'building': id, 'listid': listid, 'level': level}, [interval, SerInt], []);
	/*
	window.clearInterval(interval);
	window.clearInterval(TimeInterval);
	
	$.post("game.php?page=buildings", , function(data){
		document.documentElement.innerHTML = data;
		
		u = $("script");
		
		u.each(function(indx, element){
			s = $(element);
			
		 	if(s.attr('src') != undefined)
				$.getScript(s.attr('src'));
		});
		
		u.each(function(indx, element){
			s = $(element);
			
		 	if(s.attr('src') == undefined)
				$.globalEval(s.html());	 	
			//s.remove();
		});
		
		
		/*
		scripts = parser.parseFromString(data, "text/html").getElementsByTagName('script');
		for(var i = 0; i < scripts.length-1; i++)
		{
			s = $(scripts[i]);
			
			if(s.attr('src') == undefined)
				$.globalEval(s.html());
			else
			{
				$.getScript(s.attr('src'));
			}
		}
		*/	
	//});
}

$(document).ready(function() 
{
	DOM['time']		= $('#time');
	DOM['resttime']	= $('#progressbar');
	DOM['endtime']	= $('.timer:first');
	
	time		= DOM['time'].data('time');
	resttime	= DOM['resttime'].data('time');
	endtime		= DOM['endtime'].data('time');
	
	if(Number(resttime) > 0){
		//buildname	= $('.onlist:first').text();
		interval	= window.setInterval(Buildlist, 1000);
		Buildlist();
	}
});