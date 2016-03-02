var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.sass('app.scss');
//tarefas
    mix.styles([
	'bootstrap.min.css',
	'font-awesome.min.css',
	'prettyPhoto.css',
	'animate.css',
	'main.css',
	'responsive.css'
    ], 'public/css/all.css');

//tarefas js
    mix.scripts([
	'jquery.min.js',
//    'jquery-1.9.1.min.js',
	'bootstrap.min.js',
	'jquery.scrollUp.min.js',
	'price-range.js',
	'jquery.prettyPhoto.js',
	'main.js'
	], 'public/js/all.js');

//versão
	mix.version([
		'css/all.css',
		'js/all.js'
	]);
//copia de diretorios com arquivos
	mix.copy('resources/assets/fonts', 'public/build/fonts');
	mix.copy('resources/assets/images', 'public/build/images');
});
