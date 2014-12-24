App.elasticSearch = {
	host: '@@elastic.url'
};

App.autocomplete = function(query, cb) {
	$.ajax({
		type: 'POST',
		url: App.elasticSearch.host + '/@@elastic.index/_suggest',
		dataType: 'json',
		data: JSON.stringify({
			content: {
				text: query,
				completion: {
					field: 'suggest'
				}
			}
		}),
		success: function (results) {
			var titles = [];
			$.each(results.content[0].options, function(i, v) {
				titles.push({
					id: v.payload.id,
					value: v.text
				});
			});
			cb(titles);
		}
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
            source: function(query, process) {
                App.autocomplete(query, function(results) {
                    process(results);
                });
            }
        }
    ).on('typeahead:selected', function(e, item) {
		var url = $(this).parents('form').data('url-direct') + '?contentId=' + item.id;
		window.location.href = url;
    });
});
