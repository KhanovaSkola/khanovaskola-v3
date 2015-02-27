define(function() {
	let subtitles = [];
	let lastIndex = null;
	const $subtitlesContent = document.querySelector('.subtitles-content');

	return {
		load: url => {
			const request = new XMLHttpRequest();
			request.open('GET', url, true);
			request.onload = () => {
				if (request.status >= 200 && request.status < 400) {
					subtitles = JSON.parse(request.responseText);
				}
			};
			request.send();
		},
		show: time => {
			// Optimization so we don't have to iterate over
			//  all subtitles on every single rendering.
			if (lastIndex !== null) {
				if (subtitles[lastIndex].start <= time && subtitles[lastIndex].end >= time) {
					return;
				}
				if (! lastIndex + 1 in subtitles) {
					// end of subtitles
					$subtitlesContent.textContent = '';
					lastIndex = null;
					return;
				}
				if (subtitles[lastIndex + 1].start <= time && subtitles[lastIndex + 1].end >= time) {
					lastIndex = lastIndex + 1;
					$subtitlesContent.textContent = subtitles[lastIndex].text;
					return;
				}
			}

			subtitles.every((node, index) => {
				if (node.start <= time && node.end >= time) {
					$subtitlesContent.textContent = node.text;
					lastIndex = index;
					return false;
				}
				return true;
			});
		},
		hide: () => {
			$subtitlesContent.textContent = '';
		}
	};
});
