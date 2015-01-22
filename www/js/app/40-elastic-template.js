App.getSearchTemplate = function(query) {
	return {
    "fields": [
        "id",
        "title"
    ],
    "from": 0,
    "size": 5,
    "query": {
        "function_score": {
            "query": {
                "bool": {
                    "should": [
                        {
                            "match": {
                                "title": query
                            }
                        },
                        {
                            "match": {
                                "description": query
                            }
                        },
                        {
                            "match_phrase": {
                                "subtitles": query
                            }
                        },
                        {
                            "term": {
                                "youtube_id": query
                            }
                        }
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
};
};
