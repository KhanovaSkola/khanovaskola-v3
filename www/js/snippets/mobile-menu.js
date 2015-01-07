$(function() {
	var $nav = $('.mobile-nav');
	$('.container, main').click(function() {
		$nav.removeClass('open');
	});
	$('.burger').click(function() {
		$nav.addClass('open');
		return false;
	});
});
