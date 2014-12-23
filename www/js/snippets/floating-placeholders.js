$(function() {
	$('.floating-placeholder input').keyup(function() {
		$(this).parents('.floating-placeholder').first().toggleClass('float', !!$(this).val());
	});
});
