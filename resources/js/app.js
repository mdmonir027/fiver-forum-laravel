require('./bootstrap');
import router from './router/router'
import Vue from "vue";

window.Vue = Vue;

Vue.component('app-home', require('./components/AppHome').default)

const app = new Vue({
    el: '#app',
    router
});
