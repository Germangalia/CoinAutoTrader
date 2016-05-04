var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');
    mix.less('admin-lte/AdminLTE.less');
    mix.less('bootstrap/bootstrap.less');

    var npmDir = 'node_modules/',
        jsDir = 'resources/assets/js/';

    mix.copy(npmDir + 'vue/dist/vue.min.js', jsDir);
    mix.copy(npmDir + 'vue-resource/dist/vue-resource.min.js', jsDir);

    mix.scripts([
        'vue.min.js',
        'vue-resource.min.js',
        'accounts-vue.js'
    ], 'public/js/vendor.js');
});
