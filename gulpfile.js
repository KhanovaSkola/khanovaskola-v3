var fs = require('fs');
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var cache = require('gulp-cache');
var path = require('path');
var stream = require("event-stream")
var replace = require('gulp-replace-task');
var neon = require('neon-js/src/neon.js');

var configRaw = fs.readFileSync('./app/config/config.local.neon', 'utf8');
var config = neon.decode(configRaw);

var buildDir = './www/build';
var libDir = './www/libs';
var bsDir = './www/libs/bootstrap/less/';
var jsDir = './www/js';
var lessDir = './www/less';
var lessBootstrapFiles = [
	path.join(bsDir, 'variables.less'),
	path.join(lessDir, 'variables.less'),

	path.join(bsDir, 'mixins.less'),
	path.join(bsDir, 'normalize.less'),
	//path.join(bsDir, 'print.less'),
	//path.join(bsDir, 'glyphicons.less'),
	path.join(bsDir, 'scaffolding.less'),
	path.join(bsDir, 'type.less'),
	//path.join(bsDir, 'code.less'),
	path.join(bsDir, 'grid.less'),
	//path.join(bsDir, 'tables.less'),
	path.join(bsDir, 'forms.less'),
	path.join(bsDir, 'buttons.less'),
	path.join(bsDir, 'component-animations.less'),
	path.join(bsDir, 'dropdowns.less'),
	//path.join(bsDir, 'button-groups.less'),
	//path.join(bsDir, 'input-groups.less'),
	path.join(bsDir, 'navs.less'),
	//path.join(bsDir, 'navbar.less'),
	//path.join(bsDir, 'breadcrumbs.less'),
	//path.join(bsDir, 'pagination.less'),
	//path.join(bsDir, 'pager.less'),
	//path.join(bsDir, 'labels.less'),
	//path.join(bsDir, 'badges.less'),
	//path.join(bsDir, 'jumbotron.less'),
	//path.join(bsDir, 'thumbnails.less'),
	path.join(bsDir, 'alerts.less'),
	//path.join(bsDir, 'progress-bars.less'),
	//path.join(bsDir, 'media.less'),
	//path.join(bsDir, 'list-group.less'),
	//path.join(bsDir, 'panels.less'),
	//path.join(bsDir, 'responsive-embed.less'),
	//path.join(bsDir, 'wells.less'),
	path.join(bsDir, 'close.less'),
	path.join(bsDir, 'modals.less'),
	//path.join(bsDir, 'tooltip.less'),
	//path.join(bsDir, 'popovers.less'),
	//path.join(bsDir, 'carousel.less'),
	path.join(bsDir, 'utilities.less'),
	path.join(bsDir, 'responsive-utilities.less')
];
var lessFiles = [
	path.join(bsDir, 'variables.less'),
	path.join(bsDir, 'mixins.less'),

	path.join(lessDir, 'variables.less'),
	path.join(lessDir, 'mixins.less'),
	path.join(lessDir, 'main/fonts/*.less'),
	path.join(lessDir, 'main/base.less'),
	path.join(lessDir, 'main/components/*.less'),
	path.join(lessDir, 'main/pages/*.less')
];
var lessAdminLibFiles = [
	path.join(libDir, 'chosen/chosen.min.css'),
	path.join(libDir, 'codemirror/lib/codemirror.css'),
	path.join(libDir, 'codemirror/theme/solarized.css'),
	path.join(libDir, 'handsontable/dist/handsontable.full.min.css')
];
var lessAdminFiles = [
	path.join(lessDir, 'variables.less'),
	path.join(lessDir, 'mixins.less'),
	path.join(lessDir, 'admin/*.less'),
	path.join(lessDir, 'admin/components/*.less'),
	path.join(lessDir, 'admin/pages/*.less')
];
var lessExperimentFiles = [
	path.join(lessDir, 'experiments/*.less')
];
var jsFiles = [
	path.join(jsDir, '*.js'),
	path.join(jsDir, '**/*.js')
];

gulp.task('less-dev-main', function() {
	return stream.concat(
		gulp.src(lessBootstrapFiles)
			.pipe($.concat('bootstrap.less'))
			.pipe(cache($.less())),
		gulp.src(lessFiles)
			.pipe($.concat('main.less'))
			.pipe($.less())
			.pipe($.autoprefixer())
	)
		.pipe($.concat('main.css'))
		.pipe($.rename({suffix: '.min'}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('less-dev-admin', function() {
	return stream.concat(
		gulp.src(lessAdminLibFiles),
		gulp.src(lessAdminFiles)
			.pipe($.concat('main.admin.less'))
			.pipe($.less())
			.pipe($.autoprefixer())
	)
		.pipe($.concat('main.admin.css'))
		.pipe($.rename({suffix: '.min'}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('less-experiment', function() {
	return gulp.src(lessExperimentFiles)
		.pipe($.concat('experiment.search.always.visible.less'))
		.pipe($.less())
		.pipe($.autoprefixer())
		.pipe($.cssmin())
		.pipe($.rename({suffix: '.min'}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('less-production-main', function() {
	return stream.concat(
		gulp.src(lessBootstrapFiles)
			.pipe($.concat('bootstrap.less'))
			.pipe($.less()),
		gulp.src(lessFiles)
			.pipe($.concat('main.less'))
			.pipe($.less())
			.pipe($.autoprefixer())
	)
		.pipe($.concat('main.css'))
		.pipe($.cssmin())
		.pipe($.rename({suffix: '.min'}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('less-production-admin', function() {
	return stream.concat(
		gulp.src(lessAdminLibFiles),
		gulp.src(lessAdminFiles)
			.pipe($.concat('main.admin.less'))
			.pipe($.less())
			.pipe($.autoprefixer())
			.pipe($.cssmin())
	)
		.pipe($.concat('main.admin.css'))
		.pipe($.rename({suffix: '.min'}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('js-dev', function() {
	return gulp.src(jsFiles)
		.pipe($.babel())
		.pipe(replace({
			patterns: [{
				json: {
					elastic: {
						url: 'http://' + config.get('parameters').get('elastic').get('hosts').get(0) + ':9200',
						index: config.get('parameters').get('elastic').get('index')
					}
				}
			}]
		}))
		.pipe(gulp.dest(buildDir + '/js'));
});

gulp.task('js-production', function() {
	return gulp.src(jsFiles)
		.pipe($.babel())
		.pipe($.tap(function(file) {
			var name = file.path.replace(/.*[/\\]www[/\\]js[/\\]|\.js$/g, '');
			var content = file.contents.toString();
			content = content.replace(/\bdefine\(/, 'define("' + name + '", ');
			file.contents = new Buffer(content);
		}))
		.pipe(replace({
			patterns: [{
				json: {
					elastic: {
						url: 'https://elastic.khanovaskola.cz',
						index: config.get('parameters').get('elastic').get('index')
					}
				}
			}]
		}))
		.pipe($.concat('main.js'))
		.pipe($.uglify())
		.pipe(gulp.dest(buildDir + '/js'));
});

gulp.task('less-dev', ['less-dev-main', 'less-dev-admin']);
gulp.task('less', ['less-dev-main', 'less-dev-admin']);
gulp.task('less-production', ['less-production-main', 'less-production-admin']);

gulp.task('js', ['js-dev']);

gulp.task('dev', ['less-dev', 'js-dev']);

gulp.task('production', ['less-production', 'js-production']);

gulp.task('default', ['dev']);
