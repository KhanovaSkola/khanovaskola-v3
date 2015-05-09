define([
	'lib/blackboard/player',
	'services/filters'
], function(Player, filters) {
	const fullscreen = {toggle: function() {}}; // set in fullscreen setup below

	const onPlayerReady = function(player, recording) {
		const $left = document.querySelector('.course-header-content .left');
		const $shadow = document.querySelector('.course-header-content .right .right-inner');
		const $preview = document.querySelector('.video-preview');
		const $playButton = document.querySelector('.video-play');
		const $toggle = document.querySelector('.video-play .toggle');
		let removeOverlay = true;
		const toggleStatus = function() {
			if (removeOverlay) {
				$preview.classList.add('hidden');
				$left.classList.add('hidden');
				$shadow.classList.add('video-playmode');
				removeOverlay = false;
			}

			player.toggle();

			const list = $toggle.querySelector('i').classList;
			if (player.playing) {
				list.add('icon-video-pause');
				list.remove('icon-video-play');
			} else {
				list.add('icon-video-play');
				list.remove('icon-video-pause');
			}

			$playButton.classList.toggle('hidden');
		};

		// keyboard
		{
			const registerKey = function(code, cb) {
				document.addEventListener('keydown', event => {
					if (event.target.tagName === 'INPUT') {
						return;
					}
					if (event.keyCode !== code) {
						return;
					}

					cb(event);
					event.preventDefault();
				});
			};

			// space
			registerKey(32, toggleStatus);

			// arrow left
			registerKey(37, event => {
				const duration = player.timeline.getDuration();
				const now = player.timeline.getCurrentTime();
				const percent = Math.max(0, now - 5) / duration;
				player.seek(percent);
			});
			// arrow right
			registerKey(39, event => {
				const duration = player.timeline.getDuration();
				const now = player.timeline.getCurrentTime();
				const percent = Math.min(duration, now + 5) / duration;
				player.seek(percent);
			});

		}

		// click catcher
		{
			const $clickCatcher = document.querySelector('.video-click-catcher');

			const clickDelta = 200;
			const doubleClickDelta = 600;
			let lastClickAt = 0;
			let seekBackOnDoubleClick = false;
			let doClick;
			$clickCatcher.addEventListener('click', event => {
				clearTimeout(doClick);

				var now = window.performance ? window.performance.now() : (new Date).getTime();
				doClick = setTimeout(() => {
					toggleStatus();
					seekBackOnDoubleClick = player.getPercent();
				}, clickDelta);
				setTimeout(() => {
					seekBackOnDoubleClick = false;
				}, doubleClickDelta);

				if (now - lastClickAt < doubleClickDelta) {
					clearTimeout(doClick);
					if (seekBackOnDoubleClick) {
						toggleStatus();
						player.seek(seekBackOnDoubleClick);
						seekBackOnDoubleClick = false;
					}
					fullscreen.toggle();
				}
				lastClickAt = now;

				event.preventDefault();
			});
		}

		// small play button
		{
			$toggle.addEventListener('click', event => {
				toggleStatus();
				event.preventDefault();
			});
		}

		{
			const $controls = document.querySelector('.video-controls');
			const $container = document.querySelector('.course-progress-container');
			const $bar = document.querySelector('.course-progress');
			const $inner = document.querySelector('.progress-inner');

			const update = function(time) {
				const percent = time / player.timeline.getDuration();
				$inner.style.width = percent * 100 + '%';
				$container.querySelector('.label-left').textContent = filters.duration(time);
			};
			update($container.dataset.initial);
			player.timeline.on('tick', event => {
				update(player.timeline.getCurrentTime());
			});

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

			const seekFromEvent = function(event) {
				const current = event.clientX || event.pageX;
				const width = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
				const time = recording.duration * current / width;
				player.seek(time / recording.duration);
			};

			const handleOn = function(event) {
				if (event.which != 1) {
					// not left mouse button
					return;
				}

				const reset = function(event) {
					seekFromEvent(event);
					document.removeEventListener('mousemove', seekFromEvent);
					document.removeEventListener('mouseup', reset);
				};
				document.addEventListener('mousemove', seekFromEvent);
				document.addEventListener('mouseup', reset);
			};

			$container.addEventListener('mousedown', handleOn);
		}

		// fullscreen
		{
			const $fsButton = document.querySelector('.video-fullscreen');
			const $course = document.querySelector('.course-video');
			const $progressBar = document.querySelector('.course-progress');
			const isFullscreen = function() {
				return document.fullscreenElement
					|| document.mozFullScreenElement
					|| document.webkitFullscreenElement
					|| document.msFullscreenElement;
			};
			const resize = function(isFullscreen) {
				setTimeout(function() {
					player.resize({
						width: Math.max(document.documentElement.clientWidth, window.innerWidth || 400),
						height: isFullscreen
							? Math.max(document.documentElement.clientHeight, window.innerHeight || 250)
							: 450,
					});
				}, 250);
			};
			fullscreen.toggle = function() {
				const isFs = isFullscreen();
				if (isFs) {
					const exit = document.exitFullscreen || document.mozCancelFullScreen || document.webkitExitFullscreen || document.msExitFullscreen;
					exit.call(document);
					$course.classList.remove('fullscreen');

				} else {
					const rfs = $course.requestFullScreen || $course.webkitRequestFullScreen || $course.mozRequestFullScreen || $course.msRequestFullscreen;
					rfs.call($course);
					$course.classList.add('fullscreen');
				}
			};

			const changeHandler = function() {
				if (isFullscreen()) {
					$course.classList.add('fullscreen');
					$progressBar.classList.add('active-fs');
					resize(true);
				} else {
					$course.classList.remove('fullscreen');
					$progressBar.classList.remove('active-fs');
					resize(false);
				}
			};

			document.addEventListener('fullscreenchange', changeHandler);
			document.addEventListener('webkitfullscreenchange', changeHandler);
			document.addEventListener('mozfullscreenchange', changeHandler);
			document.addEventListener('msfullscreenchange', changeHandler);

			$fsButton.addEventListener('click', event => {
				fullscreen.toggle();
				event.preventDefault();
			});
		}
	};


	const $data = document.querySelector('[data-blackboard-file]');
	const width = Math.max(document.documentElement.clientWidth, window.innerWidth || 400);
	const file = $data.dataset.blackboardFile;

	const client = new XMLHttpRequest();
	client.open('GET', file);
	client.onreadystatechange = function() {
		if (client.readyState !== 4 || client.status !== 200) {
			return;
		}

		const recording = JSON.parse(client.responseText);
		recording.soundPath = file.replace(/\.json$/, '.wav');
		const player = new Player({
			recording: recording,
			size: {width: width, height: 450},
			$canvas: document.getElementById('canvas'),
			$timeline: document.getElementById('course-progress-container'),
		});
		onPlayerReady(player, recording);
	};
	client.send();
});
