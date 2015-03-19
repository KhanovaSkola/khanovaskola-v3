define([
	'services/showPassword',
	'services/onclickDisableButtons',
	'lib/mailcheck',
	'logic/auth/guessGender',
	'logic/auth/passwordStrength'
], function(showPassword, buttons) {
	const $passwordGroup = document.querySelector('[data-password-group]');
	showPassword.registerFormGroup($passwordGroup);

	{
		const links = document.querySelectorAll('[data-buttons-disable-onclick] a');
		buttons.disableOnclick(links);
	}

	const $emailInput = document.querySelector('[data-email]');
	const $suggestion = document.querySelector('[data-suggestion]');
	const $email = document.querySelector('[data-suggestion-email]');
	const checkEmail = function(event) {
		Mailcheck.run({
			email: $emailInput.value,
			domains: ['khanovaskola.cz', 'hotmail.cz', 'centrum.sk', 'studentart.biz', 'zsdivisov.cz', 'outlook.com', 'tiscali.cz', 'yahoo.com', 'atlas.cz', 'azet.sk', 'post.cz', 'hotmail.com', 'volny.cz', 'zsbelotin.cz', 'email.cz', 'centrum.cz', 'seznam.cz', 'gmail.com'],
			suggested: suggestion => {
				$suggestion.classList.remove('hidden');
				$email.dataset.email = suggestion.full;
				$email.textContent = suggestion.full;
			},
			empty: () => {
				$suggestion.classList.add('hidden');
			}
		});
	};
	$emailInput.addEventListener('change', checkEmail);
	$email.addEventListener('click', event => {
		$emailInput.value = $email.dataset.email;
		$suggestion.classList.add('hidden');
		event.preventDefault();
	});
});
