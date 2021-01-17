<template>
    <span>
        <span class="mr-1">{{ likes }}</span>
        <i v-if="!liked" class="far fa-heart mr-1"></i>
        <i v-else class="fas fa-heart"></i>
    </span>
</template>

<script>
    export default {
        name: "ReplyLike",
        props: ['likes', 'liked']
    }
</script>

<style scoped>

</style>
