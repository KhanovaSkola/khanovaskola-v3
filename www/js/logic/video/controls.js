define(['logic/video/player', 'logic/video/fullscreen'], function(player, fullscreen) {
	const $fullscreenButton = document.querySelector('.course-header-footer .video-fullscreen');
	const $playButton = document.querySelector('.course-header-footer .video-play');
	const $overlayPlayButton = document.querySelector('.video-wrapper .video-play');

	$fullscreenButton.addEventListener('click', event => {
		fullscreen.toggle();
		event.preventDefault();
	});

	$playButton.addEventListener('click', event => {
		player.togglePlay();
		event.preventDefault();
	});

	player.onPlay.push(function() {
		const icon = $playButton.querySelector('.icon').classList;
		icon.remove('icon-video-play');
		icon.add('icon-video-pause');

		$overlayPlayButton.classList.add('fade-out');
	});

	player.onPause.push(function() {
		const icon = $playButton.querySelector('.icon').classList;
		icon.add('icon-video-play');
		icon.remove('icon-video-pause');

		$overlayPlayButton.classList.remove('fade-out');
	});

	// Play/pause on spacebar
	document.addEventListener('keydown', event => {
		if (event.target.tagName.toLowerCase() === 'input'
		 || event.target.tagName.toLowerCase() === 'textarea') {
			return;
		}
		if (event.keyCode == 32) {
			player.togglePlay();
			event.preventDefault();
		}
	});

});
