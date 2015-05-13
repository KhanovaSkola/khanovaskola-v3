import {Track} from "./Track";

export class Sound extends Track {
	constructor(soundFile) {
		super();

		this.audio = new Audio(soundFile);
		this.audio.autoplay = false;
	}

	init() {
		if (this.audio.readyState === this.audio.HAVE_ENOUGH_DATA) {
			this.ready();
			return;
		}

		const onReady = function() {
			this.audio.removeEventListener('canplay', onReady);
			this.ready();
		}.bind(this);
		this.audio.addEventListener('canplay', onReady);
	}

	play() {
		this.audio.play();
	}

	pause() {
		this.audio.pause();
	}

	seek(time) {
		if (this.audio.readyState === this.audio.HAVE_ENOUGH_DATA) {
			this.audio.currentTime = time;
			return;
		}

		const onReady = (function() {
			this.audio.removeEventListener('canplay', onReady);
			this.audio.currentTime = time;
		}).bind(this);
		this.audio.addEventListener('canplay', onReady);
	}
}
