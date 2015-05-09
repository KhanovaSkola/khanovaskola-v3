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

		for (var track of this.tracks) {
			track.recording = this.recording;
			track.on('ready', event => {
				if (++this.tracksLoaded == this.tracks.length) {
					this.allTracksReady();
				}
			});
		}
	}

	init() {
		for (var track of this.tracks) {
			track.init();
		}
	}

	allTracksReady() {
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

	resize(size) {
		for (var track of this.tracks) {
			track.resize(size);
		}
	}

}
