import {Emitter} from '../vendor/emitter';

/**
 * Emits tick event
 */
export class Timeline extends Emitter {
	constructor($el, sound) {
		super();

		this.$el = $el;
		this.sound = sound;

		sound.audio.addEventListener('timeupdate', event => {
			this.emit('tick');
		});
	}

	getDuration() {
		return this.sound.audio.duration;
	}

	getCurrentTime() {
		return this.sound.audio.currentTime;
	}
}
