<template>
    <div class="app">
        <app-header v-if="loggedIn"></app-header>
        <div class="content">
            <router-view></router-view>
        </div>
        <app-footer v-if="loggedIn"></app-footer>
    </div>
</template>

<script>
    import AppHeader from "./AppHeader";
    import AppFooter from "./AppFooter";

    export default {
        name: "AppHome",
        components: {AppFooter, AppHeader},
        data: () => {
            return {
                loggedIn: User.loggedIn()
            }
        },
        mounted() {
            User.redirect(this.$route.path)
        }
    }
</script>

<style>
    .content {
        background: #f7f7f7;
    }

    .likeIcons i {
        color: #ff00a56e;
        transition: all .4s;
    }

    .likeIcons i:hover {
        color: #ff00a5bf;
        cursor: pointer;
    }
</style>
