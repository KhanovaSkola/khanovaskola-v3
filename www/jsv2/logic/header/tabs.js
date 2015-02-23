define(['logic/header/dropdowns'], function(dropdowns) {
	const $dropdown = document.querySelector('[data-subjects-dropdown]');
	const subjectLinks = document.querySelectorAll('[href^="#tab-"]');
	const defaultSubjectId = document.querySelector('[data-active-subject]').getAttribute('data-active-subject');

	let $activeLabel = defaultSubjectId
		? document.querySelector(`[data-subjects-dropdown] .subjects-list [data-subject-id="${defaultSubjectId}"]`).parentNode
		: document.querySelector('[data-default-label]');
	let $activeTab = defaultSubjectId
		? document.querySelector(`[data-subjects-dropdown] .tab-content [data-subject-id="${defaultSubjectId}"]`)
		: document.querySelector('[data-default-tab]');

	$activeLabel.classList.add('active');
	$activeTab.classList.add('active');


	for (let $link of subjectLinks) {
		$link.addEventListener('click', event => {
			const target = $link.getAttribute('href');
			const $label = document.querySelector(`[data-subjects-dropdown] .subjects-list [href="${target}"]`).parentNode;
			const $tab = document.querySelector(target);

			if ($activeTab) {
				$activeLabel.classList.remove('active');
			}
			if ($activeLabel) {
				$activeTab.classList.remove('active');
			}
			$label.classList.add('active');
			$tab.classList.add('active');
			$activeLabel = $label;
			$activeTab = $tab;

			$dropdown.classList.add('open');
			dropdowns.openDropdown($dropdown);

			window.scrollTo(0, 0);
			event.preventDefault();
			event.stopPropagation();
		});
	}
});
