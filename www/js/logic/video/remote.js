define(function() {
	const getUrls = function($wrapper) {
		return {
			init: $wrapper.dataset.urlEventBegin,
			seek: $wrapper.dataset.urlEventSeek,
			pause: $wrapper.dataset.urlEventPause,
			changeView: $wrapper.dataset.urlEventChangeView,
			tick: $wrapper.dataset.urlEventTick,
		};
	};

	let viewId = null;
	const $wrapper = document.querySelector('.video-wrapper');
	const urls = getUrls($wrapper);

	const getUrl = function(event, args) {
		let url = urls[event].replace('{viewId}', viewId);
		for (let key in args) {
			url = url.replace(`{${key}}`, args[key]);
		}
		return url;
	};

	return {
		call: (event, args = [], cb = (payload) => {}) => {
			if (event !== 'init' && viewId === null) {
				// TODO maybe queue it for later?
				return;
			}

			const request = new XMLHttpRequest();
			request.open('POST', getUrl(event, args), true);
			request.onload = () => {
				if (request.status >= 200 && request.status < 400) {
					const payload = JSON.parse(request.responseText);
					if (payload.hasOwnProperty('viewId')) {
						viewId = payload.viewId;
					}
					cb(payload);
				}
			};

			request.send();
		}
	};
});
