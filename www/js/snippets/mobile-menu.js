$(function() {

	$(document).on('click', function(e) {
		var $target = $(e.target);
		if ($target.is('.mobile-nav') || $target.parents('.mobile-nav').length !== 0)
		{
			return;
		}
		$nav.removeClass('open');
	});

	$('.footer-mobile ul.schemas, .mobile-nav ul.schemas').slideUp();
	$('[data-subject-open]').click(function() {
		var $open = $(this).siblings('[data-subject="' + $(this).data('subject-open') + '"]');
		$open.slideToggle(120);
		return false;
	});
});
