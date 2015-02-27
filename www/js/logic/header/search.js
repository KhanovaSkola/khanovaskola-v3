// Autocomplete main search input
define(['services/search', 'lib/typeahead'], function(search) {
	const $input = document.querySelector('[data-search-form-query]');
	jQuery($input).typeahead({
			hint: true,
			highlight: false,
			minLength: 1
		},
		{
			name: 'states',
			source: (query, process) => {
				search.complete(query, results => {
					process(results);
				});
			}
		}
	);
});
