define({
	duration: seconds => {
		const m = Math.floor(seconds / 60);
		const s = Math.floor(seconds - m * 60);
		return m + ':' + (s < 10 ? "0"+s : s);
	}
});
