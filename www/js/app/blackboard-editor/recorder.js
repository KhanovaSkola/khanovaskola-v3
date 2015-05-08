define([
	'lib/blackboard/recorder'
], function(Recorder) {
	const onSave = function(json, audioBlob) {
		const jsonBlob = new Blob([json], {type: 'application/json'});

		var formData = new FormData();
		formData.append('json', jsonBlob);
		formData.append('audio', audioBlob);
		formData.append('do', 'upload-submit');

		var request = new XMLHttpRequest();
		request.open('POST', '/blackboard-editor/'); // TODO
		request.onreadystatechange = function() {
			if (request.readyState !== 4 || request.status !== 200) {
				return;
			}
			const data = JSON.parse(request.responseText);
			window.location.replace(data.redirect);
		};
		request.send(formData);
	};

	const recorder = new Recorder({
		colors: document.getElementById('colors').querySelectorAll('input'),
		$canvas: document.getElementById('canvas'),
		$time: document.getElementById('time'),
		$onair: document.getElementById('onair'),
		workerPath: '/libs/blackboard/vendor/recorderWorker.js',
		onSave: onSave,
	});
});