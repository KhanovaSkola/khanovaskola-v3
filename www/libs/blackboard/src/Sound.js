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

		this.audio.addEventListener('canplay', this.ready.bind(this));
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

		const audio = this.audio;
		this.audio.addEventListener('canplay', event => {
			audio.currentTime = time;
		});
	}
}
