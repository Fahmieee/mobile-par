// if('serviceWorker' in navigator){
//   navigator.serviceWorker.register('/sw.js')
//     .then(reg => console.log('service worker registered', reg))
//     .catch(err => console.log('service worker not registered', err));
// }

if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/sw.js').then(function(reg) {
    console.log('Service Worker Registered!', reg);

    reg.pushManager.getSubscription().then(function(sub) {
      if (sub === null) {
        // Update UI to ask user to register for Push
        console.log('Not subscribed to push service!');
      } else {
        // We have a subscription, update the database
        console.log('Subscription object: ', sub);
      }
    });
  })
   .catch(function(err) {
    console.log('Service Worker registration failed: ', err);
  });
}

Notification.requestPermission(function(status) {
    console.log('Notification permission status:', status);
});
