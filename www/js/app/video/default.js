define([
	'logic/video/fullscreen',
	'logic/video/player',
	'logic/video/progress',
	'logic/video/subtitles',
	'logic/video/clickCatcher',
	'logic/video/controls',
	'logic/video/report'
], function(fullscreen, player, progress, subtitles) {
	const $wrapper = document.querySelector('.video-wrapper');

	const $videoPreview = document.querySelector('.video-preview');
	const $overlay = document.querySelector('.course-header-content .left');
	const $shadow = document.querySelector('.course-header-content .right .right-inner');
	const $videoReal = document.querySelector('.video-real');
	const $overlayPlayButton = document.querySelector('.video-wrapper .video-play');

	let overlayVisible = true;

	subtitles.load($wrapper.dataset.subtitlesUrl);
	player.init();

	player.onPlay.push(() => {
		if (overlayVisible) {
			$videoPreview.classList.add('hidden');
			$overlay.classList.add('hidden');
			$videoReal.classList.remove('hidden-video');
			$shadow.classList.add('video-playmode');
			$overlayPlayButton.classList.remove('dont-center');

			overlayVisible = false;
		}
	});

	player.onShortTick.push(time => {
		subtitles.show(time);
		progress.update(time);
	});

	player.onSeek.push((time, before) => {
		progress.update(time);
	});
});
