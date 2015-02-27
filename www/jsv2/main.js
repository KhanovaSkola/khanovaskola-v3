(function() {
	const basePath = document.querySelector('script[data-basepath]').getAttribute('data-basepath');
	require.config({
		baseUrl: `${basePath}/build/jsv2`,
		paths: {
			babel: `${basePath}/libs/babel/browser-polyfill`,
			chosen: `${basePath}/libs/chosen/chosen.jquery.min`,
			dropdown: `${basePath}/libs/bootstrap/js/dropdown`,
			handsontable: `${basePath}/libs/handsontable/dist/handsontable.full.min`,
			jquery: `${basePath}/libs/jquery/dist/jquery.min`,
			'jquery-ui': `${basePath}/libs/jquery-ui/jquery-ui.min`,
			mathjax: `${basePath}/libs/MathJax/MathJax`,
			modal: `${basePath}/libs/bootstrap/js/modal`,
			'nette': `${basePath}/libs/nette-forms/src/assets/netteForms`,
			'nette-ajax': `${basePath}/libs/nette.ajax.js/nette.ajax`,
			'sortable': `${basePath}/libs/Sortable/Sortable.min`,
			tab: `${basePath}/libs/bootstrap/js/tab`,
			typeahead: `${basePath}/libs/typeahead.js/dist/typeahead.jquery`,
			zeroclipboard: `${basePath}/libs/zeroclipboard/dist/ZeroClipboard.min`,
			zxcvbn: `${basePath}/libs/zxcvbn/zxcvbn`,

			'codemirror': `${basePath}/libs/codemirror/lib/codemirror`,
			'codemirror-xml': `${basePath}/libs/codemirror/mode/xml/xml`,
		},
		shim: {
			chosen: ["jquery"],
			dropdown: ["jquery"],
			handonstable: ['zeroclipboard'],
			'jquery-ui': ['jquery'],
			modal: ['jquery'],
			"nette-ajax": ['jquery', 'nette'],
			typeahead: ['jquery']
		}
	});

	require(['babel'], function() {
		require(['modal', 'logic/urlFixes', 'logic/floatingPlaceholder', 'logic/mobileMenu'], function() {
			const body = document.getElementsByTagName('body')[0];
			const scripts = JSON.parse(body.getAttribute('data-scripts'));
			require(scripts);
		});
	});
})();
