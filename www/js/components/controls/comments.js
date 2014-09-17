(function() {
	$comments = $('[js-comments]');
	if (!$comments.length) {
		return;
	}

	$input = $('#frm-comments-commentForm-form-text');
	$replyTo = $('#frm-comments-commentForm-form-replyTo');
	$comments.find('[js-comments-reply]').on('click', function() {
		$input.val($(this).data('author') + ': ');
		$replyTo.val($(this).data('reply-to'));
		$input.focus();
		return false;
	});

})();
