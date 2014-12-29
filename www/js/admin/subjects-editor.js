$(function() {
	var $page = $('.subjects-editor');
	if (!$page.length) {
		return;
	}

	$('[name=color]').on('change', function() {
		var $container = $(this).parents('li').children('span');
		$container.removeClass();
		$container.addClass('subject-name text-' + $(this).val());
	});
	$('[name=icon]').on('change', function() {
		var $icon = $(this).parents('li').find('[data-icon]');
		$icon.removeClass();
		$icon.addClass('icon-' + $(this).val());
	});

	$('.drag').sortable().disableSelection();

	var url = $('[data-save-url]').data('save-url');
	$('#save').on('click', function() {
		window.location = url + '&payload=' + JSON.stringify(serializeSubjects());
	});

	var $list = $('.subject-list');
	function serializeSubjects() {
		var ser = {};
		var pos = 0;
		$list.find('li').each(function() {
			var mColor = /\btext-([^ ]+)/.exec($(this).find('.subject-name')[0].className);
			var mIcon = /icon-([^ ]+)/.exec($(this).find('[data-icon]')[0].className);
			ser[$(this).data('subject-id')] = {
				icon: mIcon[1],
				color: mColor[1],
				position: pos++
			};
		});
		return ser;
	}
});
