define(function() {
	const containers = document.querySelectorAll('.floating-placeholder');
	for (let $container of containers) {
		const $input = $container.querySelector('input');
		$input.addEventListener('keyup', () => {
			$container.classList.toggle('float', $input.value);
		});
	}
});
