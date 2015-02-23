// Open dropdowns onClick toggle element
define(['logic/header/hover', 'dropdown'], function(hover) {
	let openedDropdown = null;

	// Close dropdown on clicking outside header
	const $body = document.getElementsByTagName('body')[0];
	const $header = document.getElementsByTagName('header')[0];
	$body.addEventListener('click', event => {
		if (openedDropdown) {
			openedDropdown.classList.remove('open');
			openedDropdown = null;
			hover.onDropdownClosed();
		}
	});
	$header.addEventListener('click', event => {
		event.stopPropagation();
	});

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
		openDropdown: openDropdown
	};
});
