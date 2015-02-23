define({
	guess: (name, template, cb) => {
		const url = template.replace('{name}', encodeURIComponent(name));
		const request = new XMLHttpRequest();
		request.open('GET', url, true);

		request.onload = () => {
			if (request.status < 200 || request.status >= 400) {
				return;
			}
			const data = JSON.parse(request.responseText);
			cb(data);
		};

		request.send();
		return request;
	}
});
