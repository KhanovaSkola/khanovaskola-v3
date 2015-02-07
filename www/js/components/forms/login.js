$(function() {
	$form = $('[data-login-form]');
	if (!$form.length) {
		return;
	}

	$form.find('input[name="email"]').on('change paste keyup', function() {
		var $link = $('[data-password-reset]');
		var url = $link.data('password-reset') + '?email=' + encodeURIComponent($(this).val());
		$link.attr('href', url);
	});
});
