App.elasticSearch = new $.es.Client({
	hosts: '@@domain.elastic'
});

App.autocomplete = function(query, cb) {
	App.elasticSearch.suggest({
		index: 'khanovaskola',
		body: {
			content: {
				text: query,
				completion: {
					field: 'suggest'
				}
			}
		}
	}).then(function(results) {
		var titles = [];
		$.each(results.content[0].options, function(i, v) {
			titles.push({
				id: v.payload.id,
                value: v.text
			});
		});
		cb(titles);
	});
};

$(function() {
    $('#frm-search-form-query').typeahead(
        {
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'states',
            //templates: {
            //    suggestion: function(row) {
	         //       return '\
				//		<li>\
				//			<a href="#">\
				//				<span>' + row.highlit + '</span>\
				//				<i class="icon icon-arrow-right"></i>\
				//			</a>\
				//		</li>\
	         //       ';
            //    }
            //},
            source: function(query, process) {
                App.autocomplete(query, function(results) {
                    process(results);
                });
            }
        }
    )
});
