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
                        'www/js/jquery.js',
                        'www/js/elasticsearch.jquery.min.js',
                        'www/js/medium-editor.js',
                        //'www/js/bootstrap/foo.js',
                        'www/js/netteForm.js',
                        'www/js/typeahead.bundle.js',

                        'www/js/app.js',
                        'www/js/autocomplete.js',
                        'www/js/inlineEditor.js'
                    ]
                }
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-less');

	grunt.registerTask('default', ['less', 'uglify']);

};
