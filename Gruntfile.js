module.exports = function(grunt) {

	// Project configuration.
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
                    'www/js/compiled.js': [
                        'www/js/vendor/jquery.js',
                        'www/js/vendor/elasticsearch.jquery.min.js',
                        'www/js/vendor/medium-editor.js',
                        'www/js/vendor/bootstrap/alert.js',
                        'www/js/vendor/netteForm.js',
                        'www/js/vendor/typeahead.bundle.js',

                        'www/js/app/app.js',
                        'www/js/app/autocomplete.js',
                        'www/js/app/inlineEditor.js'
                    ]
                }
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-less');

	grunt.registerTask('default', ['less', 'uglify']);

};
