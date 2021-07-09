
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './routes';

const router = new VueRouter({
  routes, // short for `routes: routes`
  mode: 'history',
})

// Vue.component('example-component', require('./components/products.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('home-main', require('./components/public/PublicMaster.vue').default);


const app = new Vue({
     router,
    el: '#app', 
});
