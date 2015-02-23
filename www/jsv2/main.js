(function() {
	const basePath = document.querySelector('script[data-basepath]').getAttribute('data-basepath');
	require.config({
		baseUrl: `${basePath}/build/jsv2`,
		paths: {
			babel: `${basePath}/libs/babel/browser-polyfill`,
			dropdown: `${basePath}/libs/bootstrap/js/dropdown`,
			flux: `${basePath}/libs/flux/dist/Flux`,
			jquery: `${basePath}/libs/jquery/dist/jquery.min`,
			modal: `${basePath}/libs/bootstrap/js/modal`,
			tab: `${basePath}/libs/bootstrap/js/tab`,
			typeahead: `${basePath}/libs/typeahead.js/dist/typeahead.jquery`,
			zxcvbn: `${basePath}/libs/zxcvbn/zxcvbn`
		},
		shim: {
			dropdown: ["jquery"],
			modal: ["jquery"],
			typeahead: ["jquery"]
		}
	});

	require(['babel', 'modal'], function() {
		const body = document.getElementsByTagName('body')[0];
		const scripts = JSON.parse(body.getAttribute('data-scripts'));
		require(scripts);
	});
})();
