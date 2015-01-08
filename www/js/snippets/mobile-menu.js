$(function() {
	var $nav = $('.mobile-nav');

	$('#mobile-nav-append').after($('#mobile-nav-snippet').children()).remove();

	var $subjects = $('#mobile-nav-subjects').clone();
	$('#mobile-nav-subjects-clone').append($subjects);

	$('.container, main').click(function() {
		$nav.removeClass('open');
	});
	$('.burger').click(function() {
		$nav.addClass('open');
		return false;
	});

	$('.footer-mobile ul.schemas, .mobile-nav ul.schemas').slideUp();
	$('[data-subject-open]').click(function() {
		var $open = $(this).siblings('[data-subject="' + $(this).data('subject-open') + '"]');
		$open.slideToggle();
		return false;
	});
});
