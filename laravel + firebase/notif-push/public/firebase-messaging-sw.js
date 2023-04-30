importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyBXV8zHEYzTxDaXgQbstIPnGfoispvpslA",
    authDomain: "focalx-7236f.firebaseapp.com",
    projectId: "focalx-7236f",
    storageBucket: "focalx-7236f.appspot.com",
    messagingSenderId: "287856008118",
    appId: "1:287856008118:web:874031e011d0f6529bff17",
    measurementId: "G-9EN8885ZNL"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
