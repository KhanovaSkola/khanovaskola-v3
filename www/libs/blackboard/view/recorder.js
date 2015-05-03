require('babelify/polyfill');

import {Recorder} from "../src/Recorder";
import {EditedRecording} from "../src/EditedRecording";

const penApi = document.getElementById('wtPlugin').penAPI;

console.log('pointer type:', penApi ? penApi.pointerType : "unknown");
console.log('tablet model:', penApi ? penApi.tabletModel : "unknown");

const colors = document.getElementById('colors').querySelectorAll('input');

for (var $input of colors) {
	const c = JSON.parse($input.dataset.color);
	$input.style.backgroundColor = `rgb(${c[0]}, ${c[1]}, ${c[2]})`;
}

const recording = new EditedRecording();
const recorder = new Recorder(recording, penApi, colors);

window.r = recording; // todo remove
