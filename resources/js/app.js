
require('./bootstrap');

window.Vue = require('vue');

import Vuetify from '../plugins/vuetify'
import App from './App.vue'
import router from './router/index';
import Toasted from 'vue-toasted';
import SweetAlert from 'vue-sweetalert2';
import VueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(Vuetify)
Vue.use(VueRouter)
Vue.use(Toasted)
Vue.use(SweetAlert)

Vue.component('navbar-app', require('./components/Navbar.vue').default);

const app = new Vue({
    vuetify: Vuetify,
    router: new VueRouter(router),
    el: '#app',
    render: h => h(App),
});
