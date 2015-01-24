$(function() {

	var $dropdown = $('.dropdown');

	$('.dropdown .dropdown-toggle').on('click', function() {
		var $this = $(this).parents('.dropdown');

		$('.dropdown').not($this).removeClass('open');
		$this.toggleClass('open');
		$dropdown.parents('header').toggleClass('hover');
		return false;
	});

	$(document).on('click', function(e) {
		var $target = $(e.target);
		if ($target.is('.dropdown') || $target.parents('.dropdown').length !== 0)
		{
			return;
		}
		$dropdown.removeClass('open');
		$dropdown.parents('header').removeClass('hover');
	});

	$('.ul-tab a[data-toggle]').click(function (e) {
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
