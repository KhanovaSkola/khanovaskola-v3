import {Emitter} from '../vendor/emitter';
import {Sound} from './Sound';

/**
 * tracks Track[]
 * tracksLoaded int
 * recording Recording
 * playing bool
 */
export class Controller extends Emitter {
	/**
	 * args: {
	 *   $toggle: element
	 *   tracks: Track[]
	 *   timeline: WaveSurfer
	 * }
	 */
	constructor(args) {
		super();

		this.tracks = args.tracks;
		this.tracksLoaded = 0;
		this.player = false;
		this.recording = args.recording;

		this.timeline = args.timeline;
		this.timeline.on('seek', percent => {
			for (var track of this.tracks) {
				if (! (track instanceof Sound)) {
					track.seek(percent);
				}
			}
		});

		this.$toggle = args.$toggle;
		this.$toggle.addEventListener('click', this.toggle.bind(this));

		for (var track of this.tracks) {
			track.recording = this.recording;
			track.on('ready', event => {
				if (++this.tracksLoaded == this.tracks.length) {
					this.allTracksReady();
				}
			});
		}
	}

	registerKey(code, cb) {
		document.addEventListener('keydown', event => {
			if (event.target.tagName === 'INPUT') {
				return;
			}
			if (event.keyCode !== code) {
				return;
			}

			cb(event);
			event.preventDefault();
		});
	}

	registerKeys() {
		// space
		this.registerKey(32, this.toggle.bind(this));


		const duration = this.timeline.duration;

		// arrow left
		this.registerKey(37, event => {
			const now = this.timeline.getCurrentTime();
			const percent = Math.max(0, now - 5) / duration;
			this.seek(percent);
		});
		// arrow right
		this.registerKey(39, event => {
			const now = this.timeline.getCurrentTime();
			// max intentionally lowered because when seek is max,
			// it starts playing from beginning
			const percent = Math.min(duration - 0.1, now + 5) / duration;
			this.seek(percent);
		});
	}

	init() {
		for (var track of this.tracks) {
			track.init();
		}
	}

	allTracksReady() {
		this.registerKeys();
		this.emit('ready');
	}

	play() {
		this.playing = true;
		for (var track of this.tracks) {
			track.play();
		}
	}

	pause() {
		for (var track of this.tracks) {
			track.pause();
		}
		this.playing = false;
	}

	toggle() {
		if (this.playing) {
			this.pause();

		} else {
			this.play();
		}
	}

	seek(percent) {
		for (var track of this.tracks) {
			track.seek(percent);
		}
	}

	getPercent() {
		return this.timeline.getCurrentTime() / this.timeline.duration;
	}

}
