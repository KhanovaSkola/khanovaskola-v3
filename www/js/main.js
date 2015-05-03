(function() {
	const basePath = document.querySelector('script[data-basepath]').dataset.basepath;
	require.config({
		baseUrl: `${basePath}/build/js`,
		paths: {
			'lib/babel': `${basePath}/libs/babel/browser-polyfill`,
			'lib/blackboard/player': `${basePath}/libs/blackboard/build/player`,
			'lib/blackboard/recorder': `${basePath}/libs/blackboard/build/recorder`,
			'lib/chosen': `${basePath}/libs/chosen/chosen.jquery.min`,
			'lib/codemirror': `${basePath}/libs/codemirror/lib/codemirror`,
			'lib/codemirror-xml': `${basePath}/libs/codemirror/mode/xml/xml`,
			'lib/dropdown': `${basePath}/libs/bootstrap/js/dropdown`,
			'lib/handsontable': `${basePath}/libs/handsontable/dist/handsontable.full.min`,
			'lib/jquery': `${basePath}/libs/jquery/dist/jquery.min`,
			'lib/jquery-ui': `${basePath}/libs/jquery-ui/jquery-ui.min`,
			'lib/mailcheck': `${basePath}/libs/mailcheck/src/mailcheck.min`,
			'lib/mathjax': `${basePath}/libs/MathJax/MathJax`,
			'lib/modal': `${basePath}/libs/bootstrap/js/modal`,
			'lib/nette': `${basePath}/libs/nette-forms/src/assets/netteForms`,
			'lib/nette-ajax': `${basePath}/libs/nette.ajax.js/nette.ajax`,
			'lib/sortable': `${basePath}/libs/Sortable/Sortable.min`,
			'lib/tab': `${basePath}/libs/bootstrap/js/tab`,
			'lib/typeahead': `${basePath}/libs/typeahead.js/dist/typeahead.jquery`,
			'lib/zeroclipboard': `${basePath}/libs/zeroclipboard/dist/ZeroClipboard.min`,
			'lib/zxcvbn': `${basePath}/libs/zxcvbn/zxcvbn`
		},
		shim: {
			'lib/chosen': ['lib/jquery'],
			'lib/dropdown': ['lib/jquery'],
			'lib/handonstable': ['lib/zeroclipboard'],
			'lib/jquery-ui': ['lib/jquery'],
			'lib/modal': ['lib/jquery'],
			'lib/nette-ajax': ['lib/jquery', 'lib/nette'],
			'lib/typeahead': ['lib/jquery']
		}
	});

	require(['lib/babel'], function() {
		const body = document.getElementsByTagName('body')[0];
		const scripts = JSON.parse(body.dataset.scripts);
		require(scripts);
	});
})();
