define(function() {
	const delta = {
		short: 100,
		long: 1200 // inactive chrome tab does not allow more
	};

	let player; // YT.Player
	let ticker = {
		short: null,
		long: null
	};

	let on = {
		init: [],
		play: [],
		pause: [], // current time
		shortTick: [], // current time
		longTick: [], // current time
		seek: [], // current time, before
		stop: [] // current time
	};

	let video = {
		duration: document.querySelector('[data-duration]').getAttribute('data-duration')
	};

	const onReady = function() {
		for (let cb of on.init) {
			cb();
		}
		video.duration = player.getDuration();
	};

	const shortTicker = () => {
		for (let cb of on.shortTick) {
			cb(player.getCurrentTime());
		}
	};

	const longTicker = () => {
		for (let cb of on.shortTick) {
			cb(player.getCurrentTime());
		}
	};

	const onStateChange = function(args) {
		clearInterval(ticker.short);
		clearInterval(ticker.long);

		const state = args.data;
		switch (state) {
			case 1:
				shortTicker();
				longTicker();
				ticker.short = setInterval(shortTicker, delta.short);
				ticker.short = setInterval(longTicker, delta.short);

				for (let cb of on.play) {
					cb(player.getCurrentTime());
				}
				break;
			case 2:
				for (let cb of on.pause) {
					cb(player.getCurrentTime());
				}
				break;
			case 0:
				for (let cb of on.stop) {
					cb(player.getCurrentTime());
				}
				break;
			default:
		}
	};

	const init = function() {
		window.onYouTubeIframeAPIReady = () => {
			player = new YT.Player('youtube-video', {
				events: {
					onReady: onReady,
					onStateChange: onStateChange
				}
			});
		};

		const tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
		const firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	};

	const seek = function(time, last = false) {
		const before = player.getCurrentTime();
		player.seekTo(time, true);
		if (last) {
			for (let cb of on.seek) {
				cb(time, before);
			}
		}
	};

	const getCurrentTime = function() {
		return player ? player.getCurrentTime() : 0;
	};

	const togglePlay = function() {
		if (player.getPlayerState() != 1) {
			player.playVideo();
		} else {
			player.pauseVideo();
		}
	};

	on.play.push(() => {
		player.unloadModule("captions");
		player.unloadModule("cc");
	});

	return {
		init: init,
		getCurrentTime: getCurrentTime,
		delta: delta,
		video: video,
		seek: seek,
		togglePlay: togglePlay,

		onInit: on.init,
		onPlay: on.play,
		onPause: on.pause,
		onShortTick: on.shortTick,
		onLongTick: on.longTick,
		onSeek: on.seek,
		onStop: on.stop
	};
});
