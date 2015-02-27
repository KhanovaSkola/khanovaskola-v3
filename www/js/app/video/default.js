define([
	'logic/video/fullscreen',
	'logic/video/player',
	'logic/video/progress',
	'logic/video/remote',
	'logic/video/subtitles',
	'services/timer',
	'logic/video/clickCatcher',
	'logic/video/controls'
], function(fullscreen, player, progress, remote, subtitles, timer) {
	const $wrapper = document.querySelector('.video-wrapper');

	const $videoPreview = document.querySelector('.video-preview');
	const $overlay = document.querySelector('.course-header-content .left');
	const $shadow = document.querySelector('.course-header-content .right .right-inner');
	const $videoReal = document.querySelector('.video-real');
	const $overlayPlayButton = document.querySelector('.video-wrapper .video-play');

	let secondsWatched = 0;
	let furthest = 0;
	let watched = false;
	let pause = {
		at: null,
		timer: null
	};
	let overlayVisible = true;

	subtitles.load($wrapper.dataset.subtitlesUrl);
	player.init();


	const sendPosition = function(time) {
		secondsWatched += player.delta.long / 1000;
		if (time > furthest) {
			furthest = time;
		}

		const percent = secondsWatched / player.video.duration * 100;
		remote.call('tick', {
			percent: percent === Infinity ? 0 : percent,
			time: secondsWatched,
			furthest: furthest,
			watched: watched
		}, payload => {
			watched = payload.watched;
		});
	};


	player.onInit.push(() => {
		remote.call('init');
	});

	player.onPlay.push(() => {
		if (overlayVisible) {
			$videoPreview.classList.add('hidden');
			$overlay.classList.add('hidden');
			$videoReal.classList.remove('hidden-video');
			$shadow.classList.add('video-playmode');
			$overlayPlayButton.classList.remove('dont-center');

			overlayVisible = false;
		}

		if (pause.at) {
			remote.call('pause', {
				at: pause.at,
				duration: pause.timer() / 1000
			});
		}
	});

	player.onPause.push(time => {
		pause.at = time;
		pause.timer = timer.create();
		sendPosition(time);
	});

	player.onShortTick.push(time => {
		subtitles.show(time);
		progress.update(time);
	});

	player.onLongTick.push(sendPosition);

	player.onSeek.push((time, before) => {
		progress.update(time);

		remote.call('seek', {
			from: before,
			to: time
		});
	});

	player.onStop.push(sendPosition);

	fullscreen.onChange.push((time, status) => {
		remote.call('init', {
			at: time,
			isFullscreenNow: status
		});
	});
});
