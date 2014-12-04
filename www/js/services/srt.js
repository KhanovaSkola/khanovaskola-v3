(function() {
	var srt = {};

	srt.fetch = function(url, cb) {
		$.ajax({
			cache: true,
			success: function(srt, status, jqhrx) {
				cb(srt);
			},
			url: url
		});
	};

	srt.timeToSeconds = function(h, m, s) {
		return h * 3600 + m * 60 + parseFloat(s.replace(',', '.'));
	};

	srt.parse = function(text) {
		var partials = text.split(/(^|\n\n)\d+\n/);
		var parser = /^(\d+):(\d+):(\d+[,.]\d+).*?(\d+):(\d+):(\d+[,.]\d+)\n(.*\n?.*)/;

		var subs = [];
		partials.forEach(function(partial) {
			var m = partial.match(parser);
			if (!m) {
				return;
			}

			subs.push([
				srt.timeToSeconds(m[1], m[2], m[3]),
				srt.timeToSeconds(m[4], m[5], m[6]),
				m[7]
			]);
		});

		return subs;
	};

	window.SrtParser = srt;
})();
