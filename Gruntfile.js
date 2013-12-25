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
				src: ['assets/js/snap.min.js', 'assets/js/vendor/custom.modernizr.min.js', 'assets/js/foundation.min.js'],
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
			static: {                          // Target
					options: {                       // Target options
					optimizationLevel: 3
				},
				files: {                         // Dictionary of files
					'dist/img.png': 'src/img.png', // 'destination': 'source'
					'dist/img.jpg': 'src/img.jpg',
					'dist/img.gif': 'src/img.gif'
				}
			},
			dynamic: {                         // Another target
				files: [{
					expand: true,                  // Enable dynamic expansion
					cwd: 'src/',                   // Src matches are relative to this path
					src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
					dest: 'dist/'                  // Destination path prefix
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

	grunt.registerTask('default', ['jshint','uglify','concat','compass']);
}