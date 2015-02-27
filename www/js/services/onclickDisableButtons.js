// Disable footer buttons that take long to respond (3rd party login)
define({
	disableOnclick: links => {
		const onClickSetDisabled = function (event) {
			for (let $link of links) {
				$link.removeEventListener('click', onClickSetDisabled);
				$link.setAttribute('disabled', true);
				$link.addEventListener('click', event => {
					event.preventDefault();
				});
			}
		};
		for (let $link of links) {
			$link.addEventListener('click', onClickSetDisabled);
		}
	}
});
