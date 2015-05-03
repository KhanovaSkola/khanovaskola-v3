import * as WaveSurfer from "../vendor/wavesurfer.cjs";

export class WaveSurferFactory {
	static create($container, file) {
		const wavesurfer = Object.create(WaveSurfer.default);
		wavesurfer.init({
		    container: $container,
		    waveColor: 'violet',
		    progressColor: 'purple',
		    cursorWidth: 2,
		    height: 32,
		    normalize: true,
		    scrollParent: false,
		});

		wavesurfer.loadPredefined = function() {
			console.debug('load predefined');
			wavesurfer.load(file);
		};

		return wavesurfer;
	}
}
