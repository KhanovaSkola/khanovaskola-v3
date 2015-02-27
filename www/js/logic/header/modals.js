define(['lib/modal'], function() {
	const toggles = document.querySelectorAll('[data-toggle="modal"]');
	for (let $toggle of toggles) {
		$toggle.addEventListener('click', event => {
			const $modal = document.querySelector($toggle.dataset.target);
			jQuery($modal).modal({show: true});
			event.preventDefault();
		});
	}
});
