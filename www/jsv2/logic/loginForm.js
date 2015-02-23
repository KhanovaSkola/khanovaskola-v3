define(function() {
	const $loginForm = document.querySelector('[data-login-form]');
	if ($loginForm) {
		const $emailInput = $loginForm.querySelector('input[name="email"]');
		const $link = $loginForm.querySelector('[data-reset-password]');
		const template = $link.getAttribute('data-url-template');

		const handler = function () {
			const email = $emailInput.value;
			const target = template.replace('{email}', encodeURIComponent(email));
			$link.setAttribute('href', target);
		};

		$emailInput.addEventListener('change', handler);
		$emailInput.addEventListener('paste', handler);
		$emailInput.addEventListener('keyup', handler);
	}
});
