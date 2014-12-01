App.filters = {
	duration: function(seconds) {
		var m = Math.floor(seconds / 60);
		var s = Math.floor(seconds - m * 60);
		return m + ':' + (s < 10 ? "0"+s : s);
	}
};
