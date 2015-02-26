define(['logic/video/fullscreen', 'logic/video/player'], function(fullscreen, player) {
	/**
	 * Custom double click handler
	 * clickDelta timeout after first click
	 * - if clicked again, just invoke double click
	 * - if clicked again after clickDelta, rollback
	 *   from whatever click did and invoke double click
	 */
	const $clickCatcher = document.querySelector('.video-click-catcher');

	const clickDelta = 200;
	const doubleClickDelta = 600;
	let lastClickAt = 0;
	let seekBackOnDoubleClick = false;
	let doClick;
	$clickCatcher.addEventListener('click', event => {
		clearTimeout(doClick);

		var now = window.performance ? window.performance.now() : (new Date).getTime();
		doClick = setTimeout(() => {
			player.togglePlay();
			seekBackOnDoubleClick = player.getCurrentTime();
		}, clickDelta);
		setTimeout(() => {
			seekBackOnDoubleClick = false;
		}, doubleClickDelta);

		if (now - lastClickAt < doubleClickDelta) {
			clearTimeout(doClick);
			if (seekBackOnDoubleClick) {
				player.togglePlay();
				player.seek(seekBackOnDoubleClick);
				seekBackOnDoubleClick = false;
			}
			fullscreen.toggle();
		}
		lastClickAt = now;

		event.preventDefault();
	});
});
