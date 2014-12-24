$(function() {
    var $results = $('.search-result');
    if (!$results.length) {
        return;
    }

	App.searchPage = 1;

	var $showMore = $('[data-show-more]');

	var xhr;
	var loadMore = function() {
		if (xhr) {
			return false;
		}
		xhr = $.ajax({
			url: $results.data('url-more'),
			data: {
				page: App.searchPage + 1
			},
			success: function(snippet) {
				if (!snippet.trim()) {
					$showMore.hide();
				}

				$results.append(snippet);
				App.searchPage++;
			},
			complete: function() {
				xhr = null;
			}
		});
		return false;
	};

	$(window).on('scroll', function() {
		if (xhr) {
			return false;
		}

		var $marker = $results.children(':nth-last-child(10)');
		if (!$marker.length)
		{
			$marker = $results.children(':first-child');
		}
		if ($marker.is(':in-viewport'))
		{
			loadMore();
		}
	});

	$showMore.on('click', loadMore);
});
