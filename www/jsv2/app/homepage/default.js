define(['logic/header/dropdowns'], function(dropdowns) {
	const $beginButton = document.querySelector('[data-begin]');
	const $dropdown = document.querySelector('[data-subjects-dropdown]');

	$beginButton.addEventListener('click', event => {
		dropdowns.openDropdown($dropdown);

		window.scrollTo(0, 0);
		event.preventDefault();
		event.stopPropagation();
	});
});
