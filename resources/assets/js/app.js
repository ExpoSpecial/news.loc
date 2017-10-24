import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Vuetify from 'vuetify';
Vue.use(Vuetify);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './components/Main.vue';
import Home from './components/home/Home.vue';

const routes = [{
    name: 'Home',
    path: '/',
    component: Home
}];
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, App)).$mount('#app');