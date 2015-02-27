(function() {
	require (['babel-polyfill'], function() {

		var body = document.getElementsByTagName('body')[0];
		var scripts = JSON.parse(body.getAttribute('data-scripts'));
		scripts.push("");

		console.debug("scripts to load", scripts);
		require(scripts, function() {
			console.debug("all page dependencies loaded", scripts);
		});
	});
})();
