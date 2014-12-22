var fs = require('fs');
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var path = require('path');
var replace = require('gulp-replace-task');
var neon = require('neon-js/src/neon.js');

var configRaw = fs.readFileSync('./app/config/config.local.neon', 'utf8');
var config = neon.decode(configRaw);

var lessDir = './www/less';
var lessFile = path.join(lessDir, 'main.less');
var buildDir = './www/build';
var libDir = './www/libs';
var jsDir = './www/js';
var jsFiles = [
	path.join(libDir, 'bootstrap/js/alert.js'),
	path.join(libDir, 'bootstrap/js/tab.js'),
	path.join(libDir, 'bootstrap/js/modal.js'),
	path.join(libDir, 'jquery-timeago/jquery.timeago.js'),
	path.join(libDir, 'jquery-timeago/locales/jquery.timeago.cs.js'),
	path.join(libDir, 'nette-forms/src/assets/netteForms.js'),
	path.join(libDir, 'typeahead.js/dist/typeahead.jquery.min.js'),
	path.join(libDir, 'smooth-scroll/dist/js/smooth-scroll.js'),
	path.join(jsDir, 'app/*.js'),
	path.join(jsDir, 'services/*.js'),
	path.join(jsDir, 'snippets/*.js'),
	path.join(jsDir, 'components/*.js'),
	path.join(jsDir, 'components/controls/*.js'),
	path.join(jsDir, 'components/forms/*.js')
];
var jsxFiles = [
	'./app/**/*.jsx'
];

gulp.task('jsx', function () {
	gulp.src(jsxFiles)
		.pipe($.react())
		.pipe(gulp.dest(buildDir));
});

gulp.task('less-dev', function() {
	gulp.src(lessFile)
		.pipe($.sourcemaps.init())
		.pipe($.less())
		.pipe($.autoprefixer())
		.pipe($.rename({suffix: '.min'}))
		.pipe($.sourcemaps.write('.', {
			sourceRoot: '../less'
		}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('less-production', function() {
	gulp.src(lessFile)
		.pipe($.less())
		.pipe($.autoprefixer())
		.pipe($.cssmin())
		.pipe($.rename({suffix: '.min'}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('js-dev', function() {
	gulp.src(jsFiles)
		.pipe($.sourcemaps.init())
		.pipe($.uglify())
		.pipe($.concat('app.min.js'))
		.pipe(replace({
			patterns: [{
				json: {
					elastic: {
						url: 'http://localhost:9200',
						index: config.get('parameters').get('elastic').get('index')
					}
				}
			}]
		}))
		.pipe($.sourcemaps.write('.', {
			sourceRoot: '../js'
		}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('js-production', function() {
	gulp.src(jsFiles)
		.pipe($.uglify())
		.pipe($.concat('app.min.js'))
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
		.pipe(gulp.dest(buildDir));
});

gulp.task('dev', function () {
	gulp.start('less-dev');
	gulp.start('jsx');
	gulp.start('js-dev');
});

gulp.task('production', function () {
	gulp.start('less-production');
	gulp.start('jsx');
	gulp.start('js-production');
});

gulp.task('default', function() {
	gulp.start('dev');
});
