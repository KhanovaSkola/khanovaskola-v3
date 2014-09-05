casper.test.begin('Homepage has search and search term is present on results page', 2, function suite(test) {
	casper.start("http://travis.khanovaskola.cz:8093", function() {
		var form = 'form[id="frm-search-form"]';
		test.assertExists(form, "Search form is found");
		this.fill(form, {
			query: "rychlost"
		}, true);
	});

	casper.waitForUrl(/results/, function() {
		test.assertTextExists("Výsledky pro rychlost");
	});

	casper.run(function() {
		test.done();
	});
});
