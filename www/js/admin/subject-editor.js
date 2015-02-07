$(function() {
	var $page = $('.subject-editor');
	if (!$page.length) {
		return;
	}

	$('#content-editor, #content-editor-remove, #content-editor-add').sortable({
		connectWith: ".drag",
		start: function() {
			$('.drag').addClass('highlight');
		},
		stop: function() {
			$('.drag').removeClass('highlight');
		}
	}).disableSelection();

	var $list = $('.schema-list');
	function serializeSchemas() {
		var ser = {};
		var pos = 0;
		$list.find('li').each(function() {
			ser[$(this).data('schema-id')] = {
				position: pos++
			};
		});
		return ser;
	}

	$('[data-subject-form]').on('submit', function() {
		$('[data-positions]').val(JSON.stringify(serializeSchemas()));
	});

	$('[data-editors]').chosen({
		no_results_text: "Email nenalezen"
	});
});
