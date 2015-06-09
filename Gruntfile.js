module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    copy: {
      main: {
        files: [
          {
            expand: true, 
            src: [
              '**/*', 
              '!_DOCS/**', 
              '!.sass-cache/**', 
              '!_DIST/**',
              '!sass/**',
              '!node_modules/**', 
              '!Gruntfile.js', 
              '!config.rb', 
              '!package.json', 
            ], 
            dest: '_DIST/<%= pkg.name %>', 
            filter: 'isFile'
          }
        ],
      },
    },

    uglify: {
      options: {
        banner: '/*!<%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        files: [
          {
            expand: true,
            src: ['_DIST/<%= pkg.name %>/**/*.js', '!_DIST/<%= pkg.name %>/**/*.min.js'],
          }
        ],
      }
    },

    cssmin: {
      options: {
        banner: '/*!<%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      main: {
        files: [
          {
            expand: true,
            src: [
              '_DIST/<%= pkg.name %>/**/*.css', 
              '!_DIST/<%= pkg.name %>/style.css',
              '!_DIST/<%= pkg.name %>/**/*.min.css'
            ],
          }

        ],
      },
    },

    makepot: {
      target: {
        options: {
          domainPath: '/languages/',    // Where to save the POT file.
          potFilename: '<%= pkg.name %>.pot',   // Name of the POT file.
          type: 'wp-theme'  // Type of project (wp-plugin or wp-theme).
        }
      }
    },


   

  }); //grunt.initConfig end

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks( 'grunt-wp-i18n' );

  // Default tasks.
  grunt.registerTask('default', ['makepot', 'copy', 'cssmin', 'uglify']);
};