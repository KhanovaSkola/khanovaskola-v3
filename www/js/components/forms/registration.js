$(function() {
    $form = $('[data-registration-form]');
    if (!$form.length) {
        return;
    }

	var changer = null;
	$form.find('input[name="name"]').on('change paste keyup', function() {
		if (changer) {
			clearTimeout(changer);
		}

		var name = $(this).val();
		if (!name.trim())
		{
			return;
		}

		App.remote.guessGender(name, function(res) {
			changer = setTimeout(function() {
				$('[data-gender-' + res.gender + ']').prop('checked', true);
			}, 200);
		});
	});

	$form.find('input[name="password"]').on('change paste keyup', function() {
		var penalize = [];

		var email = $form.find('input[name="email"]').val();
		penalize.push(email);
		penalize.push.apply(penalize, email.split('@'));

		var name = $form.find('input[name="name"]').val();
		penalize.push(name);
		penalize.push.apply(penalize, name.split(' '));

		var asciiName = transliterate(name);
		penalize.push(asciiName);
		penalize.push.apply(penalize, asciiName.split(' '));

		var score = zxcvbn($(this).val(), penalize);
		$(this).parents('.form-group').toggleClass('has-warning', score.entropy < 30);
	});
});
