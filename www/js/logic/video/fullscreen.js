define(['logic/video/player'], function(player) {
	const $course = document.querySelector('.course-video');
	const $progressBar = document.querySelector('.course-progress');

	let onChange = [];


	const isFullscreen = function() {
		return document.fullscreenElement
			|| document.mozFullScreenElement
			|| document.webkitFullscreenElement
			|| document.msFullscreenElement;
	};

	const toggle = function() {
		const fullscreen = isFullscreen();
		if (fullscreen) {
			const exit = document.exitFullscreen || document.mozCancelFullScreen || document.webkitExitFullscreen || document.msExitFullscreen;
			exit.call(document);

		} else {
			const rfs = $course.requestFullScreen || $course.webkitRequestFullScreen || $course.mozRequestFullScreen || $course.msRequestFullscreen;
			rfs.call($course);
		}

		$course.classList.toggle('fullscreen', fullscreen);
	};

	const changeHandler = function() {
		const fullscreen = isFullscreen();

		$course.classList.toggle('fullscreen', fullscreen);
		$progressBar.classList.toggle('active-fs', fullscreen);

		for (let cb of onChange) {
			cb(player.getCurrentTime(), fullscreen);
		}
	};
	document.addEventListener('fullscreenchange', changeHandler);
	document.addEventListener('webkitfullscreenchange', changeHandler);
	document.addEventListener('mozfullscreenchange', changeHandler);
	document.addEventListener('msfullscreenchange', changeHandler);

	return {
		toggle: toggle,
		onChange: onChange
	};
});
