const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');


mix.copy('workbox-config.js', 'public/workbox-config.js');


mix.webpackConfig({
  output: {
    // Agrega el código del servicio worker al archivo `index.html`.
    filename: 'index.html',
    chunkFilename: 'js/[name].js',
  },
});

// Importa el servicio worker.
const path = require('path');
const workbox = require('workbox-webpack-plugin');

mix.plugins.append('workbox', new workbox.webpackPlugin.GenerateSW({
  // Importa la configuración de Workbox.
  swSrc: path.join(__dirname, 'workbox-config.js'),
}));