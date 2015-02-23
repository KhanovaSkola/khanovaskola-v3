require(['babel-polyfill', 'modal'], function() {
	const body = document.getElementsByTagName('body')[0];
	const scripts = JSON.parse(body.getAttribute('data-scripts'));
	require(scripts);
});
