// Importa el módulo de Workbox.
importScripts(
    "https://storage.googleapis.com/workbox-cdn/releases/6.1.5/workbox-sw.js"
);

// Asigna las estrategias de caché a rutas específicas.
const { registerRoute } = workbox.routing;
const { CacheFirst, NetworkFirst } = workbox.strategies;

// Cachea archivos de imagen con CacheFirst.
registerRoute(/\.(png|jpg|jpeg|gif)$/, new CacheFirst());

// Cachea datos JSON con NetworkFirst.
registerRoute(/\.json$/, new NetworkFirst());

// Cachea una ruta específica con una estrategia personalizada.
registerRoute("/api/data", async ({ event }) => {
    try {
        const cache = await caches.open("custom-cache");
        const response = await fetch(event.request);
        cache.put(event.request, response.clone());
        return response;
    } catch (error) {
        const cachedResponse = await caches.match(event.request);
        if (cachedResponse) {
            return cachedResponse;
        }
        throw error;
    }
});
