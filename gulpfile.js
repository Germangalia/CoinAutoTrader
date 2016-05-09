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
        bowDir = 'bower_components/',
        jsDir = 'resources/assets/js/',
        cssDir = 'resources/assets/css/';

    mix.copy(npmDir + 'vue/dist/vue.min.js', jsDir);
    mix.copy(npmDir + 'vue-resource/dist/vue-resource.min.js', jsDir);
    mix.copy(bowDir + 'angularUtils-pagination/dirPagination.js', jsDir);

    // Compile scripts
    mix.scripts([
        'vue.min.js',
        'vue-resource.min.js',
        'accounts-vue.js',
        'home-vue.js',
        'history-angular.js',
        'dirPagination.js'
    ], 'public/js/vendor.js');

    // Compile styles
    mix.styles([
        'home-vue.css',
    ], 'public/css/app.css');
});
