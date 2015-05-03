require('babelify/polyfill');

import {Blackboard} from "../src/Blackboard";
import {Controller} from "../src/Controller";
import {RandomRecording} from "../src/RandomRecording";
import {HardcodedRecording} from "../src/HardcodedRecording";
import {Sound} from "../src/Sound";
import {WaveSurferFactory} from "../src/WaveSurferFactory";

const size = {width: 800, height: 380};
const recording = new HardcodedRecording(size.width * 10, size.height * 10);

const wavesurfer = WaveSurferFactory.create(
	document.getElementById('wave'), recording.getSoundPath());

const controller = new Controller({
	$toggle: document.getElementById('toggle'),
	recording: recording,
	timeline: wavesurfer,
	tracks: [
		new Sound(wavesurfer),
		new Blackboard(document.getElementById('canvas'), size),
	]
});
controller.on('ready', event => {
	controller.play();
});
controller.init();
