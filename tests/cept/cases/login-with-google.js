casper.test.begin('Login with Google', 4, function suite(test) {
	casper.plink('//Homepage:default', {}, function(url) {
		casper.start(url, function() {
			var btn = 'a.btn-google';
			test.assertExists(btn, 'Google login link found');

			this.click(btn);
		});

		casper.then(function() {
			var form = 'form[id="gaia_loginform"]';
			test.assertExists(form, 'Facebook login form is found');

			this.fill(form, {
				Email: 'acceptance.test.001@gmail.com',
				Passwd: 'dummypass'
			}, true);
		});

		casper.waitForUrl(/\/\/khanovaskola\.net/, function() {
			test.assertUrlMatch(/\/profile\/$/, 'Redirected to profile page');
			test.assertTextExists('Vítej', 'Welcome message shown');
		}, null, 10000);

		casper.run(function() {
			phantom.clearCookies();
			test.done();
		});
	});
});
