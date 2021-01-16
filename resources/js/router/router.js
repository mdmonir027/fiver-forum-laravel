import Vue from 'vue'
import VueRouter from "vue-router";
import Home from "../components/home/Home";

window.Vue = Vue;

Vue.use(VueRouter);

const routes = [
    {path: '/', component: Home},
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
