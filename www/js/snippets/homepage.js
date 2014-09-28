$(function() {
	$('[data-toggle]').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});
	$('[data-toggle]:first').tab('show');
});
