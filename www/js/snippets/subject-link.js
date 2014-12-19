$(function() {

	var $page = $('.landing-page, .subjects-page');
	if (!$page.length) {
		return;
	}

	var $dropdown = $('.dropdown-big');
	$page.find('main a[href^="#tab-"]').on('click', function() {
		$dropdown.toggleClass('open');
		$dropdown.parents('header').toggleClass('hover');
		$dropdown.find('a[href=' + $(this).attr('href') + ']').tab('show');

		window.scrollTo(0, 0);
		return false;
	});
	return false;

});
