define([
	'lib/sortable',
	'services/search',
	'logic/editorSelector'
], function(Sortable, search) {
	const $content = document.getElementById('content-editor');
	const $remove = document.getElementById('content-editor-remove');
	const $add = document.getElementById('content-editor-add');

	const $filter = document.getElementById('filter');
	const $blockForm = document.querySelector('[data-block-form]');
	const $contentsInput = document.querySelector('[data-contents]');

	for (let $el of [$content, $remove, $add]) {
		Sortable.create($el, {
			group: 'main'
		});
	}

	const serialize = function() {
		let list = [];
		for (let $entry of $content.querySelectorAll('li')) {
			list.push($entry.dataset.contentId);
		}
		return JSON.stringify(list);
	};

	$blockForm.addEventListener('submit', () => {
		$contentsInput.value = serialize();
	});

	$filter.addEventListener('keyup', event => {
		search.complete($filter.value, entries => {
			while ($add.lastChild) {
				$add.removeChild($add.lastChild);
			}

			for (let entry of entries) {
				const $item = document.createElement('li');
				$item.dataset.contentId = entry.id;
				$item.textContent = entry.value;
				$add.appendChild($item);
			}
		});
	});
});
