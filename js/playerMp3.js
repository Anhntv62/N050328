jQuery(document).ready(function() {

    // inner variables
    var song;
    var tracker = $('.tracker');
    var volume = $('.volume');

    function initAudio(elem) {
        var url = elem.attr('audiourl');
        var title = elem.text();
        var cover = elem.attr('cover');
        var artist = elem.attr('artist');

        $('.player .title').text(title);
        $('.player .artist').text(artist);
		if(cover!=null){
			$('.player .cover').css('background-image','url(../data/' + cover+')');
		}
		if(url!=null){
			//url = 'data/' + url;
		}
        // song = new Audio('data/' + url);
		song = new Audio(url);

        // timeupdate event listener
        song.addEventListener('timeupdate',function (){
            var curtime = parseInt(song.currentTime, 10);
            tracker.slider('value', curtime);
			tracker.slider('option', 'max', song.duration);					
        });				
        $('.playlist li').removeClass('active');
        elem.addClass('active');
    }
    function playAudio() {
		song.volume = volCurrent;
        song.play();      
        coverRotate();
        $('.play').addClass('hidden');
        $('.pause').addClass('visible');
		$('.playerMini .player .logoMp3').css('background-image','url("images/player/blue50.gif")');
    }
    function stopAudio() {
        song.pause();
        clearInterval(myRotate);
        $('.play').removeClass('hidden');
        $('.pause').removeClass('visible');
		$('.playerMini .player .logoMp3').css('background-image','url("images/player/blue.png")');
    }

    // play click
    $('.play').click(function (e) {
        e.preventDefault();
		var play = $('.playlist li.active');
        if (play.length > 0) {
			playAudio();
		}
    });

    // pause click
    $('.pause').click(function (e) {
        e.preventDefault();
        stopAudio();
    });

    // forward click
    $('.fwd').click(function (e) {
        e.preventDefault();
        stopAudio();
        var next = $('.playlist li.active').next();
        if (next.length != 0) {
            initAudio(next);
			playAudio();
        }
    });

    // rewind click
    $('.rew').click(function (e) {
        e.preventDefault();
        stopAudio();
        var prev = $('.playlist li.active').prev();
        if (prev.length != 0) {
			initAudio(prev);
			playAudio();
        }
    });
	// tự động dừng và tự động phát trong playlist
	setInterval(function() {
		if(song.currentTime == song.duration){			
			stopAudio();
			var next = $('.playlist li.active').next();
			if (next.length != 0) {
				initAudio(next);
				playAudio();
			}
		}
	},1000);

    // playlist elements - click
    $('.playlist li').click(function () {		
        stopAudio();
        initAudio($(this));
        playAudio();
    });
	// initialization - first element in playlist
    initAudio($('.containerMP3 .playlist li:first'));	

    // set volume
    song.volume = 0.9;
	var volCurrent = song.volume;
    // set volume slider
    volume.slider({
        range: 'min',
        min: 0,
        max: 100,
        value: 90,
        start: function(event,ui) {},
        slide: function(event,ui) {
            song.volume = ui.value/100;
        },
        stop: function(event,ui) {
			volCurrent = song.volume;
		}
    });

    // set tracker slider
    tracker.slider({
        range: 'min',
        min: 0, max: 10,
        start: function(event,ui) {},
        slide: function(event,ui) {
            song.currentTime = ui.value;
        },
        stop: function(event,ui) {
		}
    });
    var i = 0;
    function coverRotate() {
        var coverRotate = $('.containerMP3 .cover');
        myRotate = setInterval(function(){
            coverRotate.css('transform', 'rotate('+i+'deg)');
            i+= 0.2; if(i==360) i = 0;
        }, 1);
    }      
});