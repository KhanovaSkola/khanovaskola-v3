define([
	'lib/blackboard/player'
], function(Player) {
	const $rec = document.querySelector('[data-recording]');
	const recording = JSON.parse($rec.dataset.recording);

	const player = new Player({
		recording: recording,
		size: {width: 800, height: 360},
		$wave: document.getElementById('wave'),
		$toggle: document.getElementById('toggle'),
		$canvas: document.getElementById('canvas'),
	});
});
