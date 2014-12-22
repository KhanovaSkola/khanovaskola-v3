casper.test.begin('Login with Facebook', 5, function suite(test) {
	casper.plink('//Homepage:default', {}, function(url) {
		casper.start(url, function() {
			var btn = 'a.btn-facebook';
			test.assertExists(btn, 'Facebook login link found');

			this.click(btn);
		});

		casper.then(function() {
			var form = 'form[id="login_form"]';
			test.assertExists(form, 'Facebook login form is found');

			this.fill(form, {
				email: 'marco_patgiwy_arment@tfbnw.net',
				pass: 'kArroyPeWoFmeLvAdRaVHXhFv'
			}, true);
		});

		casper.then(function() {
			test.assertUrlMatch(/\/profile\/$/, 'Redirected to profile page');
			test.assertTextExists('Vítej', 'Welcome message shown');
		});

		casper.run(function() {
			phantom.clearCookies();
			test.done();
		});
	});
});
