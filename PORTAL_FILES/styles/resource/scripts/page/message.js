$(function() 
{	
	DOM['unread'] = 
	{
		'0': 	$('#unread_0'),
		'1':  	$('#unread_1'),
		'2':  	$('#unread_2'),
		'3':  	$('#unread_3'),
		'4':  	$('#unread_4'),
		'5':  	$('#unread_5'),
		'15': 	$('#unread_15'),
		'50':	$('#unread_50'),
		'100':	$('#unread_100'),
		'199':	$('#unread_199'),
		'999':	$('#unread_999'),
	};
	DOM['ms-content'] = $('#ms-content');
});

Message	= {
	MessID : 0,

	MessageCount: function() 
	{
		if(Message.MessID == 100) {
			DOM['unread']['0'].hide().text('0');
			DOM['unread']['1'].hide().text('0');
			DOM['unread']['2'].hide().text('0');
			DOM['unread']['3'].hide().text('0');
			DOM['unread']['4'].hide().text('0');
			DOM['unread']['5'].hide().text('0');
			DOM['unread']['15'].hide().text('0');
			DOM['unread']['50'].hide().text('0');
			DOM['unread']['100'].hide().text('0');
			//$('#newmes').text('');
		} else {
			var count = parseInt(DOM['unread'][''+Message.MessID].text());
			//var lmnew = parseInt($('#newmesnum').text());
				
			DOM['unread'][''+Message.MessID].hide().text('0');
			
			if(Message.MessID != 999) {
				var n_count = DOM['unread']['100'].text() - count
				
				DOM['unread']['100'].text(n_count);
				
				if(!n_count)
					DOM['unread']['100'].hide();
			}
			/*
			if(lmnew - count <= 0)
				$('#newmes').text('');
			else
				$('#newmesnum').text(lmnew - count);
			*/
		}
	},

	getMessages: function (MessID, page) 
	{
		if (typeof page === "undefined") {
			page = 1;
		}
		Message.MessID	= MessID;
		Message.MessageCount(MessID);
		
		parent.Frame.IFrame.Plon();
		
		$.get('game.php?page=messages&mode=view&messcat='+MessID+'&site='+page+'&ajax=1', function(data) {
			parent.Frame.IFrame.Ploff();
			DOM['ms-content'].html(data);
			setTooltip(DOM['ms-content']);
		});
	},

	stripHTML: function (string) { 
		return string.replace(/<(.|\n)*?>/g, ''); 
	},

	CreateAnswer: function (Answer) {
		var Answer	= Message.stripHTML(Answer);
		if(Answer.substr(0, 3) == "Re:") {
			return 'Re[2]:'+Answer.substr(3);
		} else if(Answer.substr(0, 3) == "Re[") {
			var re = Answer.replace(/Re\[(\d+)\]:.*/, '$1');
			return 'Re['+(parseInt(re)+1)+']:'+Answer.substr(5+parseInt(re.length))
		} else {
			return 'Re:'+Answer
		}
	},
	
	getMessagesIDs: function(Infos) {
		var IDs = [];
		$.each(Infos, function(index, mess) {
			if(mess.value == 'on')
				IDs.push(mess.name.replace(/delmes\[(\d+)\]/, '$1'));
		});	
		return IDs;
	}
}

function SRTF(RaportID)
{
	var Name	= $('#upgrade_name').val();
	
	ally = '';
	if(Name == 'ally')
		ally = 'ally';
	
	$.post("game.php?page=messages", {'mode': 'SpyRaportToFreind', 'RaportID': RaportID, 'FriendID': Name, 'ally': ally, 'ajax': 1}, function(data)
	{
		$('.ally_contents').text(data);
		setTimeout(function(){ parent.$.fancybox.close();}, 2000);
	}, "json");
}