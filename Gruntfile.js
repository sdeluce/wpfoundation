module.exports = function(grunt) {

	require('load-grunt-tasks')(grunt);
	
	grunt.initConfig({

		jshint: {
			all: ['assets/js/script.js']
		},

		uglify: {
			dist: {
				files: {
					'assets/js/script.min.js': ['assets/js/script.js'],
					'assets/js/foundation.min.js': ['assets/js/foundation/foundation.js','assets/js/foundation/foundation.topbar.js','assets/js/foundation/foundation.offcanvas.js']
				}
			}
		},

		concat: {
			options: {
				separator: ';'
			},
			dist: {
				src: ['assets/js/script.min.js', 'assets/js/vendor/custom.modernizr.min.js', 'assets/js/foundation.min.js'],
				dest: 'js/script.min.js'
			}
		},

		compass: {
			dist: {
				options: {
					config: 'config.rb'
				}
			}
		},

		imagemin: {                          // Task
			dynamic: {                         // Another target
				files: [{
					expand: true,                  // Enable dynamic expansion
					cwd: 'img/raw/',                   // Src matches are relative to this path
					src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
					dest: 'img/'                  // Destination path prefix
				}]
			}
		},
		svgmin: {
			dist: {                        // Target
				files: [{                // Dictionary of files
					expand: true,        // Enable dynamic expansion.
					cwd: 'img/svg',        // Src matches are relative to this path.
					src: ['**/*.svg'],    // Actual pattern(s) to match.
					dest: 'img/',        // Destination path prefix.
					ext: '.svg'        // Dest filepaths will have this extension.
					// ie: optimise img/src/branding/logo.svg and store it in img/branding/logo.min.svg
				}]
			}
		},

		watch: {
			js: {
				files: ['assets/js/*.js','!assets/js/*.min.js'],
				tasks: ['jshint','uglify','concat'],
				options: {
					spawn: false,
					livereload: true
				}
			},
			scss: {
				files: ['assets/scss/*.scss','assets/scss/**/*.scss'],
				tasks: ['compass'],
				options: {
					spawn: false,
					livereload: true
				}
			},
		}

	});

	grunt.registerTask('default', ['jshint','uglify','concat','compass','imagemin','svgmin']);
}