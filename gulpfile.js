var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var path = require('path');
var replace = require('gulp-replace-task');

var lessDir = './www/less';
var lessFiles = path.join(lessDir, '*', '**');
var lessMainFile = path.join(lessDir, 'main.less');
var buildDir = './www/build';
var jsDir = './www/js';
var jsFiles = [
	path.join(jsDir, 'app.js'),
	path.join(jsDir, 'services/*.js'),
	path.join(jsDir, 'snippets/*.js'),
	path.join(jsDir, 'components/controls/*.js'),
	path.join(jsDir, 'components/forms/*.js')
];

gulp.task('dev', function () {
	gulp.src(lessMainFile)
		.pipe($.sourcemaps.init())
		.pipe($.less())
		.pipe($.autoprefixer())
		.pipe($.rename({suffix: '.min'}))
		.pipe($.sourcemaps.write('.', {
			sourceRoot: '../less'
		}))
		.pipe(gulp.dest(buildDir));

	gulp.src(jsFiles)
		.pipe($.sourcemaps.init())
		.pipe($.uglify())
		.pipe($.concat('app.min.js'))
		.pipe(replace({
			patterns: [{
				json: {
					domain: {
						elastic: 'http://localhost:9200'
					}
				}
			}]
		}))
		.pipe($.sourcemaps.write('.', {
			sourceRoot: '../js'
		}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('production', function () {
	gulp.src(lessMainFile)
		.pipe($.less())
		.pipe($.autoprefixer())
		.pipe($.cssmin())
		.pipe($.rename({suffix: '.min'}))
		.pipe(gulp.dest(buildDir));

	gulp.src(jsFiles)
		.pipe($.uglify())
		.pipe($.concat('app.min.js'))
		.pipe(replace({
			patterns: [{
				json: {
					domain: {
						elastic: 'https://elastic.khanovaskola.cz'
					}
				}
			}]
		}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('default', function() {
	gulp.start('dev');
});

gulp.task('watch', ['less'], function() {
	//Watch changes (less, )
	$.watch('www/less/**.less', ['less']);
	$.watch('www/less/**/**.less', ['less']);
	$.watch('*.html', ['less']);
});
