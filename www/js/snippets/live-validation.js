(function() {
	Nette.addError = function(elem, message) {
		$(elem).parents('.form-group').addClass('has-error')
		console.log(arguments);
	};
})();
