define(['services/transliterate', 'lib/zxcvbn'], function(string) {
	const $form = document.querySelector('[data-password-strength]');
	const $passwordInput = $form.querySelector('input[name="password"]');
	const $emailInput = $form.querySelector('input[name="email"]');
	const $nameInput = $form.querySelector('input[name="name"]');

	const handler = function() {
		const email = $emailInput.value;
		const emailTrans = string.transliterate(email);
		const name = $nameInput.value;
		const nameTrans = string.transliterate(name);

		// transliterate returns space separated fields
		const penalize = `${email} ${emailTrans} ${name} ${nameTrans}`.split(' ');

		var score = zxcvbn($passwordInput.value, penalize);
		$passwordInput.parentNode.classList.toggle('has-warning', score.entropy < 30);
	};

	$passwordInput.addEventListener('change', handler);
	$passwordInput.addEventListener('paste', handler);
	$passwordInput.addEventListener('keyup', handler);
});
