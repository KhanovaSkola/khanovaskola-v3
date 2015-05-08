import {Track} from "./Track";

export class WaveSurferSound extends Track {
	constructor(wavesurfer) {
		super();
		this.wavesurfer = wavesurfer;
	}

	init() {
		this.wavesurfer.on('ready', this.ready.bind(this));
		this.wavesurfer.loadPredefined();
	}

	play() {
		this.wavesurfer.play();
	}

	pause() {
		this.wavesurfer.pause();
	}

	seek(percent) {
		this.wavesurfer.seekTo(percent);
	}
}
