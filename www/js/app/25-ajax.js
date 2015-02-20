(function() {
	App.ajax = {};
	App.ajax.onBefore= [];
	App.ajax.onSuccess = [];

	$.nette.init();
	$.nette.ext('app', {
		before: function(xhr, settings) {
			App.callAll(App.ajax.onBefore, [xhr, settings]);
		},
		success: function() {
			App.callAll(App.ajax.onSuccess);
		}
	});
	$.nette.ext('mathjax', {
		success: function() {
			MathJax.Hub.Typeset();
		}
	});
})();
