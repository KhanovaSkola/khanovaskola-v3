define(['sortable'], function(Sortable) {
	const $list = document.querySelector('[data-subject-list]');
	const url = $list.dataset.saveUrl;
	const $saveButton = document.querySelector('[data-save]');

	Sortable.create($list);

	for (let $subject of $list.querySelectorAll('li')) {
		const $span = $subject.querySelector('span');
		const $icon = $subject.querySelector('[data-icon]');
		const $colorInput = $subject.querySelector('[name=color]');
		const $iconInput = $subject.querySelector('[name=icon]');

		$colorInput.addEventListener('change', () => {
			$span.className = 'subject-name';
			$span.classList.add('text-' + $colorInput.value);
		});
		$iconInput.addEventListener('change', () => {
			$icon.className = 'icon';
			$icon.classList.add('icon-' + $iconInput.value);
		});
	}

	const serialize = function() {
		let list = {};
		let position = 0;
		for (let $subject of $list.querySelectorAll('li')) {
			const $span = $subject.querySelector('span');
			const $icon = $subject.querySelector('[data-icon]');
			const icon = /icon-([^ ]+)/.exec($icon.className)[1];
			const color = /\btext-([^ ]+)/.exec($span.className)[1];
			list[$subject.dataset.subjectId] = {
				icon: icon,
				color: color,
				position: position
			};
			position++;
		}
		return JSON.stringify(list);
	};

	$saveButton.addEventListener('click', () => {
		window.location = url.replace('{payload}', encodeURIComponent(serialize()));
	});
});
