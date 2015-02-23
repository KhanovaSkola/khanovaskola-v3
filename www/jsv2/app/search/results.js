define(function() {
	let lastLoadedPage = 1;
	let noMorePages = false;

	const $results = document.querySelector('.search-result');
	const template = document.querySelector('[data-url-more]').getAttribute('data-url-more');
	const $showMoreButton = document.querySelector('[data-show-more]');

	let request = null;
	const loadMore = function() {
		if (noMorePages || request) {
			return; // no more results or request already processing
		}

		const url = template.replace('{page}', lastLoadedPage + 1);
		request = new XMLHttpRequest();
		request.open('GET', url, true);

		request.onload = function() {
			if (request.status >= 200 && request.status < 400) {
				const snippet = request.responseText;
				if (!snippet.trim()) {
					noMorePages = true;
					$showMoreButton.classList.add('hidden');
					return;
				}
				$results.insertAdjacentHTML('beforeend', snippet);
				lastLoadedPage++;
				request = null;
			}
		};
		request.send();
	};

	if ($showMoreButton) {
		$showMoreButton.addEventListener('click', event => {
			loadMore();
			event.preventDefault();
		});
		document.addEventListener('scroll', event => {
			const top = $showMoreButton.getBoundingClientRect().top;
			const bottom = $showMoreButton.getBoundingClientRect().bottom;

			const scrolledCloseToEnd = (top >= 0) && (bottom - window.innerHeight < 500);
			if (scrolledCloseToEnd) {
				loadMore();
			}
		});
	}

});
