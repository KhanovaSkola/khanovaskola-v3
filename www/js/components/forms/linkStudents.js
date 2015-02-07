$(function() {
	var $form = $('[data-link-students-form]');
	if (!$form.length) {
		return;
	}

	var $template = $form.find('input[type=email]').last().clone();
	$form.countEmpty = function() {
		var count = 0;
		$(this).find('input[type=email]').each(function(i, el) {
			if (!$(el).val().trim()) {
				count++;
			}
		});
		return count;
	};

	$form.on('change keyup paste', 'input[type=email]', function() {
		console.log($form.countEmpty());
		if ($form.countEmpty() < 1) {
			var $input = $template.clone();
			var id = $form.find('input[type=email]').length;
			$input.attr('name', 'emails[' + id + '][email]');
			$form.find('.form-group').append($input);
		}
	});
});
