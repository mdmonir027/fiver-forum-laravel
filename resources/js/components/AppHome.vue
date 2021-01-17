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

<style scoped>
    .content {
        background: #f7f7f7;
    }
</style>
