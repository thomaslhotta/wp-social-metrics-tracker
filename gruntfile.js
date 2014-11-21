module.exports = function(grunt) {

	// 1. All configuration goes here
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
		    dist: {
		        options: {
		            style: 'compressed'
		        },
		        files: {
		            'src/css/social-metrics-tracker.min.css': 'src/css/social-metrics-tracker.scss'
		        }
		    }
		},

		uglify: {
		    build: {
		        src:  'src/js/social-metrics-tracker.js',
		        dest: 'src/js/social-metrics-tracker.min.js'
		    }
		},

		phpunit: {
		    classes: {
		        dir: ''
		    },
		    options: {
		        bin: 'phpunit --exclude-group external-http',
		        bootstrap: 'tests/bootstrap.php',
		        colors: true
		    }
		},

		// Watch tasks
		watch: {
			options: {
			    livereload: true,
			},
		    scripts: {
		        files: ['src/js/social-metrics-tracker.js'],
		        tasks: ['uglify'],
		        options: {
		            spawn: false,
		        },
		    },
		    css: {
		        files: ['src/css/*.scss'],
		        tasks: ['sass'],
		        options: {
		            spawn: false,
		        }
		    },
		    php: {
		    	files: ['src/**/*.php'],
		    	tasks: ['phpunit'],
		    	options : {
		    		spawn: false,
		    	}
		    }
		}

	});

	// 3. Where we tell Grunt we plan to use this plug-in.
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-phpunit');

	// 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
	grunt.registerTask('default', ['sass', 'uglify', 'phpunit']);

};