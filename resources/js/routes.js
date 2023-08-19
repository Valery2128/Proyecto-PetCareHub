const Home =()=> import('./components/Home.vue')
const Contacto =()=> import('./components/Contacto.vue')
//importar componentes de Mascotas
const Mostrar =()=> import('./components/Mascotas/Mostrar.vue')
const Crear =()=> import('./components/Mascotas/Crear.vue')
const Editar =()=> import('./components/Mascotas/Editar.vue')

import VueRouter from 'vue-router';
Vue.use(VueRouter);
export const router = [

{
    name:'home',
    path:'/',
    component:Home
},
{
    name:'contacto',
    path:'/contacto',
    component:Contacto
},
{
    name:'mostrarMascotas',
    path:'/mascotas',
    component:Mostrar
},
{
    name:'crearMascota',
    path:'/crear',
    component:Crear
},
{
    name:'editarMascota',
    path:'/editar/:id',
    component:Editar
},

]
var vm = new Vue({
    el: '#app',
    router,
    render: h => h.App
    
            })
