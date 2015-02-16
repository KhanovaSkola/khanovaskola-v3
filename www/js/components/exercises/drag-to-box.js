$(function() {
	var $container = $('.exercise-scalar-drag-to-box');
	if (!$container.length) {
		return;
	}

	var $answerBucket = $container.find('.answer-bucket');
	var $answerField = $container.find('[name="answer"]');
	$container.parents('[data-exercise]').find('.bucket').sortable({
		items: '> img',
		connectWith: '.bucket',
		start: function(event, ui) {
			ui.item.addClass('dragging');
		},
		stop: function(event, ui) {
			ui.item.removeClass('dragging');
		},
		update: function(event, ui) {
			var answer = $answerBucket.find('img').length;
			console.info("answer set to", answer);
			$answerField.val(answer);
		}
	});
});
