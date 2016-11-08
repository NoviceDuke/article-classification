const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */
 require('./semantic-ui/gulpfile.js');
/*
// 引入Semantic UI
// gulp watch => 監控檔案修改
// gulp build => 重整JS CSS 檔案
*/


elixir((mix) => {
   mix.styles('/../../../semantic-ui/dist/semantic.min.css','public/css/semantic.min.css');
   mix.webpack('/../../../semantic-ui/dist/semantic.min.js','public/css/semantic.min.js');
    mix.sass('app.scss')
       .webpack('app.js');
});
