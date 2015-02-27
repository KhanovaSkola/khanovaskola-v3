define(['lib/chosen'], function() {
	const $editors = document.querySelector('[data-editors]');
	jQuery($editors).chosen({
		no_results_text: "Email nenalezen"
	});
});
