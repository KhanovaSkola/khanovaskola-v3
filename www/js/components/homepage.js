$(function() {
	var $page = $('.landing-page');
	if (!$page.length) {
		return;
	}

	var $dropdown = $('.dropdown-big');
	var $nav = $('.mobile-nav');

	$('[data-begin]').on('click', function() {
		$dropdown.toggleClass('open');
		$dropdown.parents('header').toggleClass('hover');

		$nav.addClass('open');

		window.scrollTo(0, 0);
		return false;
	});
});
