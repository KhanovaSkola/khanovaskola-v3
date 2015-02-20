/**
 * Triggered after a minute of inactivity
 * App.onInactive.add(callback);
 */

(function() {
    var $exercise = $('[data-exercise]');
    if (!$exercise.length) {
        return;
    }

    var idleSince = null;

    var resetIdleTime = function() {
        idleSince = App.getTime();
    };

    var checkIdle = function() {
        if (idleSince === null)
        {
            return;
        }

        var idleFor = App.getTime() - idleSince;
        if (idleFor > 60 * 1000)
        {
            App.callAll(App.onInactive);
            idleSince = null;
        }
    };

    resetIdleTime();
    App.onInactive = [];

    $(document).mousemove(resetIdleTime);
    $(document).keypress(resetIdleTime);

    setInterval(checkIdle, 250);
})();
