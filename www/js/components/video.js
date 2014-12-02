(function() {
	var $course = $('.course-video');
	if (!$course.length) {
		return;
	}

	var $overlay = $course.find('.left:first');
	var $shadow = $course.find('.right .right-inner');
	var $overlayPlayButton = $course.find('.video-play');
	var $videoPreview = $course.find('.video-preview');
	var $videoReal = $course.find('.video-real');
	var $videoControls = $course.find('.course-header-footer .left');
	var $progressContainer = $course.find('.course-progress-container');
	var $progressBar = $progressContainer.find('.course-progress');
	var $progressInner = $progressContainer.find('.progress-inner');
	var $clickCatcher = $course.find('.video-click-catcher');
	var $subtitlesContent = $course.find('.video-subtitles .subtitles-content');
	var subtitlesUrl = $course.find('[data-subtitles-url]').data('subtitles-url');
	var subs = false;

	if (subtitlesUrl) {
		SrtParser.fetch(subtitlesUrl, function(srt) {
			subs = SrtParser.parse(srt);
		});
	}

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
		$progressInner.css('width', percent * 100 + '%');
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

	var isFullscreen = function() {
		return document.fullscreenElement
		|| document.mozFullScreenElement
		|| document.webkitFullscreenElement
		|| document.msFullscreenElement;
	}

	var toggleFullscreen = function() {
		if (isFullscreen()) {
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

	$(document).on('fullscreenchange webkitfullscreenchange mozfullscreenchange msfullscreenchange', function(e) {
		if (!isFullscreen()) {
			$course.removeClass('fullscreen');
		}
	});

	var renderSubtitle = function(text) {
		$subtitlesContent.text(text);
	};

	var progressBarDelta = 1300;
	var hideControls;
	$course.on('mousemove', function() {
		clearTimeout(hideControls);
		$progressBar.addClass('active');

		hideControls = setTimeout(function() {
			$progressBar.removeClass('active');
		}, progressBarDelta);
	});

	/**
	 * Play/pause on spacebar
	 */
	$('body').on('keydown', function(e) {
		if (e.target.tagName.toLowerCase() === 'input') {
			return true;
		}
		if (e.keyCode == 32) {
			togglePlay();
			return false;
		}
	});

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

	var lastIndex = false;
	App.video.onTick.push(function() {
		var now = App.video.player.getCurrentTime();

		if (lastIndex) {
			if (subs[lastIndex][0] <= now && subs[lastIndex][1] >= now) {
				console.debug('optimization (do not rerender)');
				return;
			}
			if (subs[lastIndex + 1][0] <= now && subs[lastIndex + 1][1] >= now) {
				lastIndex = lastIndex + 1;
				console.debug('optimization (rerender)');
				renderSubtitle(subs[lastIndex][2]);
				return;
			}
		}

		console.debug('searching', now);
		subs.every(function(node, index) {
			if (node[0] <= now) {
				if (node[1] >= now) {
					console.debug('costly sub search');
					renderSubtitle(node[2]);
					lastIndex = index;
					return false;
				}
			}
			return true;
		});
	});

	App.video.onPlay.push(function() {
		$videoControls.find('.toggle .icon').addClass('icon-pause').removeClass('icon-play');
		$overlayPlayButton.fadeOut(180);
	});

	App.video.onPause.push(function() {
		$videoControls.find('.toggle .icon').addClass('icon-play').removeClass('icon-pause');
		$overlayPlayButton.fadeIn(180);
	});

	App.video.onSeek.push(function() {
		if ($overlay.is(':visible')) {
			startVideoWithFadeout();
		}
	});

	var started = false;
	App.video.onInit.push(function() {
		$videoControls.find('.toggle')
			.on('click', function() {
				togglePlay();
				return false;
			});

		$videoControls.find('.video-fullscreen').on('click', toggleFullscreen);

		$progressContainer.on('mousedown', function(e) {
			if (e.which != 1) {
				// not left mouse button
				return false;
			}

			seek(e);
			$(document).on('mousemove', seek);
			$(document).on('mouseup', function() {
				$(document).off('mousemove').off('mouseup');
			});
		});
	});

	App.video.init();
})();
