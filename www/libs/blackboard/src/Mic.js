import {Recorderjs} from "../vendor/Recorder";

export class Mic {
	constructor() {
		const nav = window.navigator;
		nav.getUserMedia = (
			nav.getUserMedia ||
			nav.webkitGetUserMedia ||
			nav.mozGetUserMedia ||
			nav.msGetUserMedia
		);
		this.navigator = nav;

		const AudioContext = window.AudioContext || window.webkitAudioContext;
		this.context = new AudioContext();

		this.navigator.getUserMedia({
			audio: true
		}, localMediaStream => {
			this.mediaStream = localMediaStream;

			var mediaStreamSource = this.context.createMediaStreamSource(localMediaStream);
			this.rec = new Recorderjs(mediaStreamSource, {
				workerPath: '../vendor/recorderWorker.js'
			});

		}, err => {
			console.log('Browser not supported');
		});
	}

	record() {
		this.rec.record();
	}

	pause() {
		this.rec.stop();
	}

	stop() {
		this.pause();

		this.mediaStream.stop();
		this.rec.exportWAV(e => {
			console.log(e);
			this.rec.clear();
			Recorderjs.forceDownload(e, "filename.wav");
		});
	}
}
