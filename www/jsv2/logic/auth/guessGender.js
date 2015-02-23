define(['services/gender'], function(gender) {
	const $form = document.querySelector('[data-guess-gender]');
	const $nameInput = $form.querySelector('input[name="name"]');
	const template = $form.getAttribute('data-guess-gender-url-template');
	const genderRadios = {
		male: $form.querySelector('[data-gender-male]'),
		female: $form.querySelector('[data-gender-female]')
	};

	let userSetGender = false;

	let request;
	const handler = function() {
		if (request) {
			request.abort();
			request = null;
		}

		const name = $nameInput.value;
		if (!name.trim())
		{
			return;
		}

		request = gender.guess(name, template, payload => {
			if (userSetGender) {
				return;
			}

			genderRadios[payload.gender].checked = true;
		});
	};

	$nameInput.addEventListener('change', handler);
	$nameInput.addEventListener('paste', handler);
	$nameInput.addEventListener('keyup', handler);

	for (let name in genderRadios) {
		genderRadios[name].addEventListener('change', () => {
			userSetGender = true;
			$nameInput.removeEventListener('change', handler);
			$nameInput.removeEventListener('paste', handler);
			$nameInput.removeEventListener('keyup', handler);
		});
	}
});
