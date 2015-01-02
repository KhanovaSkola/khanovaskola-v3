(function() {
	var viewId = null;
	var furthest = 0;
	var realTimeWatched = 0;
	var watched = false;

	var sendEvent = function (event, args, cb) {
		var url = $('.video-wrapper').data('url-event-' + event);
		if (viewId) {
			args.viewId = viewId;
		}
		return $.ajax(url, {
			data: args,
			success: cb
		});
	};

	App.video.onInit.push(function () {
		var $wrapper = $('.video-wrapper');
		sendEvent('begin', {
			videoId: $wrapper.data('video-id'),
			blockId: $wrapper.data('block-id'),
			schemaId: $wrapper.data('schema-id')
		}, function (res) {
			viewId = res.viewId;
		});
	});

	var slowTick = 0;
	var slowTickSteps = 5000 / App.video.tickerDelta;
	var sendPosition = function (now) {
		realTimeWatched += App.video.tickerDelta / 1000;

		slowTick++;
		if (slowTick < slowTickSteps) {
			return;
		}

		slowTick = 0;
		if (now > furthest) {
			furthest = now;
		}

		sendEvent('tick', {
			time: realTimeWatched,
			percent: realTimeWatched / App.video.duration * 100,
			furthest: furthest,
			watched: watched ? 1 : 0
		}, function(res) {
			watched = res.watched;
		});
	};

	App.video.onTick.push(sendPosition);

	var pauseDuration;
	var pausedAt;
	App.video.onPause.push(function (now) {
		pauseDuration = App.getTimer('video:pause');
		pausedAt = now;

		slowTick = slowTickSteps;
		sendPosition(now);
	});

	App.video.onPlay.push(function () {
		if (!pauseDuration) {
			return;
		}

		sendEvent('pause', {
			at: pausedAt,
			duration: pauseDuration() / 1000
		});
	});

	App.video.onSeek.push(function (current, from) {
		sendEvent('seek', {
			from: from,
			to: current
		});
	});

	App.video.onChangeView.push(function (now, isFullscreen) {
		sendEvent('change-view', {
			at: now,
			isFullscreenNow: isFullscreen
		})
	})

})();
