define([
	'services/showPassword',
	'logic/auth/passwordStrength'
], function(showPassword) {
	const $passwordGroup = document.querySelector('[data-password-group]');
	showPassword.registerFormGroup($passwordGroup);
});
