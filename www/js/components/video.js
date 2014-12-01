(function() {
	var $course = $('.course-video');
	if (!$course.length) {
		return;
	}

	var $content = $course.find('.course-header-content');
	var $overlay = $course.find('.left:first');
	var $shadow = $course.find('.right .right-inner');
	var $overlayPlayButton = $course.find('.video-play');
	var $videoPreview = $course.find('.video-preview');
	var $videoReal = $course.find('.video-real');
	var $videoControls = $course.find('.course-header-footer .left');
	var $progressContainer = $course.find('.course-header-progress');
	var $progress = $progressContainer.find('.progress-inner');
	var $clickCatcher = $course.find('.video-click-catcher');

	function startVideoWithFadeout() {
		$overlayPlayButton.fadeOut(100);
		$videoPreview.fadeOut(500);
		$overlay.fadeOut(500);
		$videoReal.hide().removeClass('hidden');

		App.video.player.playVideo();

		setTimeout(function () {
			$shadow.addClass('video-playmode');
			$videoControls.fadeIn(700);
			$videoReal.fadeIn(700);

			$overlayPlayButton.removeClass('dont-center');
		}, 700);
	}

	var updateProgress = function(current) {
		if (!current) {
			current = App.video.player.getCurrentTime();
		}
		var percent = current / App.video.duration;
		$progress.css('width', percent * 100 + '%');
		$progressContainer.find('.label-left').text(App.filters.duration(current));
	};

	var seek = function(e) {
		var current = e.clientX || e.pageX;
		var total = $(window).width();
		var seconds = App.video.duration * current / total;

		App.video.player.seekTo(seconds, true);
		App.callAll(App.video.onSeek);

		updateProgress(seconds);

		// prevent selecting text when seeking
		return false;
	};

	var togglePlay = function() {
		if (App.video.player.getPlayerState() != 1) {
			if (!started) {
				startVideoWithFadeout();
			} else {
				App.video.player.playVideo();
			}
			started = true;
		} else {
			App.video.player.pauseVideo();
		}
	};

	var toggleFullscreen = function() {
		if (document.fullscreenElement
			|| document.mozFullScreenElement
			|| document.webkitFullscreenElement
			|| document.msFullscreenElement) {
			var exit = document.exitFullscreen || document.mozCancelFullScreen || document.webkitExitFullscreen || document.msExitFullscreen;
			exit.call(document);
			$course.removeClass('fullscreen');

		} else {
			var el = $course[0];
			var rfs = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen;
			rfs.call(el);
			$course.addClass('fullscreen');
		}

		return false;
	};

	/**
	 * Custom double click handler
	 * clickDelta timeout after first click
	 * - if clicked again, just invoke double click
	 * - if clicked again after clickDelta, rollback
	 *   from whatever click did and invoke double click
	 */
	var lastClickAt = 0;
	var clickDelta = 200;
	var doubleClickDelta = 600;
	var seekBackOnDoubleClick = false;
	var doClick;
	$clickCatcher.on('click', function() {
		clearTimeout(doClick);

		var now = window.performance ? window.performance.now() : Date.getTime();
		doClick = setTimeout(function() {
			togglePlay();
			seekBackOnDoubleClick = App.video.player.getCurrentTime();
		}, clickDelta);
		setTimeout(function() {
			seekBackOnDoubleClick = false;
		}, doubleClickDelta);

		if (now - lastClickAt < doubleClickDelta) {
			clearTimeout(doClick);
			if (seekBackOnDoubleClick) {
				togglePlay();
				App.video.player.seekTo(seekBackOnDoubleClick);
				seekBackOnDoubleClick = false;
			}
			toggleFullscreen();
		}
		lastClickAt = now;

		return false;
	});

	$overlay.on('click', function() {
		return false;
	});

	App.video.onTick.push(updateProgress);

	App.video.onPlay.push(function() {
		$videoControls.find('.toggle .icon').addClass('icon-pause').removeClass('icon-play');
		$overlayPlayButton.fadeOut(180);
	});

	App.video.onPause.push(function() {
		$videoControls.find('.toggle .icon').addClass('icon-play').removeClass('icon-pause');
		$overlayPlayButton.fadeIn(180);
	});

	var started = false;
	App.video.onInit.push(function() {
		$videoControls.find('.toggle')
			.add($overlayPlayButton)
			.on('click', function() {
				togglePlay();
				return false;
			});

		$videoControls.find('.video-fullscreen').on('click', toggleFullscreen);

		$progressContainer.on('mousedown', function(e) {
			seek(e);
			$(document).on('mousemove', seek);
		});
		$(document).on('mouseup', function() {
			$(document).off('mousemove');
		});
	});

	App.video.init();
})();
