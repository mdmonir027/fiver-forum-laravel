import Vue from 'vue'
import VueRouter from "vue-router";
import Home from "../components/home/Home";
import Post from "../components/post/Post";
import Login from "../components/auth/Login";
import Logout from "../components/auth/Logout";
import AddPost from "../components/post/AddPost";
import Register from "../components/auth/Register";
import ForgotPassword from "../components/auth/ForgotPassword";

window.Vue = Vue;

Vue.use(VueRouter);

const routes = [
    {path: '/', component: Home},
    {path: '/login', component: Login},
    {path: '/register', component: Register},
    {path: '/forgot-password', component: ForgotPassword},
    {path: '/logout', component: Logout},
    {path: '/add-new-post', component: AddPost},
    {path: '/post/:slug', component: Post},
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
