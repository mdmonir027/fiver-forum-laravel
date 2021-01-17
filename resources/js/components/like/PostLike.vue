<template>
    <div class="h5 text-muted d-block">
        <span class="mr-1" v-if="data.likes">{{ data.likes }}</span>
        <i v-if="!data.liked" class="far fa-heart mr-1"></i>
        <i v-else class="fas fa-heart"></i>
    </div>
</template>

<script>
    export default {
        name: "PostLike",
        props: ['data']
    }
</script>

<style scoped>

</style>
