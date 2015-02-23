define([
	'services/showPassword',
	'logic/auth/guessGender',
	'logic/auth/passwordStrength'
], function(showPassword) {
	const $passwordGroup = document.querySelector('[data-password-group]');
	showPassword.registerFormGroup($passwordGroup);
});
