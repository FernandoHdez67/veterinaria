// workbox-config.js

module.exports = {
    globDirectory: 'public/',
    globPatterns: [
      '**/*.{css,js,html,png,jpg,svg}',
    ],
    swDest: 'public/service-worker.js',
    runtimeCaching: [
      {
        urlPattern: /\.(?:png|jpg|jpeg|svg)$/,
        handler: 'CacheFirst',
      },
      {
        urlPattern: /\.(?:css|js)$/,
        handler: 'StaleWhileRevalidate',
      },
    ],
  };
  