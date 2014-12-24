App.video = {};

App.video.tickerDelta = 100;

App.video.onInit = [];
App.video.onPlay = [];
App.video.onPause = []; // current time
App.video.onTick = []; // current time
App.video.onSeek = []; // current time, from time
App.video.onStop = []; // current time
App.video.onChangeView = []; // current time, is fullscreen

App.video.init = function() {
	window.onYouTubeIframeAPIReady = function() {
		App.video.player = new YT.Player('youtube-video', {
			events: {
				onReady: App.video.onPlayerReady,
				onStateChange: App.video.onPlayerStateChange
			}
		});
	};

	var tag = document.createElement('script');
	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
};

App.video.onPlayerReady = function() {
	App.callAll(App.video.onInit);
	App.video.duration = App.video.player.getDuration();
};

App.video.onPlayerStateChange = function(args) {
	clearInterval(App.video.ticker);

	var state = args.data;
	switch (state) {
		case 1:
			App.video.ticker = setInterval(function() {
				App.callAll(App.video.onTick, [App.video.player.getCurrentTime()]);
			}, App.video.tickerDelta);
			App.callAll(App.video.onPlay);
			break;
		case 2:
			App.callAll(App.video.onPause, [App.video.player.getCurrentTime()]);
			break;
		case 0:
			App.callAll(App.video.onStop, [App.video.player.getCurrentTime()]);
			break;
		default:
	}
};
