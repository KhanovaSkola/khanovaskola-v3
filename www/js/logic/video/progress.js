define([
	'logic/video/player',
	'services/filters'
], function(player, filters) {
	const $controls = document.querySelector('.video-controls');
	const $container = document.querySelector('.course-progress-container');
	const $bar = document.querySelector('.course-progress');
	const $inner = document.querySelector('.progress-inner');

	const update = time => {
		const percent = time / player.video.duration;
		$inner.style.width = percent * 100 + '%';
		$container.querySelector('.label-left').innerText = filters.duration(time);
	};
	update($container.dataset.initial);

	let hideControls = null;
	document.addEventListener('mousemove', () => {
		clearTimeout(hideControls);

		$controls.classList.add('active');
		$bar.classList.add('active');

		hideControls = setTimeout(function() {
			$bar.classList.remove('active');
			$controls.classList.remove('active');
		}, 3000);
	});

	const seek = function(event, last = false) {
		const current = event.clientX || event.pageX;
		const width = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
		const time = player.video.duration * current / width;
		player.seek(time, last);
	};

	const handleOn = function(event) {
		if (event.which != 1) {
			// not left mouse button
			return;
		}

		const reset = function(event) {
			seek(event, true);
			document.removeEventListener('mousemove', seek);
			document.removeEventListener('mouseup', reset);
		};
		document.addEventListener('mousemove', seek);
		document.addEventListener('mouseup', reset);
	};

	$container.addEventListener('mousedown', handleOn);

	return {
		update: update
	};
});
