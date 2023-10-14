// Define el nombre de la caché estática
var staticCacheName = "pwa-v" + new Date().getTime();

// Importa el módulo de Workbox.
importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.1.5/workbox-sw.js');

// Usa las estrategias de Workbox para cachear los recursos.
const { precacheAndRoute } = workbox.precaching;
const { CacheFirst, NetworkFirst } = workbox.strategies;
const { registerRoute } = workbox.routing;

// Lista de archivos que se cachearán durante la instalación.
precacheAndRoute([
  '/resources/views/vendor/laravelpwa/offline.blade.php',
  '/css/bootstrap.min.css',
  '/css/bootstrap.min.js',
]);

// Cachea archivos de imagen con CacheFirst.
registerRoute(/\.(png|jpg|jpeg|gif)$/, new CacheFirst());

// Cachea datos JSON con NetworkFirst.
registerRoute(/\.json$/, new NetworkFirst());

// Cachea una ruta específica con una estrategia personalizada.
registerRoute("/api/data", async ({ event }) => {
  // ... (lógica de caché personalizada aquí)
});

// Clear cache on activate
self.addEventListener('activate', event => {
  const cacheWhitelist = [staticCacheName];
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

// Serve from Cache using Workbox strategies
self.addEventListener("fetch", event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        return response || fetch(event.request);
      })
      .catch(() => {
        return caches.match('/offline');
      })
  );
});
