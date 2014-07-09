$(function() {
    $form = $('#frm-registrationForm-form');
    if (!$form.length) {
        return;
    }

	$form.find('input[name="name"]').on('change paste keyup', function() {
		if (/ov(á|a)\s*$/.test($(this).val())) {
			$('#frm-registrationForm-form-gender-female').prop('checked', true);
		}
	});
});
