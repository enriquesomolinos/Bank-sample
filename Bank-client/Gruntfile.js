module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
       
        
        
        concat: {
            options: {
                separator: ';'
            },	            
            jspro: {
                src: [
                    
                    'app/models/*.js',
					'app/*.js',
                    'app/views/*.js',
					
                    
                    
                ],
                dest: 'dist/main.min.js'
            },
            css: {
                src: [
                    'assets/css/*.css',                    
                ],
                dest: 'tmp/style.css'
            },
            
            
            
            
        },
        
        
        uglify: {
            dist: {
                files: {
                    'dist/main.min.js': [ 'dist/main.min.js' ],
                },
                options: {
                    mangle: false,
                    beautify:false,
                    preserveComments:false
                }
            }
        },
        cssmin: {
          dist: {
            files: [{
              expand: true,
              cwd: 'tmp/',
              src: ['*.css', '!*.min.css'],
              dest: 'dist/assets/css',
              ext: '.min.css'
            }]
          }
        }
        ,
        copy: {
            dist: {
                files: [
                    {expand: false, src: ['bower_components/backbone/backbone.min.js'], dest: 'dist/lib/backbone.min.js', filter: 'isFile',flatten: true, },
					{expand: false, src: ['bower_components/jquery/jquery.min.js'], dest: 'dist/lib/jquery.min.js', filter: 'isFile',flatten: true, },                   
					{expand: false, src: ['bower_components/underscore/underscore.min.js'], dest: 'dist/lib/underscore.min.js', filter: 'isFile',flatten: true, },                   
                    {expand: false, src: ['indexdist.html'], dest: 'dist/index.html', filter: 'isFile',flatten: true, }, 
					{expand: false, src: ['tmp/styles.min.css'], dest: 'dist/assets/css/styles.css', filter: 'isFile',flatten: true, }, 
					
                    
                ]
            }
            
        },  
        devserver: {
            options: {
                port:8081,
				
            },
            server: {}
        },
        clean: {
            temp: {
                src: [ 'tmp/**/*.*' ]
            },
            dist: {
                src: [ 'dist/**/*.*' ]
            }
           
        },
        
            
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-devserver');

    grunt.registerTask('distPro',['clean:dist','concat:jspro','concat:css','cssmin:dist','uglify:dist','copy:dist','clean:temp']);
    

       
};