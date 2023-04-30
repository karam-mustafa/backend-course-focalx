importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyBfzAzPiBQV4cVaKIAfRbZS2hQ1fKRXmHw",
    authDomain: "focal-x-back.firebaseapp.com",
    projectId: "focal-x-back",
    storageBucket: "focal-x-back.appspot.com",
    messagingSenderId: "428458078456",
    appId: "1:428458078456:web:c256d38c8f78e1adee0b0d",
    measurementId: "G-HEGLXBRJYD"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
