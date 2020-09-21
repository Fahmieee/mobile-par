// const staticCacheName = 'site-static-v2';
// const dynamicCacheName = 'site-dynamic-v1';
// const assets = [
//   '/home',
//   '/login',
//   '/offline',
//   '/assets/content/img/theme/offline.png',
// ];
// install event
self.addEventListener('install', evt => {
  //console.log('service worker installed');
  // evt.waitUntil(
  //   caches.open(staticCacheName).then((cache) => {
  //     console.log('caching shell assets');
  //     cache.addAll(assets);
  //   })
  // );
});

// activate event
self.addEventListener('activate', evt => {
  //console.log('service worker activated');
  // evt.waitUntil(
  //   caches.keys().then(keys => {
  //     //console.log(keys);
  //     return Promise.all(keys
  //       .filter(key => key !== staticCacheName && key !== dynamicCacheName)
  //       .map(key => caches.delete(key))
  //     );
  //   })
  // );
});

// fetch event
self.addEventListener('fetch', evt => {
  //console.log('fetch event', evt);
  // evt.respondWith(
  //   caches.match(evt.request).then(cacheRes => {
  //     return cacheRes || fetch(evt.request).then(fetchRes => {
  //       return caches.open(dynamicCacheName).then(cache => {
  //         cache.put(evt.request.url, fetchRes.clone());
  //         return fetchRes;
  //       })
  //     });
  //   }).catch(() => caches.match('/offline'))
  // );
});

importScripts('https://www.gstatic.com/firebasejs/6.4.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/6.4.1/firebase-messaging.js');

var config = {
    apiKey: "AIzaSyDwUF0pAA74V1SmzHqFaO94UopKRPp13K8",
    authDomain: "pars-new.firebaseapp.com",
    databaseURL: "https://pars-new.firebaseio.com",
    projectId: "pars-new",
    storageBucket: "pars-new.appspot.com",
    messagingSenderId: "349020208042",
    appId: "1:349020208042:web:1ae6f1e0ea1cd2453e09d3",
    measurementId: "G-J4N15TQGJS"
  };

firebase.initializeApp(config);

const messaging = firebase.messaging();
