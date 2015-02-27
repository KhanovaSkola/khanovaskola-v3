define(['logic/header/dropdowns', 'logic/mobileMenu'], function(dropdowns, mobileMenu) {
	const $body = document.getElementsByTagName('body')[0];
	const $header = document.getElementsByTagName('header')[0];
	const $mobileNav = document.querySelector('.mobile-nav');

	$body.addEventListener('click', () => {
		dropdowns.close();
		mobileMenu.close();
	});
	$header.addEventListener('click', event => {
		event.stopPropagation();
	});
	$mobileNav.addEventListener('click', event => {
		event.stopPropagation();
	});
});
