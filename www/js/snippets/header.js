$(function() {

	var $dropdown = $('.dropdown-big');

	$('.dropdown-big .dropdown-toggle').on('click', function() {
		console.log('open');
		$dropdown.toggleClass('open');
		$dropdown.parents('header').toggleClass('hover');
		return false;
	});

	$('body').children().not('header').on('click', function() {
		$dropdown.removeClass('open');
		$dropdown.parents('header').removeClass('hover');
	});

	$('.ul-tab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
		return false;
	});

	$('.search-wrapper .btn-search').on('click', function() {
		$(this).parents('header').addClass('hover');

		var $searchWrapper = $(this).parents('.search-wrapper').first();
		var $searchInput = $searchWrapper.find('.search-input');
		var $searchButton = $searchWrapper.find('.search-button');

		var opened = $searchInput.hasClass('hidden');

		$searchInput.removeClass('hidden');
		$searchButton.removeClass('hidden');

		$input = $searchInput.find('input:last');
		$input.focus();

		if (opened) {
			return false;
		}
	});

	$('.search-wrapper .form-control').on('keyup focus', function() {
		$(this).parents('header').addClass('hover');
	});

});
