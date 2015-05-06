define([
	'lib/blackboard/player'
], function(Player) {
	const $rec = document.querySelector('[data-recording]');
	const recording = JSON.parse($rec.dataset.recording);

	const width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);

	new Player({
		recording: recording,
		size: {width: width, height: 480},
		$wave: document.getElementById('wave'),
		$toggle: document.getElementById('toggle'),
		$canvas: document.getElementById('canvas'),
	});
});
