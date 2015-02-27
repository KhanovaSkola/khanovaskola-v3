define(['codemirror', 'codemirror-xml'], function(CodeMirror) {

	require(['app/blueprint-editor/to-refactor']);

	for (let $textarea of document.querySelectorAll('textarea')) {
		CodeMirror.fromTextArea($textarea, {
			mode: "xml",
			lineNumbers: true,
			theme: "solarized",
			htmlMode: true,
			autoCloseTags: true,
			extraKeys: {
				"Ctrl-E": cm => {
					cm.replaceSelection("<eval>" + cm.getSelection() + "</eval>");
				},
				"Ctrl-L": cm => {
					cm.replaceSelection("<latex>" + cm.getSelection() + "</latex>");
				},
				"Ctrl-C": cm => {
					cm.replaceSelection("<color id=\"1\">" + cm.getSelection() + "</color>");
				},
				"Ctrl-I": cm => {
					cm.replaceSelection("<inflect case=\"3\">" + cm.getSelection() + "</inflect>");
				},
				"Ctrl-N": cm => {
					cm.replaceSelection("<numebr>" + cm.getSelection() + "</number>");
				}
			}
		});
	}
});
