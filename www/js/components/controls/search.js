App.elasticSearch = {
	host: '@@elastic.url'
};

App.autocomplete = function(query, cb) {
	$.ajax({
		type: 'POST',
		url: App.elasticSearch.host + '/@@elastic.index/content/_search',
		dataType: 'json',
		data: JSON.stringify(App.getSearchTemplate(query)),
		success: function (results) {
			var titles = [];
			$.each(results.hits.hits, function(i, v) {
				titles.push({
					id: v._id,
					value: v.fields.title
				});
			});
			cb(titles);
		}
	});
};

$(function() {
    $('[data-search-form-query]:first').typeahead(
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
