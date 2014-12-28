$(function() {
	var $page = $('.subject-editor');
	if (!$page.length) {
		return;
	}

	$('.drag').sortable().disableSelection();

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

	$('#frm-subjectForm-form').on('submit', function() {
		$('#frm-subjectForm-form-positions').val(JSON.stringify(serializeSchemas()));
	});

	$('#frm-subjectForm-form-editors').chosen({
		no_results_text: "Email nenalezen"
	});
});
