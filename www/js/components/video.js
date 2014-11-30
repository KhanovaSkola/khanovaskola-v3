(function() {
	var $headerFooterActions = $('.course-header-footer .left');
	if (!$headerFooterActions.length) {
		return;
	}

	var $wrapper = $('.video-wrapper');
	$('.video-fullscreen').click(function() {
		var el = $('.course-header-content')[0];
		var rfs = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen;
		rfs.call(el);
	});

	$(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange', function(e) {
		var isFS = document.fullscreen || document.mozFullScreen || document.webkitIsFullScreen || document.msFullscreenElement || false;
		$wrapper.toggleClass('fullscreen', isFS);
	});

	$headerFooterActions.hide();

	var tag = document.createElement('script');
	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	var player;

	window.onYouTubeIframeAPIReady = function() {
		player = new YT.Player('youtube-video', {
			events: {
				'onReady': onPlayerReady,
				'onStateChange': onPlayerStateChange
			}
		});
	};

	var $playBtn = $('.video-wrapper .video-play');
	var $rightInner = $playBtn.parents('.right-inner').first();
	var $courseHeaderContentLeft = $('.course-header-content').find('.left');

	function showOverlay() {
		$courseHeaderContentLeft.show();
		$playBtn.show();
		$rightInner.removeClass('video-playmode');
	}

	function hideOverlay() {
		$courseHeaderContentLeft.hide();
		$playBtn.hide();
		$rightInner.addClass('video-playmode');
	}

	function startVideoWithFadeout() {
		var $videoPreview = $rightInner.find('.video-preview');
		var $videoReal = $rightInner.find('.video-real');

		$playBtn.fadeOut(100);
		$videoPreview.fadeOut(500);
		$courseHeaderContentLeft.fadeOut(500);
		$videoReal.hide().removeClass('hidden');

		player.playVideo();

		var timeout2 = setTimeout(function () {
			$rightInner.addClass('video-playmode');
			$headerFooterActions.fadeIn(700);
			$videoReal.fadeIn(700);
		}, 700);

		return false;
	}

	var started = false;
	function onPlayerReady() {
		$('.video-play').on('click', function() {
			if (!started) {
				startVideoWithFadeout();
			} else {
				player.playVideo();
			}
			started = true;
		});
		$('.course-header-footer .toggle').on('click', function () {
			if (player.getPlayerState() != 1) {
				player.playVideo();
			} else {
				player.pauseVideo();
			}

			return false;
		});

		var $icon = $('.course-header-footer .toggle .icon');
		$wrapper.on('video-play', function() {
			hideOverlay();
			$icon.removeClass('icon-play').addClass('icon-pause');
		});
		$wrapper.on('video-pause', function() {
			showOverlay();
			$icon.removeClass('icon-pause').addClass('icon-play');
		});

	}

	var lastState = -1;
	function onPlayerStateChange(state) {
		if (lastState == state.data) {
			return;
		}
		lastState = state.data;
		switch (state.data)
		{
			case 1:
				$wrapper.trigger('video-play');
				break;
			case 2:
				$wrapper.trigger('video-pause');
				break;
			case 0:
				$wrapper.trigger('video-stop');
				break;
		}
	}

})();
