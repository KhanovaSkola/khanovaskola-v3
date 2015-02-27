// Open dropdowns onClick toggle element
define(['logic/header/hover', 'lib/dropdown'], function(hover) {
	let openedDropdown = null;

	const close = function() {
		if (openedDropdown) {
			openedDropdown.classList.remove('open');
			openedDropdown = null;
			hover.onDropdownClosed();
		}
	};

	const openDropdown = function($dropdown) {
		$dropdown.classList.add('open');
		openedDropdown = $dropdown;
		hover.onDropdownOpened();
	};

	for (let $dropdown of document.querySelectorAll('.dropdown')) {
		const $toggle = $dropdown.querySelector('.dropdown-toggle');
		$toggle.addEventListener('click', event => {
			if ($dropdown == openedDropdown) {
				// Close dropdown
				openedDropdown.classList.remove('open');
				openedDropdown = null;
				hover.onDropdownClosed();

			} else {
				if (openedDropdown) {
					// Open dropdown when another is opened
					openedDropdown.classList.remove('open');
				}

				openDropdown($dropdown);
			}

			event.stopPropagation();
			event.preventDefault();
		});
	}

	return {
		openDropdown: openDropdown,
		close: close
	};
});
