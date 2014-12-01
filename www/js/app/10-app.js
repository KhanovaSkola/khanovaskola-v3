var App = {};

App.error = function(args) {
	console.error('Error:', args);
    // TODO log to server
};

App.getTime = function() {
    var date = new Date;
    return date.getTime();
};

App.getTimer = function(name) {
    var then = App.getTime();
    return function() {
        return App.getTime() - then;
    };
};

App.callAll = function(callbacks, args) {
	callbacks.forEach(function(fn) {
		fn.apply(args);
	});
};
