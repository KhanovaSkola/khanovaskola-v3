$(function() {
    var $exercise = $('[data-exercise]');
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

    var hints = $exercise.find('[data-hint]').hide().toArray();
    $('[data-show-hint]').click(function() {
        $exercise.find('[name=hint]').val(true);
        $(hints.shift()).show();
        $exercise.find('[data-hint-label]').removeClass('hidden');

        if (!hints.length) {
            $(this).hide();
        }
        return false;
    });
});
