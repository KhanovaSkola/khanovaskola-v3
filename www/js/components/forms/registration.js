$(function() {
    $form = $('#frm-registrationForm-form');
    if (!$form.length) {
        return;
    }

	//$form.find('input[name="name"]').on('change paste keyup', function() {
	//	if (/ov(á|a)\s*$/.test($(this).val())) {
	//		$('#frm-registrationForm-form-gender-female').prop('checked', true);
	//	}
	//});

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
