'use strict';
module.exports = function(grunt) {

	// load all tasks
	require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

    grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			files: ['scss/*.scss'],
			tasks: 'sass',
			options: {
				livereload: true,
			},
		},
		sass: {
			default: {
		  		options : {
			  		style : 'expanded'
			  	},
			  	files: {
					'style.css':'scss/style.scss',
				}
			}
		},
	    autoprefixer: {
            options: {
				browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1', 'ie 9']
			},
			single_file: {
				src: 'style.css',
				dest: 'style.css'
			}
		},
		csscomb: {
			options: {
                config: '.csscomb.json'
            },
            files: {
                'style.css': ['style.css'],
            }
		},
		concat: {
		    build: {
		        src: [
		            'js/skip-link-focus-fix.js',
		            'js/jquery.fastclick.js',
		            'js/jquery.fittext.js',
		            'js/jquery-placeholder.js',
		            'js/theme.js'
		        ],
		        dest: 'js/zelda.min.js',
		    }
		},
		uglify: {
		    build: {
		        src: 'js/zelda.min.js',
		        dest: 'js/zelda.min.js'
		    }
		},
	    // https://www.npmjs.org/package/grunt-wp-i18n
	    makepot: {
	        target: {
	            options: {
	                domainPath: '/languages/',
	                potFilename: 'zelda.pot',
	                potHeaders: {
	                poedit: true, // Includes common Poedit headers.
                    'x-poedit-keywordslist': true // Include a list of all possible gettext functions.
                },
		        type: 'wp-theme',
		        updateTimestamp: false,
		        processPot: function( pot, options ) {
					pot.headers['report-msgid-bugs-to'] = 'https://devpress.com/';
		        	pot.headers['language'] = 'en_US';
		        	return pot;
					}
				}
			}
		},
		exec: {
			txpull: { // Pull Transifex translation - grunt exec:txpull
				cmd: 'tx pull -a --minimum-perc=90' // Percentage translated
			},
			txpush_s: { // Push pot to Transifex - grunt exec:txpush_s
				cmd: 'tx push -s'
			},
		},
		dirs: {
			lang: 'languages',
		},
		potomo: {
			dist: {
				options: {
					poDel: false // Set to true if you want to erase the .po
				},
				files: [{
					expand: true,
					cwd: '<%= dirs.lang %>',
					src: ['*.po'],
					dest: '<%= dirs.lang %>',
					ext: '.mo',
					nonull: true
				}]
			}
		},
		cssjanus: {
			theme: {
				options: {
					swapLtrRtlInUrl: false
				},
				files: [
					{
						src: 'style.css',
						dest: 'style-rtl.css'
					}
				]
			}
		},
	    replace: {
			styleVersion: {
				src: [
					'scss/style.scss',
				],
				overwrite: true,
				replacements: [{
					from: /Version:.*$/m,
					to: 'Version: <%= pkg.version %>'
				}]
			},
			functionsVersion: {
				src: [
					'functions.php'
				],
				overwrite: true,
				replacements: [ {
					from: /^define\( 'ZELDA_VERSION'.*$/m,
					to: 'define( \'ZELDA_VERSION\', \'<%= pkg.version %>\' );'
				} ]
			},
		}
	});

	grunt.registerTask( 'default', [
		'sass',
		'autoprefixer',
    ]);

    grunt.registerTask( 'release', [
    	'replace',
    	'sass',
    	'autoprefixer',
    	'csscomb',
    	'concat:build',
		'uglify:build',
		'makepot',
		'cssjanus'
	]);

	// Makepot and push it on Transifex task(s).
    grunt.registerTask( 'txpush', [
    	'makepot',
    	'exec:txpush_s'
    ]);

    // Pull from Transifex and create .mo task(s).
    grunt.registerTask( 'txpull', [
    	'exec:txpull',
    	'potomo'
    ]);

};
