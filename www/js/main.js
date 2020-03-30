(function() {
	const basePath = document.querySelector('script[data-basepath]').dataset.basepath;
  const libPath = `${basePath}/build/js/libs`;
	require.config({
		baseUrl: `${basePath}/build/js`,
		paths: {
      // Bootstrap
			'lib/alert': `${libPath}/alert.min`,
			'lib/dropdown': `${libPath}/dropdown.min`,
			'lib/modal': `${libPath}/modal.min`,
			'lib/tab': `${libPath}/tab.min`,
      // Other
			'lib/babel': `${libPath}/browser-polyfill`,
			'lib/chosen': `${libPath}/chosen.jquery.min`,
			'lib/jquery': `${libPath}/jquery.min`,
			'lib/jquery-ui': `${libPath}jquery-ui.min`,
			'lib/mailcheck': `${libPath}mailcheck.min`,
			'lib/nette': `${libPath}netteForms.min`,
			'lib/nette-ajax': `${libPath}/nette.ajax.min`,
			'lib/sortable': `${libPath}/Sortable.min`,
			'lib/typeahead': `${libPath}/typeahead.jquery.min`,
			'lib/zxcvbn': `${libPath}/zxcvbn`
		},
		shim: {
			'lib/alert': ['lib/jquery'],
			'lib/chosen': ['lib/jquery'],
			'lib/dropdown': ['lib/jquery'],
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
