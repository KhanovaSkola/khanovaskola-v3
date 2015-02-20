$(function() {
    var $exercise = $('[data-exercise]');
    if (!$exercise.length) {
        return;
    }
    var $container = $('.right-inner');

    App.onInactive.push(function() {
        $container.find('[name=inactivity]').val(true);
    });

    var timer = App.getTimer();
    var onSubmit = function() {
        $container.find('[name=time]').val(timer());
    };
    $container.on('submit', '[data-exercise]', onSubmit);
    App.ajax.onBefore.push(function(xhr, settings) {
        settings.data.append('time', timer());
        $container.find('[type="submit"]').addClass('disabled');
    });


    var hints = null;
    App.ajax.onSuccess.push(function() {
        hints = null;
        $container.find('[name=hint]').val(false);
        timer = App.getTimer();
        $container.find('input:first').focus();
    });

    $container.on('click', '[data-show-hint]', function() {
        if (hints === null)
        {
            hints = $container.find('[data-hint]').hide().toArray();
        }
        $container.find('[name=hint]').val(true);
        $(hints.shift()).removeClass('hidden').show();
        $container.find('[data-hint-label]').removeClass('hidden');

        if (!hints.length) {
            $(this).hide();
        }
        return false;
    });
});
