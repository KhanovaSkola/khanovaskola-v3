define([
	'lib/blackboard/player'
], function(Player) {
	let player;
	let fullscreen = {toggle: function() {}}; // TODO

	{
		const $data = document.querySelector('[data-blackboard-file]');
		const width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
		const file = $data.dataset.blackboardFile;

		const client = new XMLHttpRequest();
		client.open('GET', file);
		client.onreadystatechange = function () {
			if (client.readyState !== 4 || client.status !== 200) {
				return;
			}

			const recording = JSON.parse(client.responseText);
			recording.soundPath = file.replace(/\.json$/, '.wav');
			player = new Player({
				recording: recording,
				size: {width: width, height: 450},
				$wave: document.getElementById('wave'),
				$toggle: document.querySelector('.video-controls .toggle'),
				$canvas: document.getElementById('canvas'),
			});
		};
		client.send();
	}

	const $left = document.querySelector('.course-header-content .left');
	const $shadow = document.querySelector('.course-header-content .right .right-inner');
	const $preview = document.querySelector('.video-preview');
	const $playButton = document.querySelector('.video-play');
	let removeOverlay = true;
	const toggleStatus = function() {
		if (removeOverlay) {
			$preview.classList.add('hidden');
			$left.classList.add('hidden');
			$shadow.classList.add('video-playmode');
			removeOverlay = false;
		}

		$playButton.classList.toggle('hidden');
		player.toggle();
	};

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
});
