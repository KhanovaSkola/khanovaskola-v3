$(function() {
	var previous;
	$('.editable').each(function() {
		var editor = new MediumEditor($(this), {
			buttons: ['bold', 'italic', 'anchor', 'header1'],
			disableDoubleReturn: true
		});
		$(this).on('input', function() {
			var text = editor.serialize()[$(this).attr('id')].value;
			if (previous) {
				previous.abort();
			}
			previous = $.ajax({
				url: $(this).data('url-save'),
				data: {text: text},
				type: 'POST',
				success: function(res) {
					if (!res.saved)
					{
						App.error(arguments);
					}
				},
				error: function(res) {
					App.error(arguments);
				}
			});
		});
	});
});
