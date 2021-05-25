const mix = require('laravel-mix');

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

// BrowserSync を利用することで、 JSやPHP更新時に、ブラウザが自動リロードする
mix.browserSync({
      proxy: '0.0.0.0:8081',
      open: false
    })
    .js('resources/js/app.js', 'public/js')
    .version(); // ブラウザがキャッシュを参照しないようにする（開発時には有効にすると便利）
