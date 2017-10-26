define(function() {
	const host = '@@elastic.url';
	const index = '@@elastic.index';

	let postRequest = function(url, data, ok, fail = function() {}) {
		const request = new XMLHttpRequest();
		request.open('POST', url, true);

		request.onload = () => {
			if (request.status < 200 || request.status >= 400) {
				return fail();
			}
			const data = JSON.parse(request.responseText);
			ok(data);
		};
		request.onerror = fail;
		request.send(data);
	};

	const buildQuery = function (query, size) {
		return {
			"fields": ["id", "title"],
			"from": 0,
			"size": size,
			"query": {
				"function_score": {
					"query": {
						"bool": {
							"should": [
								{"match": {"title": query}},
								{"match": {"description": query}},
								{"match_phrase": {"subtitles": query}},
								{"term": {"youtube_id": query}},
								{"term": {"youtube_id_original": query}}
							]
						}
					},
					"score_mode": "sum",
					"boost_mode": "sum",
					"functions": [
						{
							"field_value_factor": {
								"field": "schema_count",
								"factor": 1.2
							}
						},
						{
							"field_value_factor": {
								"field": "block_count",
								"factor": 1.1
							}
						},
						{
							"field_value_factor": {
								"field": "position",
								"factor": -0.01
							}
						}
					]
				}
			}
		}
	};

	let complete = function(query, cb, size = 5) {
		const url = `${host}/${index}/content/_search`;
		const data = JSON.stringify(buildQuery(query, size));
		postRequest(url, data, results => {
			let titles = [];
			results.hits.hits.forEach(row => {
				titles.push({
					id: row._id,
					value: row.fields.title
				});
			});
			cb(titles);
		});
	};

	return {
		complete: complete
	};
});
