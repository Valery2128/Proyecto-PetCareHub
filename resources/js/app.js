/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueRouter from 'vue-router';
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
import 'vuetify/dist/vuetify.min.css'; // Importa los estilos de Vuetify
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

const options = {
    position: "top-right",
    timeout: 5000,
    closeOnClick: true,
    pauseOnFocusLoss: true,
    pauseOnHover: true,
    draggable: true,
    draggablePercent: 0.6,
    showCloseButtonOnHover: false,
    hideProgressBar: true,
    closeButton: "button",
    icon: true,
    rtl: false
};


Vue.use(Toast, options);
Vue.use(Vuetify);
Vue.use(VueRouter);


Vue.component('app-component', require('./components/App.vue').default);
Vue.component('mascota-component', require('./components/Mascota/Mostrar.vue').default);
Vue.component('home-component', require('./components/Home.vue').default);





const app = new Vue({
    el: '#app',

    vuetify: new Vuetify({
         iconfont: 'mdi', // default - only for display purposes,
         theme: {
            themes: {
                link: '#29c1cc',
                    primary: '#0054a5',
                    secondary: '#6606D2',
                    accent: '#82B1FF',
                    error: '#FF5252',
                    info: '#2196F3',
                    success: '#4CAF50',
                    warning: '#FFC107',
            }
         }
    })
});
