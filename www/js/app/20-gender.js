(function() {

	App.remote = {};
	App.remote.guessGender = function(name, cb) {
		$.ajax({
			url: '/js/guess-gender',
			data: {name :name},
			success: cb
		});
	};

})();
