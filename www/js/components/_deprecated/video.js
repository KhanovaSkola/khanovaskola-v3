(function() {
	$video = $('#video');
	if (!$video.length) {
		return;
	}

	var viewId;
	var lastTime = 0;
	var furthest = 0;
	var realTimeWatched = 0;

	var queue = [];
	var sendEvent = function(name, args, cb) {
		var request = function() {
			var url = $video.data('url-' + name).replace(encodeURIComponent('{viewId}'), viewId);
			console.log(url);
			$.ajax(url, {
				data: args,
				success: cb
			});
		};

		queue.push(request);
		if (viewId)
		{
			var temp = queue;
			queue = [];
			$.each(temp, function(i, request) {
				request();
			});
		}
	};

	var timer;

	sublime.ready(function () {
		var player = sublime.player($video.attr('id'));

		player.on('start', function() {
			console.info('video:start');

			timer = App.getTimer('video:realtime');
			$.ajax($video.data('url-begin'), {
				success: function(res) {
					viewId = res.viewId;
				}
			});
		});

		$(window).unload(function() {
			if (!timer) {
				return;
			}

			var time = realTimeWatched + timer() / 1000;
			sendEvent('tick', {
				time: time,
				percent: time / player.duration() * 100,
				furthest: furthest
			});
		});

		var pauseDuration;
		var pausedAt;
		player.on('pause', function() {
			console.info('video:pause', player.playbackTime());

			realTimeWatched += timer() / 1000;
			pauseDuration = App.getTimer('video:pause');
			pausedAt = player.playbackTime();
		});

		player.on('play', function() {
			console.info('video:play', player.playbackTime());

			if (pauseDuration)
			{
				sendEvent('pause', {
					at: pausedAt,
					duration: pauseDuration() / 1000
				});
			}

			timer = App.getTimer('video:realtime');
		});

		player.on('seek', function() {
			console.info('video:seek', player.playbackTime());

			sendEvent('seek', {
				from: lastTime,
				to: player.playbackTime()
			});
		});

		var lastUpdate;
		player.on('timeUpdate', function() {
			console.info('video:timeUpdate', player.playbackTime());

			var now = player.playbackTime();
			if (now - lastTime < 2)
			{
				// If delta is under too seconds (generous), seek did not occur.
				// This prevents race condition on timeUpdate being called right
				// before seek, which then makes lastTime useless.
				lastTime = now;
			}

			if (lastTime > furthest) {
				furthest = lastTime;
			}

			if (lastUpdate && lastUpdate() / 1000 < 20)
			{
				// Rate limiting, we are hopefully also saving status onUnload
				return;
			}
			console.info('video:tick');
			lastUpdate = App.getTimer('video:tick');

			var time = realTimeWatched + timer() / 1000;
			sendEvent('tick', {
				time: time,
				percent: time / player.duration() * 100,
				furthest: furthest
			});
		});
	});

})();
