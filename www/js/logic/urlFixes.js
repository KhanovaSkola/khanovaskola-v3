define(function() {
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
