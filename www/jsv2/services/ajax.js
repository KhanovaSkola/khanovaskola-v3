define(['nette-ajax'], function() {
	let onBefore = [];
	let onSuccess = [];

	$.nette.init();
	$.nette.ext('app', {
		before: (xhr, settings) => {
			for (let cb of onBefore) {
				cb(xhr, settings);
			}
		},
		success: payload => {
			for (let cb of onSuccess) {
				cb(payload);
			}
		}
	});

	return {
		onBefore: onBefore,
		onSuccess: onSuccess
	};
});
