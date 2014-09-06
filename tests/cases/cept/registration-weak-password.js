casper.test.begin('Warn when registering with weak password', 5, function suite(test) {
	casper.start("http://travis.khanovaskola.cz/auth/registration", function() {
		var form = 'form[id="frm-registrationForm-form"]';
		test.assertExists(form, "Registration form is found");

		this.fill(form, {
			password: "weak"
		}, false);
		test.assertExists('.has-warning [name="password"]', "Warn on weak password");

		this.fill(form, {
			password: "ifPQu4qcjh9oT$Rg[PsBWw[m9"
		}, false);
		test.assertDoesntExist('.has-warning [name="password"]', "Approve strong password");

		this.fill(form, {
			email: 'ifPQu4qcjh9oT$Rg[PsBWw[m9@gmail.com',
			password: "ifPQu4qcjh9oT$Rg[PsBWw[m9"
		}, false);
		test.assertExist('.has-warning [name="password"]', "Username in password considered weak");

		this.fill(form, {
			name: 'Mikuláš Dítě',
			password: "dite mikulas"
		}, false);
		test.assertExist('.has-warning [name="password"]', "Name in password considered weak");
	});

	casper.run(function() {
		test.done();
	});
});
