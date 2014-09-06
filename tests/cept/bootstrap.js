var _ = require('proxy.js');

/**
 * @param command string
 * @param args array
 * @param cb callable(err, stdout, stderr)
 */
casper.system = function(command, args, cb) {
	var childProcess;
	try {
		childProcess = require("child_process");
		childProcess.execFile(command, args, null, cb);
	} catch (e) {
		this.log(e, "error");
	}
};

/**
 * @param target string
 * @param args array
 * @param cb callable(url)
 */
casper.plink = function(target, args, cb) {
	var sysArgs = ['/Users/mikulas/Projects/khanovaskola/www/index.php', 'link', target];
	args && _.map(args, function(val, key) {
		sysArgs.push(key + "=" + val);
	});
	casper.system('php', sysArgs,
		function (error, stdout, stderr) {
			cb(stdout);
		}
	);
};
