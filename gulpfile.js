var fs = require('fs');
var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var path = require('path');
var replace = require('gulp-replace-task');
var neon = require('neon-js/src/neon.js');

var configRaw = fs.readFileSync('./app/config/config.local.neon', 'utf8');
var config = neon.decode(configRaw);

var buildDir = './www/build';
var libDir = './www/libs';
var bsDir = './www/libs/bootstrap/less/';
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
	path.join(libDir, 'isInViewport/lib/isInViewport.min.js'),
	path.join(jsDir, 'app/*.js'),
	path.join(jsDir, 'services/*.js'),
	path.join(jsDir, 'snippets/*.js'),
	path.join(jsDir, 'components/*.js'),
	path.join(jsDir, 'components/controls/*.js'),
	path.join(jsDir, 'components/forms/*.js')
];
var jsAdminFiles = [
	path.join(libDir, 'jquery-ui/jquery-ui.min.js'),
	path.join(libDir, 'chosen_v1.3.0/chosen.jquery.min.js'),
	path.join(jsDir, 'admin/*.js')
];
var lessDir = './www/less';
var lessFiles = [
	path.join(bsDir, 'variables.less'),
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
	path.join(bsDir, 'responsive-utilities.less'),

	path.join(lessDir, 'variables.less'),
	path.join(lessDir, 'mixins.less'),
	path.join(lessDir, 'main/fonts/*.less'),
	path.join(lessDir, 'main/base.less'),
	path.join(lessDir, 'main/components/*.less'),
	path.join(lessDir, 'main/pages/*.less')
];
var lessAdminFiles = [
	path.join(libDir, 'chosen_v1.3.0/chosen.min.css'),
	path.join(lessDir, 'variables.less'),
	path.join(lessDir, 'mixins.less'),
	path.join(lessDir, 'admin/*.less'),
	path.join(lessDir, 'admin/pages/*.less')
];

gulp.task('less-dev-main', function() {
	return gulp.src(lessFiles)
		.pipe($.sourcemaps.init())
		.pipe($.concat('main.less'))
		.pipe($.less())
		.pipe($.autoprefixer())
		.pipe($.rename({suffix: '.min'}))
		.pipe($.sourcemaps.write('.', {
			sourceRoot: '../less'
		}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('less-dev-admin', function() {
	return gulp.src(lessAdminFiles)
		.pipe($.sourcemaps.init())
		.pipe($.concat('main.admin.less'))
		.pipe($.less())
		.pipe($.autoprefixer())
		.pipe($.rename({suffix: '.min'}))
		.pipe($.sourcemaps.write('.', {
			sourceRoot: '../less'
		}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('less-production-main', function() {
	return gulp.src(lessFiles)
		.pipe($.concat('main.less'))
		.pipe($.less())
		.pipe($.autoprefixer())
		.pipe($.cssmin())
		.pipe($.rename({suffix: '.min'}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('less-production-admin', function() {
	return gulp.src(lessAdminFiles)
		.pipe($.concat('main.admin.less'))
		.pipe($.less())
		.pipe($.autoprefixer())
		.pipe($.cssmin())
		.pipe($.rename({suffix: '.min'}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('js-dev-main', function() {
	return gulp.src(jsFiles)
		.pipe($.sourcemaps.init())
		.pipe($.uglify())
		.pipe($.concat('app.min.js'))
		.pipe(replace({
			patterns: [{
				json: {
					elastic: {
						url: 'http://192.168.2.1:9200',
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

gulp.task('js-dev-admin', function() {
	return gulp.src(jsAdminFiles)
		.pipe($.sourcemaps.init())
		.pipe($.uglify())
		.pipe($.concat('app.admin.min.js'))
		.pipe($.sourcemaps.write('.', {
			sourceRoot: '../js'
		}))
		.pipe(gulp.dest(buildDir));
});

gulp.task('js-production-main', function() {
	return gulp.src(jsFiles)
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

gulp.task('js-production-admin', function() {
	return gulp.src(jsAdminFiles)
		.pipe($.uglify())
		.pipe($.concat('app.admin.min.js'))
		.pipe(gulp.dest(buildDir));
});

gulp.task('less-dev', ['less-dev-main', 'less-dev-admin']);
gulp.task('less-production', ['less-production-main', 'less-production-admin']);

gulp.task('js-dev', ['js-dev-main', 'js-dev-admin']);
gulp.task('js-production', ['js-production-main', 'js-production-admin']);

gulp.task('dev', ['less-dev', 'js-dev']);

gulp.task('production', ['less-production', 'js-production']);

gulp.task('default', ['dev']);
