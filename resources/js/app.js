require('./bootstrap');
import router from './router/router'
import Vue from "vue";
import store from "./store/store";
import filter from './helpers/Filters'
import User from "./helpers/User";

window.Vue = Vue;
window.User = User;

window.EventBus = new Vue();

Vue.component('app-home', require('./components/AppHome').default)

const app = new Vue({
    el: '#app',
    router,
    store
});
