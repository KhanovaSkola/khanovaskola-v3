define(function() {
	const getUrls = function($wrapper) {
		return {
			init: $wrapper.getAttribute('data-url-event-begin'),
			seek: $wrapper.getAttribute('data-url-event-seek'),
			pause: $wrapper.getAttribute('data-url-event-pause'),
			changeView: $wrapper.getAttribute('data-url-event-change-view'),
			tick: $wrapper.getAttribute('data-url-event-tick')
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
