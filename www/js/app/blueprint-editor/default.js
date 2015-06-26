define(['services/code'], function(code) {
	require(['app/blueprint-editor/to-refactor']);

	for (let $textarea of document.querySelectorAll('textarea')) {
		code.renderCode($textarea);
	}

});
