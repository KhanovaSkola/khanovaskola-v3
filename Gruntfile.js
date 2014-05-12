module.exports = function(grunt) {

    var LESS_FILES = {
        "www/css/compiled.css": "www/less/style.less"
    };

    var JS_FILES = [
        'www/js/vendor/jquery.js',
        'www/js/vendor/elasticsearch.jquery.min.js',
        'www/js/vendor/medium-editor.js',
        'www/js/vendor/bootstrap/alert.js',
        'www/js/vendor/netteForm.js',
        'www/js/vendor/typeahead.bundle.min.js',
        'www/js/vendor/d3.v3.min.js',

        'www/js/app/app.js',
        'www/js/app/inactivity.js',
        'www/js/app/urlFixes.js',
        'www/js/app/exercise.js',
        'www/js/app/components/gist.js',
        'www/js/app/components/search.js',
        'www/js/app/components/columnChart.js'
    ];
    var JS_COMPILED = 'www/js/compiled.js';

    var WATCH_FILES = [
        'www/js/compiled.js',
        'www/css/compiled.css'
    ];

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        less: {
            dev: {
                files: LESS_FILES
            },

            dist: {
                options: {
                    cleancss: true
                },
                files: LESS_FILES
            }
        },

        concat: {
            dev: {
                options: {
                    stripBanners: true,
                    nonull: true
                },
                src: JS_FILES,
                dest: JS_COMPILED
            }
        },

        uglify: {
            dist: {
                options: {
                    compress: {
                        drop_console: true
                    }
                },
                files: {JS_COMPILED: JS_FILES}
            }
        },

        browserSync: {

            dev: {
                options: {
                    watchTask: true,
                    debugInfo: true,
                    proxy: 'vagrant.khanovaskola.cz',
                    ghostMode: {
                        clicks: true,
                        scroll: true,
                        links: false,
                        forms: true
                    }
                },
                bsFiles: {
                    src: WATCH_FILES
                }
            }

        },

        watch: {

            options: {
                spawn: false
            },

            styles: {
                files: 'www/less/**/*.less',
                tasks: 'less:dev'
            },

            js: {
                files: 'js/**/*.js',
                tasks: 'concat:dev'
            },

            livereload: {
                files: WATCH_FILES,
                options: {
                    livereload: true
                }
            }

        }

    });

    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('dist', ['less:dist', 'uglify:dist']);
    grunt.registerTask('default', ['less:dev', 'concat:dev', 'browserSync:dev', 'watch']);

};
