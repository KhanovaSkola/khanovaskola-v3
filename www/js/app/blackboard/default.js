define([
	'lib/blackboard/player'
], function(Player) {
	const $data = document.querySelector('[data-blackboard-file]');
	const width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	const file = $data.dataset.blackboardFile;

	const client = new XMLHttpRequest();
	client.open('GET', file);
	client.onreadystatechange = function() {
		if (client.readyState !== 4 || client.status !== 200) {
			return;
		}

		const recording = JSON.parse(client.responseText);
		recording.soundPath = file.replace(/\.json$/, '.wav');
		new Player({
			recording: recording,
			size: {width: width, height: 450},
			$wave: document.getElementById('wave'),
			$toggle: document.getElementById('toggle'),
			$canvas: document.getElementById('canvas'),
		});
	};
	client.send();
});
