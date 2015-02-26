define(function() {
	const loadSound = file => {
		var sound = document.createElement("audio");
		if ("src" in sound) {
			sound.autoPlay = false;
		} else {
			sound = document.createElement("bgsound");
			sound.volume = -10000;
			sound.play = () => {
				this.src = file;
				this.volume = 0;
			}
		}
		sound.src = file;
		document.body.appendChild(sound);
		return sound;
	};

	return {
		preload: file => {
			return loadSound(file);
		}
	}
});
