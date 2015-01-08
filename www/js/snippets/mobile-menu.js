$(function() {
	var $nav = $('.mobile-nav');

	$('#mobile-nav-append').after($('#mobile-nav-snippet').children()).remove();

	$('.container, main').click(function() {
		$nav.removeClass('open');
	});
	$('.burger').click(function() {
		$nav.addClass('open');
		return false;
	});
});
