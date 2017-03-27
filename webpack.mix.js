const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
	'resources/assets/js/app.js',
   'resources/assets/bootstrap/js/daterangepicker.js',
   'resources/assets/bootstrap/js/bootstrap-datepicker.js',
   'resources/assets/bootstrap/js/jquery.slimscroll.min.js',
   'resources/assets/bootstrap/js/fastclick.min.js',
   'resources/assets/bootstrap/js/app.js'
	], 'public/js/app.js')
   .styles([
   'resources/assets/bootstrap/css/bootstrap.min.css',
	'resources/assets/bootstrap/css/font-awesome.min.css',
	'resources/assets/bootstrap/css/ionicons.min.css',
	'resources/assets/bootstrap/css/AdminLTE.min.css',
	'resources/assets/bootstrap/css/_all-skins.min.css',
	'resources/assets/bootstrap/css/blue.css'
   ], 'public/css/app.css')
   .options({
      processCssUrls: false
   })
   .version();

 mix.copy('resources/assets/bootstrap/fonts', 'public/fonts');
