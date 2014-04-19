
App.client = new $.es.Client({
    hosts: 'localhost:9200'
});

App.autocomplete = function(query, cb) {
    App.client.search({
        index: 'clevents',
        type: 'event',
        body: {
            query: {
                match: {
                    title: query
                }
            }
        }
    }).then(function(results) {
        var titles = [];
        $.each(results.hits.hits, function(i, v) {
            titles.push({
                id: v._id,
                value: v._source.title
            });
        });
        cb(titles);
    });
};
