define(['lib/codemirror', 'lib/codemirror-xml'], function(CodeMirror) {
	return {
		renderCode: function($textarea) {
			CodeMirror.fromTextArea($textarea, {
				mode: "xml",
				lineNumbers: true,
				theme: "solarized",
				htmlMode: true,
				autoCloseTags: true,
				extraKeys: {
					"Alt-E": cm => {
						cm.replaceSelection("<eval>" + cm.getSelection() + "</eval>");
					},
					"Alt-L": cm => {
						cm.replaceSelection("<latex>" + cm.getSelection() + "</latex>");
					},
					"Alt-C": cm => {
						cm.replaceSelection("<color id=\"1\">" + cm.getSelection() + "</color>");
					},
					"Alt-I": cm => {
						cm.replaceSelection("<inflect case=\"3\">" + cm.getSelection() + "</inflect>");
					},
					"Alt-N": cm => {
						cm.replaceSelection("<numebr>" + cm.getSelection() + "</number>");
					}
				}
			});
		}
	};
});
