let mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')

mix.webpackconfig({
    plugins: [
        new BrowserSyncPlugin({
            files: [
                '**/*.css'
            ]
        }, {reload: false})
    ]
})

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .scripts('node_modules/bootstrap/dist/js/bootstrap.js',
            //'node_modules/jquery/dist/jquery.js', 
            'public/js/all.js')
   .copy('node_modules/sweetalert/dist', 'public/sweetalert');
