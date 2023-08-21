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

const Home =()=> import('./components/Home.vue')
const Contacto =()=> import('./components/Contacto.vue')
//importar componentes de Mascotas
const Mostrar =()=> import('./components/Mascotas/Mostrar.vue')
const Crear =()=> import('./components/Mascotas/Crear.vue')
const Editar =()=> import('./components/Mascotas/Editar.vue')

Vue.use(Vuetify);

Vue.use(VueRouter);

// const router = new VueRouter({
//   mode: 'history',
//   routes: routes
// });


// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('app-component', require('./components/App.vue').default);
Vue.component('mascota-component', require('./components/Mascota/Mostrar.vue').default);
// Vue.component('mascota-crear', require('./components/Mascota/Crear.vue').default);




export const routes = [
    {
        path:'/',
        component: Home
    },
    {
        path:'/contacto',
        component: Contacto
    },
    {
        path:'/mascotas',
        component: Mostrar
    },
    {
        path:'/crear',
        component: Crear
    },
    {
        path:'/editar/:id',
        component: Editar
    },
    ]


    const router = createRouter({
        history: createWebHistory(),
        routes
    })

createApp({})
.use(router)
.mount('#app')

// const app = new Vue({
//     el: '#app',

//     vuetify: new Vuetify({
//          iconfont: 'mdi', // default - only for display purposes,
//          theme: {
//             themes: {
//                 link: '#29c1cc',
//                     primary: '#0054a5',
//                     secondary: '#6606D2',
//                     accent: '#82B1FF',
//                     error: '#FF5252',
//                     info: '#2196F3',
//                     success: '#4CAF50',
//                     warning: '#FFC107',
//             }
//          }
//     })
// });
