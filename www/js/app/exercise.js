$(function() {
    var $exercise = $('#frm-answer');
    if (!$exercise.length) {
        return;
    }

    App.onInactive.add(function() {
        $exercise.find('[name=inactivity]').val(true);
    });

    var timer = App.getTimer('exercise');
    $exercise.on('submit', function() {
        $(this).find('[name=time]').val(timer());
    });
});
