define({
	setup: () => {
		const $hintInput = document.querySelector('input[name="hint"]');
		const $showHintButton = document.querySelector('[data-show-hint]');
		const $label = document.querySelector('[data-hint-label]');

		$hintInput.value = false;

		let remainingHints = [];
		for (let $hint of document.querySelectorAll('[data-hints] li')) {
			remainingHints.push($hint);
		}

		$showHintButton.addEventListener('click', event => {
			const $hint = remainingHints.shift();

			$label.classList.remove('hidden');
			$hint.classList.remove('hidden');
			$hintInput.value = true;

			if (remainingHints.length === 0) {
				$showHintButton.classList.add('hidden');
			}

			event.preventDefault();
		});
	}
});
