require('./bootstrap');

import Vue from "vue";

window.Vue = Vue;

Vue.component('app-home', require('./components/AppHome').default)

const app = new Vue({}).$mount('#app')
