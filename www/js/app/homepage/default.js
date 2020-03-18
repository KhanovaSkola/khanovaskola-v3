define(['logic/header/dropdowns'], function(dropdowns) {
	const $beginButton = document.querySelector('[data-begin]');
	const $dropdown = document.querySelector('[data-subjects-dropdown]');
	const $mobileNav = document.querySelector('.mobile-nav');

	$beginButton.addEventListener('click', event => {
		dropdowns.openDropdown($dropdown);
		$mobileNav.classList.add('open');

		window.scrollTo(0, 0);
		event.preventDefault();
		event.stopPropagation();
	});
});
