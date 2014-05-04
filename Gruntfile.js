var libs = [
    'jquery.js',
    'elasticsearch.jquery.min.js',
    'medium-editor.js',
    'bootstrap/alert.js',
    'netteForm.js',
    'typeahead.bundle.js'
];
var app = [
    'app.js',
    'autocomplete.js',
    'inlineEditor.js',
    'urlFixes.js'
];

// map to root directory
{
    libs = libs.map(function(lib) {
        return 'www/js/vendor/' + lib;
    });
    app = app.map(function(app) {
        return 'www/js/app/' + app;
    });
}

module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		less: {
			production: {
				options: {
					paths: ["www/less"],
					cleancss: true
				},
				files: {
					"www/css/compiled.css": "www/less/style.less"
				}
			}
		},
		uglify: {
			production: {
				preserveComments: false,
				files: {
					'www/js/compiled.js': libs.concat(app)
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-less');

	grunt.registerTask('default', ['less', 'uglify']);

};
