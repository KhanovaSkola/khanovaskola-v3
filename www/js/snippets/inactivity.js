/**
 * Triggered after a minute of inactivity
 * App.onInactive.add(callback);
 */

App._idleSince = null;

App._resetIdleTime = function() {
    App._idleSince = App.getTime();
};

App._checkIdle = function() {
    if (App._idleSince === null)
    {
        return;
    }

    var idleFor = App.getTime() - App._idleSince;
    if (idleFor > 60 * 1000)
    {
        App.onInactive.fire();
        App._idleSince = null;
    }
};


App._resetIdleTime();
App.onInactive = $.Callbacks();

$(document).mousemove(App._resetIdleTime);
$(document).keypress(App._resetIdleTime);

setInterval(App._checkIdle, 250);
