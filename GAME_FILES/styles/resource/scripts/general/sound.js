/*
var b = document.documentElement;
b.setAttribute('data-useragent', navigator.userAgent);
b.setAttribute('data-platform', navigator.platform);
*/
jQuery(function ($) {
    var supportsAudio = !!document.createElement('audio').canPlayType;
    if (supportsAudio) {
        var playing 	= false,
            mediaPath 	= '/styles/resource/sound/', // ÐÐ´Ñ€ÐµÑ Ð¿Ð°Ð¿ÐºÐ¸ Ñ Ñ‚Ñ€ÑÐºÐ°Ð¼Ð¸
            extension 	= '',
            tracks 		= [
				{"track": 1,"name": "01","length": "2:45","file": "01"},
				{"track": 2,"name": "02","length": "4:54","file": "02"},
				{"track": 3,"name": "03","length": "4:42","file": "03"},
				{"track": 4,"name": "04","length": "2:30","file": "04"},
				{"track": 5,"name": "05","length": "1:48","file": "05"},
				{"track": 6,"name": "06","length": "1:47","file": "06"},
				//{"track": 7,"name": "07","length": "1:45","file": "07"},
				{"track": 8,"name": "08","length": "2:15","file": "08"},
				{"track": 9,"name": "09","length": "1:36","file": "09"},
				//{"track": 10,"name": "10","length": "1:45","file": "10"},
				//{"track": 11,"name": "11","length": "1:16","file": "11"},
				{"track": 12,"name": "12","length": "1:35","file": "12"},
				{"track": 13,"name": "13","length": "1:31","file": "13"},
				{"track": 14,"name": "14","length": "2:31","file": "14"},
			],
			/*
            buildPlaylist = $.each(tracks, function(key, value) {
                var trackNumber = value.track,
                    trackName = value.name,
                    trackLength = value.length;
                if (trackNumber.toString().length === 1) {
                    trackNumber = '0' + trackNumber;
                } else {
                    trackNumber = '' + trackNumber;
                }
                $('#plList').append('<li><div class="plItem"><div class="plNum">' + trackNumber + '.</div><div class="plTitle">' + trackName + '</div><div class="plLength">' + trackLength + '</div></div></li>');
            }),
			*/
            trackCount = tracks.length,
			index 	   = Math.floor(Math.random() * (trackCount - 1 )),
            //npAction = $('#npAction'),
           	//npTitle = $('#npTitle'),
            audio = $('#audio').bind('play', function () {
                playing = true;
               // npAction.text('Now Playing...');
            }).bind('pause', function () {
                playing = false;
                //npAction.text('Paused...');
            }).bind('ended', function () {
                //npAction.text('Paused...');
				
				var n = Math.floor(Math.random() * (trackCount - 1 ));
				
				if(n == index){
					if(n != 0) n--;
					else n++;
				}
								
				audio.pause();
				loadTrack(n);
				audio.play();
            }).get(0),
			/*
            btnPrev = $('#btnPrev').click(function () {
                if ((index - 1) > -1) {
                    index--;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),
            btnNext = $('#btnNext').click(function () {
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),
            li = $('#plList li').click(function () {
                var id = parseInt($(this).index());
                if (id !== index) {
                    playTrack(id);
                }
            }),
			*/
            loadTrack = function (id) {
                //$('.plSel').removeClass('plSel');
                //$('#plList li:eq(' + id + ')').addClass('plSel');
                //npTitle.text(tracks[id].name);
                index = id;
                audio.src = mediaPath + tracks[id].file + extension;
				console.log('loadTrack: '+id);
            },
            playTrack = function (id) {
                loadTrack(id);
                audio.play();
            };
			
		audio.volume = '0.1';
			
        extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
        loadTrack(index);
    }
});