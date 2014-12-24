$(function() {
	$('.toggle-password').click(function() {
		var $input = $(this).parents('form').find('[name=password]');
		$input.attr('type', $input.attr('type') === 'password' ? 'text' : 'password');
	})
});
