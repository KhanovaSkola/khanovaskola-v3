$(function() {

	var $dropdown = $('.dropdown-big');

	$('.dropdown-big .dropdown-toggle').on('click', function() {
		console.log('open');
		$dropdown.toggleClass('open');
		$dropdown.parents('header').toggleClass('hover');
		return false;
	});

	$('body').children().not('header').on('click', function() {
		console.log('close');
		$dropdown.removeClass('open');
		$dropdown.parents('header').removeClass('hover');
	});

	$('.ul-tab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
		return false;
	});

});
