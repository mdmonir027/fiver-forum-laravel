<template>
    <div class="app">
        <app-header></app-header>
        <div class="content">
            <router-view></router-view>
        </div>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import AppHeader from "./AppHeader";
    import AppFooter from "./AppFooter";

    export default {
        name: "AppHome",
        components: {AppFooter, AppHeader}
    }
</script>

<style scoped>
    .content {
        background: #f7f7f7;
    }
</style>
