App.debug = window.localStorage ? window.localStorage.getItem("debug") : false;

if (App.debug) {
	App.video.onInit.push(function() {
		console.debug('init');
	});
	App.video.onPlay.push(function() {
		console.debug('play');
	});
	App.video.onPause.push(function() {
		console.debug('pause');
	});
	App.video.onTick.push(function() {
		console.debug('tick');
	});
	App.video.onSeek.push(function() {
		console.debug('seek');
	});
	App.video.onStop.push(function() {
		console.debug('stop');
	});
}
