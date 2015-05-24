define([
	'lib/sortable'
], function(Sortable) {
	const $content = document.getElementById('content-editor');
	const $remove = document.getElementById('content-editor-remove');
	const $add = document.getElementById('content-editor-add');

	const $subjectForm = document.querySelector('[data-subject-form]');
	const $contentsInput = document.querySelector('[data-positions]');

	for (let $el of [$content, $remove, $add]) {
		Sortable.create($el, {
			group: 'main'
		});
	}

	const serialize = function() {
		let list = [];
		for (let $entry of $content.querySelectorAll('li')) {
			list.push($entry.dataset.schemaId);
		}
		return JSON.stringify(list);
	};

	$subjectForm.addEventListener('submit', () => {
		$contentsInput.value = serialize();
		console.info('serialized');
	});
});
