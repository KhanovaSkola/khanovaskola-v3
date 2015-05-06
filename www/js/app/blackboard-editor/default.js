define([
	'lib/blackboard/recorder'
], function(Recorder) {
	const recorder = new Recorder({
		colors: document.getElementById('colors').querySelectorAll('input'),
		$canvas: document.getElementById('canvas'),
		$time: document.getElementById('time'),
		$onair: document.getElementById('onair'),
		workerPath: '/libs/blackboard/vendor/recorderWorker.js',
	});
});
