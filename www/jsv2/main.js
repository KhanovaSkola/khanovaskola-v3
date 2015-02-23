require (['babel-polyfill'], function() {
	var body = document.getElementsByTagName('body')[0];
	var scripts = JSON.parse(body.getAttribute('data-scripts'));
	require(scripts);
});
