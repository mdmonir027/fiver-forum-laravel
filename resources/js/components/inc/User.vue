<template>
    <div class="user rounded-circle">
        <img src="/image/mdmonir027.jpg" class="rounded-circle" alt="">
    </div>
</template>

<script>
    export default {
        name: "User"
    }
</script>

<style scoped>
    .user {
        width: 95px;
        height: 55px;
        border: 1px solid #00B22D;
        margin-right: 20px;
        box-sizing: border-box;
        padding: 1px;
        overflow: hidden;
    }

    .user img {
        height: 100%;
        width: 100%;
    }
</style>
