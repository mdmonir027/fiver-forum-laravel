<template>
    <div></div>
</template>

<script>
    export default {
        name: "Logout",
        mounted() {
            EventBus.$emit('logout');
        }
    }
</script>

<style scoped>

</style>
