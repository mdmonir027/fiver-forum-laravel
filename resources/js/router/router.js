import Vue from 'vue'
import VueRouter from "vue-router";
import Home from "../components/home/Home";
import Post from "../components/post/Post";

window.Vue = Vue;

Vue.use(VueRouter);

const routes = [
    {path: '/', component: Home},
    {path: '/post/:slug', component: Post},
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
