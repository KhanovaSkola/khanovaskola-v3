App.elasticSearch = new $.es.Client({
	hosts: 'vagrant.khanovaskola.cz:9200'
});

App.autocomplete = function(query, cb) {
	App.elasticSearch.search({
		index: 'khanovaskola',
		type: 'Video,Blueprint',
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
                value: v._source.title,
				highlit: 'title' in v.highlight ? v.highlight.title[0] : v._source.title
			});
		});
		cb(titles);
	});
};

$(function() {
    $('#frm-search-form-query').typeahead(
        {
            hint: true,
            highlight: false,
            minLength: 1
        },
        {
            name: 'states',
            templates: {
                suggestion: function(row) {
                    return '<p>' + row.highlit + '</p>'
                }
            },
            source: function(query, process) {
                App.autocomplete(query, function(results) {
                    process(results);
                });
            }
        }
    );
});
