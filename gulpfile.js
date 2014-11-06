var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var path = require('path');

var lessDir = './www/less';
var lessFiles = path.join(lessDir, '*', '**');
var lessMainFile = path.join(lessDir, 'main.less');
var cssDir = './www/build';

gulp.task('less', function () {
	gulp.src(lessMainFile)
		.pipe($.sourcemaps.init())
		.pipe($.less())
		.pipe($.autoprefixer())
		.pipe($.rename({suffix: '.min'}))
		.pipe($.sourcemaps.write('.', {
			sourceRoot: '../less'
		}))
		.pipe(gulp.dest(cssDir))
		.pipe($.livereload());
});

gulp.task('production', function () {
	gulp.src(lessMainFile)
		.pipe($.less())
		.pipe($.autoprefixer())
		.pipe($.cssmin())
		.pipe($.rename({suffix: '.min'}))
		.pipe(gulp.dest(cssDir));
});

gulp.task('default', function() {
	gulp.start('less');
});

gulp.task('watch', ['less'], function() {
	//Watch changes (less, )
	$.watch('www/less/**.less', ['less']);
	$.watch('www/less/**/**.less', ['less']);
	$.watch('*.html', ['less']);
});
