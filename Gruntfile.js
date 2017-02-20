// fichier qui initialise Grunt et décrit les taches
module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

      // CONCAT NON UTILISE POUR L'INSTANT
      // Concaténation des fichiers = créé un seul fichier à partir de plusieurs fichiers
      concat: {
        options: {
          separator: ';',
        },
        dist: {
          src: ['js/jquery.js', 'js/plugins.js','js/main.js'],
          dest: 'js/app.js'
        }
      },

      // SASS NON UTILISE POUR L'INSTANT
      // SASS = compile les fichiers SASS/SCSS présent dans scss/ et créé le fichier style.css
      sass: {
        dist: {
          options: {
             style: 'expanded'
          },
          files: {
            'assets/css/style.css' : 'assets/css/style.scss',
          }
        }
      },

      // fait 2 choses : regarde dans les répertoires css/ js/ et la racine, si les fichiers sont modifiés
      // s'ils sont modifié, relance les
      // relance également le navigateur
      watch: {
        options: {
          livereload: true, // Activons le livereload du navigateur
        },
        src: {
          files: ['assets/js/*.js', 'assets/css/*.css', '*.html'], // Les fichiers à observer…
          tasks: [], // … la tache à effectué NON UTILISE POUR l'INSTANT
        },
        css: {
          files: 'assets/css/*.scss',
          tasks: ['sass'],
          options: {
            livereload: true,
          },
        },
      },

      // lancement d'un serveur simple sur son ordinateur. Les pages sont maintenant accessibles sur localhost:3000
      express:{
        all:{
            options:{
                port:3000,
                hostname:'localhost',
                bases:['./'],
                livereload:true,
            }
        }
      }

    });

    // Charge les différents plugins/contribution Grunt utilisée
    grunt.loadNpmTasks('grunt-contrib-concat'); // pour concacténer les fichiers
    grunt.loadNpmTasks('grunt-contrib-sass'); // pour compiler avec sass
    grunt.loadNpmTasks('grunt-contrib-watch'); // pour surveiller les modifications sur des fichiers
    grunt.loadNpmTasks('grunt-express'); // mini serveur pour voir nos pages

    // quand on lance la commande "grunt server" : lance le serveur express et lance watch
    grunt.registerTask('server', ['express:all','watch']);

};
