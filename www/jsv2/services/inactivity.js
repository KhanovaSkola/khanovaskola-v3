define(['services/timer'], function(timer) {
	let onInactive = [];
	let lastActionAt = timer.create();

	setInterval(() => {
		if (lastActionAt() > 180) {
			for (let cb of onInactive) {
				cb();
			}
		}
	}, 250);

	const reset = function() {
		lastActionAt = timer.create();
	};

	document.addEventListener('mousemove', reset);
	document.addEventListener('keydown', reset);

	return {
		onInactive: onInactive
	};
});
