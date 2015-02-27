define(function() {
	/**
	 * Fix for Facebook callaback, removes #_=_
	 * @see http://stackoverflow.com/a/7297873/326257
	 */
	if (window.location.hash == '#_=_') {
		history.replaceState('', document.title, window.location.pathname);
	}

	/**
	 * Removes _fid parameter from url
	 * @see http://forum.nette.org/cs/4405-flash-zpravicky-bez-fid-v-url#p43713
	 */
	if (window.history.replaceState) {
		const url = window.location.toString();
		const fixedUrl = url.replace(/([?&])_fid=.*?(&|$)/, '$1').replace(/[?&]$/, '');
		window.history.replaceState('', document.title, fixedUrl);
	}
});
