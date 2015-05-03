import {Emitter} from '../vendor/emitter';
import {Recording} from "./Recording";

/**
 * [private] _recording Recording
 */
export class Track extends Emitter {
	constructor() {
		super();
	}

	set recording(recording) {
		//if (! (recording instanceof Recording)) {
		//	throw "TypeError: recording must be instance of Recording";
		//}
		this._recording = recording;
	}

	get recording() {
		return this._recording;
	}

	play() {};
	pause() {};
	seek(percent) {};

	init() {
		this.ready();
	};
	ready() {
		this.emit('ready');
	}
}
