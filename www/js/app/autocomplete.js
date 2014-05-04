App.elasticSearch = new $.es.Client({
	hosts: 'vagrant.khanovaskola.cz:9200'
});

App.autocomplete = function(query, cb) {
	App.elasticSearch.search({
		index: 'khanovaskola',
		type: 'video',
		body: {
			query: {
				match: {
					title: query
				}
			},
            highlight: {
                pre_tags: ['<strong>'],
                post_tags: ['</strong>'],
                fields: {
                    title: {
                        number_of_fragments: 0
                    }
                }
            }
		}
	}).then(function(results) {
		var titles = [];
		$.each(results.hits.hits, function(i, v) {
			titles.push({
				id: v._id,
				value: 'title' in v.highlight ? v.highlight.title[0] : v._source.title
			});
		});
		cb(titles);
	});
};

$(function() {
    $('#frm-autocomplete-query').typeahead(
        {
            hint: true,
            highlight: false,
            minLength: 1
        },
        {
            name: 'states',
            displayKey: 'value',
            source: function(query, process) {
                App.autocomplete(query, function(results) {
                    process(results);
                });
            }
        }
    );
});
