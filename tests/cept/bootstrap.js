var _ = require('proxy.js');

/**
 * @param command string
 * @param args array
 * @param cb callable(err, stdout, stderr)
 */
casper.system = function(command, args, cb) {
	casper.echo('casper.system');
	var childProcess;
	try {
		childProcess = require("child_process");
		casper.echo('casper.system try');
		childProcess.execFile(command, args, null, cb);
		casper.echo('casper.system done');
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
	casper.echo('plink 2');
	casper.system('php', sysArgs,
		function (error, stdout, stderr) {
			casper.echo('plink cb');
			cb(stdout);
		}
	);
};

casper.startUrl = casper.start;
casper.start = function(target, args, cb) {
	casper.echo('casper.start.inner');
	casper.plink(target, args, function(url) {
		casper.echo('casper.start.inner.cb');
		casper.startUrl(url, cb);
	});
};
