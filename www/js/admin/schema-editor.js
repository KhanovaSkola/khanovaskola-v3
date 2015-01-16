$(function() {
	var $page = $('.schema-editor');
	if (!$page.length) {
		return;
	}

	$('#frm-schemaForm-form-editors').chosen({
		no_results_text: "Email nenalezen"
	});

	var $arrowTargets = $(".schema-wrapper.editor .cell-even");
	$(".arrow-picker .cell").draggable({
		revert: true,
		start: function() {
			$arrowTargets.addClass('highlight');
		},
		stop: function() {
			$arrowTargets.removeClass('highlight');
		}
	});
	$arrowTargets.droppable({
		tolerance: 'pointer',
		addClasses: false,
		drop: function(event, ui) {
			var arrow = getArrow(ui.draggable[0]);
			$(this).append($('<span/>').addClass(arrow));
		}
	});

	var lastTarget;
	var $blockTargets = $(".schema-wrapper.editor .cell-odd");
	$blockTargets.on('mouseenter', function() {
		lastTarget = $(this);
	});
	$(".block-picker li").draggable({
		tolerance: 'pointer',
		revert: true,
		revertDuration: 0,
		cursorAt: { left: -20, top: -20 },
		start: function() {
			$blockTargets.addClass('highlight');
		},
		stop: function() {
			$blockTargets.removeClass('highlight');
			var id = $(this).data('id');
			var title = $(this).text();
			lastTarget.data('id', id)
				.html('<i class="icon icon-math text-blue"></i>'
				+ $('<span/>').text(title)[0].outerHTML
			);
			lastTarget[0].className = 'cell cell-odd';
		}
	});

	$arrowTargets.on('mousedown', function(e) {
		if (e.which !== 3) {
			return;
		}
		var $field = $(this);
		$field[0].className.split(' ').forEach(function(className) {
			if (className.indexOf('arrow-') === 0) {
				$field.removeClass(className);
			}
		});
		$field.html('');
		return false;
	});
	$blockTargets.on('mousedown', function(e) {
		if (e.which !== 3) {
			return;
		}
		$(this).data('id', null).html('');
		return false;
	});

	function getArrow(el) {
		var match = el.className.match(/(^|\s+)(arrow-.*?)(\s+|$)/);
		return match ? match[2] : null;
	}

	function serializeSchema() {
		var ser = [];
		$('.schema-wrapper.editor').find('.col').each(function() {
			var col = [];
			$(this).find('.cell').each(function() {
				$cell = $(this);
				var id = $cell.data('id');
				if (col.length % 2 === 0) {
					col.push(id);
				} else {
					var base = getArrow($cell[0]);
					var arrows = base ? [base] : [];
					$cell.children('span').each(function() {
						if (arrow = getArrow($(this)[0])) {
							arrows.push(arrow);
						}
					});
					col.push(arrows);
				}
			});
			ser.push(col);
		});
		return ser;
	}
	window.debug=serializeSchema;

	$('#frm-schemaForm-form-save').click(function() {
		var ser = JSON.stringify(serializeSchema());
		$('#frm-schemaForm-form-layout').val(ser);
	});

	$('#filter').on('keyup change', function() {
		var filter = $(this).val().toLowerCase();
		if (!filter) {
			$('.block-picker li').show();
		} else {
			$('.block-picker li').hide().each(function() {
				if ($(this).text().toLowerCase().indexOf(filter) !== -1) {
					$(this).show();
				}
			});
		}
	});
});
