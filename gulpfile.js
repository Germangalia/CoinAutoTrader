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

    //Vue.js
    mix.copy(npmDir + 'vue/dist/vue.min.js', jsDir);
    mix.copy(npmDir + 'vue-resource/dist/vue-resource.min.js', jsDir);
    //Pagination.js
    mix.copy(bowDir + 'angularUtils-pagination/dirPagination.js', jsDir);
    //Chart.js
    mix.copy(npmDir + 'chart.js/dist/Chart.min.js', jsDir);
    mix.copy(npmDir + 'chartjs-color/dist/color.min.js', jsDir);
    mix.copy(npmDir + 'chartjs-color-string/color-string.js', jsDir);


    // Compile scripts
    mix.scripts([
        'vue.min.js',
        'vue-resource.min.js',
        'accounts-vue.js',
        'home-vue.js',
        'history-angular.js',
        'dirPagination.js',
        'Chart.min.js',
        'color.min.js',
        'color-string.js'
    ], 'public/js/vendor.js');

    // Compile styles
    mix.styles([
        'home-vue.css',
    ], 'public/css/app.css');
});
