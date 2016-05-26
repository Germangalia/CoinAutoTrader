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
        'Chart.min.js',
        'color.min.js'
    ], 'public/js/vendor.js');

    // Compile scripts
    mix.scripts([
        'home-vue.js'
    ], 'public/js/home-vue.js');

    // Compile scripts
    mix.scripts([
        'accounts-vue.js'
    ], 'public/js/accounts-vue.js');

    // Compile scripts
    mix.scripts([
        'history-angular.js'
    ], 'public/js/history-angular.js');

    // Compile scripts
    mix.scripts([
        'vue.min.js',
        'vue-resource.min.js'
    ], 'public/js/vue.js');

    // Compile scripts
    mix.scripts([
        'Chart.min.js',
        'color.min.js'
    ], 'public/js/Chart.min.js');

    // Compile scripts
    mix.scripts([
        'statistics-react.js'
    ], 'public/js/statistics-react.js');

    // Compile scripts
    mix.scripts([
        'statistics-javascript.js'
    ], 'public/js/statistics-javascript.js');

    // Compile scripts
    mix.scripts([
        'statistics-vue.js'
    ], 'public/js/statistics-vue.js');

    // Compile styles
    mix.styles([
        'home-vue.css'
    ], 'public/css/app.css');

    // Compile styles
    mix.styles([
        'statistics-vue.css'
    ], 'public/css/statistics-vue.css');

    // Compile styles
    mix.styles([
        'style-table-responsive.css'
    ], 'public/css/style-table-responsive.css');


    // Compile scripts
    mix.scripts([
        'graphic-functions.js',
        'statistics-benefit-evolution.js'
    ], 'public/js/statistics-benefit-evolution.js');

    // Compile scripts
    mix.scripts([
        'graphic-functions.js',
        'statistics-capital-evolution.js'
    ], 'public/js/statistics-capital-evolution.js');

    // Compile scripts
    mix.scripts([
        'graphic-functions.js',
        'statistics-bitcoins-evolution.js'
    ], 'public/js/statistics-bitcoins-evolution.js');

    // Compile scripts
    mix.scripts([
        'graphic-functions.js',
        'statistics-total-evolution.js'
    ], 'public/js/statistics-total-evolution.js');

    // Compile scripts
    mix.scripts([
        'event-bitcoin-price.js'
    ], 'public/js/event-bitcoin-price.js');

});
