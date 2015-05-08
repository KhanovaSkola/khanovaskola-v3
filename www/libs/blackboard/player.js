import {Blackboard} from "./src/Blackboard";
import {Controller} from "./src/Controller";
import {RandomRecording} from "./src/RandomRecording";
import {HardcodedRecording} from "./src/HardcodedRecording";
import {Sound} from "./src/Sound";
import {Timeline} from "./src/Timeline";
import {WaveSurferFactory} from "./src/WaveSurferFactory";

define('lib/blackboard/player', function() {
	// recording, size (width, height), $toggle, $canvas, $timeline
	return function(opts) {
		const size = {width: opts.size.width, height: opts.size.height};

		const sound = new Sound(opts.recording.soundPath);
		const controller = new Controller({
			$toggle: opts.$toggle,
			recording: opts.recording,
			timeline: new Timeline(opts.$timeline, sound),
			tracks: [
				sound,
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
