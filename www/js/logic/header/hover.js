define(function() {
	const $header = document.getElementsByTagName('header')[0];
	let dropdownOpened = false;


	const $searchInput = document.querySelector('.search-wrapper input');
	$searchInput.addEventListener('focus', () => {
		$header.classList.add('hover');
	});
	$searchInput.addEventListener('blur', () => {
		if (!dropdownOpened) {
			$header.classList.remove('hover');
		}
	});


	return {
		onDropdownOpened: () => {
			dropdownOpened = true;
			$header.classList.add('hover');
		},
		onDropdownClosed: () => {
			dropdownOpened = false;
			$header.classList.remove('hover');
		}
	}
});
