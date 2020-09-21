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

importScripts('https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.21.0/firebase-messaging.js');

var config = {
  apiKey: "AIzaSyBXPLEpZkP6lH8gPpBWYa2Z835ZHiUZS8w",
  authDomain: "iolosmart.firebaseapp.com",
  databaseURL: "https://iolosmart.firebaseio.com",
  projectId: "iolosmart",
  storageBucket: "iolosmart.appspot.com",
  messagingSenderId: "952156759200",
  appId: "1:952156759200:web:34521ba5714245f59895c5",
};

firebase.initializeApp(config);

const messaging = firebase.messaging();
