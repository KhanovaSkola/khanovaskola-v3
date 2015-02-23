define({
	'registerFormGroup': $formGroup => {
		const $checkbox = $formGroup.querySelector('input[type="checkbox"]');
		const $password = $formGroup.querySelector('input[name="password"]');
		$checkbox.addEventListener('change', () => {
			if ($password.getAttribute('type') === 'password') {
				$password.setAttribute('type', 'input');
			} else {
				$password.setAttribute('type', 'password');
			}
		});
	}
});
