import {Blackboard} from "./src/Blackboard";
import {Controller} from "./src/Controller";
import {RandomRecording} from "./src/RandomRecording";
import {HardcodedRecording} from "./src/HardcodedRecording";
import {Sound} from "./src/Sound";
import {WaveSurferFactory} from "./src/WaveSurferFactory";

define('lib/blackboard/player', function() {
	// recording, size (width, height), $wave, $toggle, $canvas
	return function(opts) {
		const size = {width: opts.size.width, height: opts.size.height};
		const wavesurfer = WaveSurferFactory.create(opts.$wave, opts.recording.soundPath);

		const controller = new Controller({
			$toggle: opts.$toggle,
			recording: opts.recording,
			timeline: wavesurfer,
			tracks: [
				new Sound(wavesurfer),
				new Blackboard(opts.$canvas, size),
			]
		});
		controller.on('ready', event => {
			//controller.play();
		});
		controller.init();

		return controller;
	};
});
