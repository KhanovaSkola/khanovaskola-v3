$(function() {

	$('.dropdown-big .dropdown-toggle').on('click', function() {
		var $dropdown = $(this).parents('.dropdown').first();
		$dropdown.toggleClass('open');
	});

	$('.ul-tab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

});
