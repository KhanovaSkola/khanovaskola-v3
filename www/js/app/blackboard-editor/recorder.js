define([
	'lib/blackboard/recorder'
], function(Recorder) {
	const onSave = function(json, audioBlob) {
		const jsonBlob = new Blob([json], {type: 'application/json'});

		var formData = new FormData();
		formData.append('json', jsonBlob);
		formData.append('audio', audioBlob);
		formData.append('do', 'upload-submit');

		const $button = document.getElementById('save');

		var request = new XMLHttpRequest();
		request.open('POST', '/blackboard-editor/recorder'); // TODO
		request.upload.addEventListener("progress", event => {
			if (!$button.dataset.label) {
				$button.dataset.label = $button.innerHTML;
			}

			const percent = Math.round(event.loaded / event.total * 100);
			$button.innerHTML = `Uploading ${percent}%`;
			$button.disabled = true;
		});
		request.onreadystatechange = function() {
			if (request.readyState !== 4 || request.status !== 200) {
				return;
			}
			$button.innerHTML = $button.dataset.label;
			$button.disabled = false;

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
