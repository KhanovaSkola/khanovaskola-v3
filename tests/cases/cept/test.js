casper.test.begin('Google search retrieves 10 or more results', 5, function suite(test) {
	casper.start("http://www.google.cz/", function() {
		test.assertTitle("Google", "google homepage title is the one expected");
		test.assertExists('form[action="/search"]', "main form is found");
		this.fill('form[action="/search"]', {
			q: "khanova škola"
		}, true);
	});

	casper.then(function() {
		test.assertTitle("khanova škola - Hledat Googlem", "google title is ok");
		test.assertUrlMatch(/q=khanova\+škola/, "search term has been submitted");
		test.assertEval(function() {
			return __utils__.findAll("h3.r").length >= 10;
		}, "google search for \"khanova škola\" retrieves 10 or more results");
	});

	casper.run(function() {
		test.done();
	});
});
