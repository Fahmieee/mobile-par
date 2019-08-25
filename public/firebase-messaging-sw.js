// install event
self.addEventListener('install', evt => {
  console.log('service worker installed');
});

// activate event
self.addEventListener('activate', evt => {
  console.log('service worker activated');
});

// fetch event
self.addEventListener('fetch', evt => {
  // console.log('fetch event', evt);
});

importScripts('https://www.gstatic.com/firebasejs/6.4.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/6.4.1/firebase-messaging.js');

var config = {
      apiKey: "AIzaSyAQn23VgrD6AM_0STEPFiDFniBBeIRQNTk",
      authDomain: "pars-e903c.firebaseapp.com",
      databaseURL: "https://pars-e903c.firebaseio.com",
      projectId: "pars-e903c",
      storageBucket: "",
      messagingSenderId: "1061259679604",
      appId: "1:1061259679604:web:d967b8997b29cf2d"
  };

firebase.initializeApp(config);

const messaging = firebase.messaging();

// self.addEventListener('notificationclose', function(e) {
//   var notification = e.notification;
//   var primaryKey = notification.data.primaryKey;

//   console.log('Closed notification: ' + primaryKey);
// });

// self.addEventListener('notificationclick', function(e) {
//   var notification = e.notification;
//   var primaryKey = notification.data.primaryKey;
//   var action = e.action;

//   if (action === 'close') {
//     notification.close();
//   } else {
//     clients.openWindow('http://www.example.com');
//     notification.close();
//   }
// });

// self.addEventListener('push', function(e) {
//   var options = {
//     body: 'This notification was generated from a push!',
//     icon: '/assets/icons/96x96.png',
//     vibrate: [100, 50, 100],
//     data: {
//       dateOfArrival: Date.now(),
//       primaryKey: '2'
//     },
//     actions: [
//       {action: 'explore', title: 'Explore this new world',
//         icon: 'images/checkmark.png'},
//       {action: 'close', title: 'Close',
//         icon: 'images/xmark.png'},
//     ]
//   };
//   e.waitUntil(
//     self.registration.showNotification('Hello world!', options)
//   );
// });