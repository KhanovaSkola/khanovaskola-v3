define([
	'services/showPassword',
	'services/onclickDisableButtons',
	'logic/auth/guessGender',
	'logic/auth/passwordStrength'
], function(showPassword, buttons) {
	const $passwordGroup = document.querySelector('[data-password-group]');
	showPassword.registerFormGroup($passwordGroup);

	{
		const links = document.querySelectorAll('[data-buttons-disable-onclick] a');
		buttons.disableOnclick(links);
	}
});
