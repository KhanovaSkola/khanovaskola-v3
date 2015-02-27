define([], function () {
	require(['typeahead'], function() {
		// setup search autocomplete
		console.debug('setting up dropdowns');
	});

	// setup dropdowns
	require(['dropdown'], function() {
		for (let $dropdown of document.querySelectorAll('.dropdown')) {
			const $toggle = $dropdown.querySelectorAll('.dropdown-toggle')[0];
			$toggle.addEventListener('click', event => {
				$dropdown.classList.toggle('open');
				event.preventDefault();
			});
		}
	});

	return {};
});
