$(function() {
	var $page = $('.block-editor');
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

	var $add = $('#content-editor-add');
	$('#filter').on('keyup change', function() {
		App.autocomplete($(this).val(), function(titles) {
			$add.find('li').remove();
			$.each(titles, function(i, title) {
				$add.append($('<li/>').data('content-id', title.id).text(title.value));
			});
		});
	});

	function serializeBlocks() {
		var ser = [];
		$('#content-editor').find('li').each(function() {
			ser.push($(this).data('content-id'));
		});
		return ser;
	}

	$('#frm-blockForm-form-save').on('click', function() {
		var ser = JSON.stringify(serializeBlocks());
		$('#frm-blockForm-form-contents').val(ser);
	});
});
