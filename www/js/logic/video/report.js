define(['logic/video/player', 'lib/modal'], function(player) {
	const $input = document.querySelector('[data-error-input]');
	const toggles = document.querySelectorAll('[data-toggle="error-modal"]');
	let $modal = null;

	const getCurrentSubtitle = function() {
		return document.querySelector('.subtitles-content').textContent;
	};

	for (let $toggle of toggles) {
		$toggle.addEventListener('click', event => {
			player.pause();

			$input.value = getCurrentSubtitle();

			$modal = document.querySelector($toggle.dataset.target);
			$modal.querySelector('.modal-body.form').classList.remove('hidden');
			$modal.querySelector('.modal-body.thanks').classList.add('hidden');
			jQuery($modal).modal({show: true});
			event.preventDefault();
		});
	}

	const $reportButton = document.querySelector('[data-report-button]');
	$reportButton.addEventListener('click', event => {
		event.preventDefault();

		let url = document.querySelector('[data-error-target]').dataset.errorTarget;
		url = url.replace('{message}', encodeURIComponent($input.value));
		url = url.replace('{time}', encodeURIComponent(player.getCurrentTime()));
    // TODO: Maybe use a library for browser detection
    let browser = navigator.userAgent;
    let os = navigator.platform;
		url = url.replace('{browser}', encodeURIComponent(browser));
		url = url.replace('{os}', encodeURIComponent(os));

		$modal.querySelector('.modal-body.form').classList.add('hidden');
		$modal.querySelector('.modal-body.thanks').classList.remove('hidden');

		const req = new XMLHttpRequest();
		req.open('GET', url, true);
		req.send(null);
	});
});
