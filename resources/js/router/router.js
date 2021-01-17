import Vue from 'vue'
import VueRouter from "vue-router";
import Home from "../components/home/Home";
import Post from "../components/post/Post";
import Login from "../components/auth/Login";
import Logout from "../components/auth/Logout";

window.Vue = Vue;

Vue.use(VueRouter);

const routes = [
    {path: '/', component: Home},
    {path: '/login', component: Login},
    {path: '/logout', component: Logout},
    {path: '/post/:slug', component: Post},
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
