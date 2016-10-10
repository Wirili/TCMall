const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

var del = require('del');
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

elixir.extend('delfile', function(message) {
    new elixir.Task('delfile', function() {
        del([
            'public/admin',
            'public/default',
            'public/mobile'
        ]);
    });
});

elixir(mix => {
mix.sass(
    'admin/admin.scss',
    'public/admin/css'
);
mix.sass(
    'default/default.scss',
    'public/default/css'
);
mix.sass(
    'mobile/default.scss',
    'public/mobile/css'
);
mix.version([
    'admin/css/admin.css',
    'default/css/default.css',
    'mobile/css/default.css'
]);
mix.delfile();
});