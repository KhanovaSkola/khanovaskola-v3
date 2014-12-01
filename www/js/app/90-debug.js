App.debug = window.localStorage ? window.localStorage.getItem("debug") : false;

if (App.debug) {
	App.video.onInit.push(function() {
		console.log('init')
	});
	App.video.onPlay.push(function() {
		console.log('play')
	});
	App.video.onPause.push(function() {
		console.log('pause')
	});
	App.video.onTick.push(function() {
		console.log('tick')
	});
	App.video.onSeek.push(function() {
		console.log('seek');
	});
	App.video.onStop.push(function() {
		console.log('stop')
	});
}
