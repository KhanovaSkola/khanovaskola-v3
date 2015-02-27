define([
	'services/showPassword',
	'services/onclickDisableButtons'
], function(showPassword, buttons) {
	const $loginForm = document.querySelector('[data-login-form]');
	if ($loginForm) {
		// Update forgotten password link to currently filled email
		{
			const $emailInput = $loginForm.querySelector('input[name="email"]');
			const $link = $loginForm.querySelector('[data-reset-password]');
			const template = $link.dataset.urlTemplate;

			const handler = function () {
				const email = $emailInput.value;
				const target = template.replace('{email}', encodeURIComponent(email));
				$link.setAttribute('href', target);
			};

			$emailInput.addEventListener('change', handler);
			$emailInput.addEventListener('paste', handler);
			$emailInput.addEventListener('keyup', handler);
		}

		// Register show password checkbox
		{
			const $passwordGroup = $loginForm.querySelector('[data-password-group]');
			showPassword.registerFormGroup($passwordGroup);
		}

		{
			const links = document.querySelectorAll('[data-buttons-disable-onclick] a');
			buttons.disableOnclick(links);
		}
	}
});
