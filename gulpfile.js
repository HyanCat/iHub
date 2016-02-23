var elixir = require('laravel-elixir');
require('laravel-elixir-livereload');

// autoprefixer's options.
elixir.config.css.autoprefix.options = {
	browsers: ['last 2 versions', '> 1%'],
	cascade : true
};

elixir(function (mix) {
	mix.less('app.less');

	mix.version('css/app.css');

	mix.livereload();
});