import {Recorder} from "./src/Recorder";
import {EditedRecording} from "./src/EditedRecording";

define('lib/blackboard/recorder', function() {
	return function(opts) {
		const penApi = document.getElementById('wtPlugin').penAPI;

		//console.log('pointer type:', penApi ? penApi.pointerType : "unknown");
		//console.log('tablet model:', penApi ? penApi.tabletModel : "unknown");

		const colors = opts.colors;

		for (var $input of colors) {
			const c = JSON.parse($input.dataset.color);
			$input.style.backgroundColor = `rgb(${c[0]}, ${c[1]}, ${c[2]})`;
		}

		const recording = new EditedRecording();
		return new Recorder(opts.$canvas, opts.$time, opts.$onair,
			recording, penApi, colors, opts.workerPath, opts.onSave);
	};
});
