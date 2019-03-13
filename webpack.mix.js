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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .copyDirectory('resources/layouts', 'public/layouts');

// mix.copy('resources/layouts/system_admin/css/bootstrap.min.css', 'public/layouts/system_admin/css/bootstrap.min.css')
//    .copy('resources/layouts/system_admin/css/font-awesome.min.css', 'public/layouts/system_admin/css/font-awesome.min.css')
//    .copy('resources/layouts/system_admin/css/themify-icons.css', 'public/layouts/system_admin/css/themify-icons.css')
//    .copy('resources/layouts/system_admin/css/metisMenu.css', 'public/layouts/system_admin/css/metisMenu.css')
//    .copy('resources/layouts/system_admin/css/owl.carousel.min.css', 'public/layouts/system_admin/css/owl.carousel.min.css')
//    .copy('resources/layouts/system_admin/css/slicknav.min.css', 'public/layouts/system_admin/css/slicknav.min.css')
//    .copy('resources/layouts/system_admin/css/export.css', 'public/layouts/system_admin/css/export.css')
//    .copy('resources/layouts/system_admin/css/jquery.dataTables.css', 'public/layouts/system_admin/css/jquery.dataTables.css')
//    .copy('resources/layouts/system_admin/css/dataTables.bootstrap4.min.css', 'public/layouts/system_admin/css/dataTables.bootstrap4.min.css')
//    .copy('resources/layouts/system_admin/css/responsive.bootstrap.min.css', 'public/layouts/system_admin/css/responsive.bootstrap.min.css')
//    .copy('resources/layouts/system_admin/css/responsive.jqueryui.min.css', 'public/layouts/system_admin/css/responsive.jqueryui.min.css')
//    .copy('resources/layouts/system_admin/css/typography.css', 'public/layouts/system_admin/css/typography.css')
//    .copy('resources/layouts/system_admin/css/default-css.css', 'public/layouts/system_admin/css/default-css.css')
//    .copy('resources/layouts/system_admin/css/styles.css', 'public/layouts/system_admin/css/styles.css')
//    .copy('resources/layouts/system_admin/css/responsive.css', 'public/layouts/system_admin/css/responsive.css');
