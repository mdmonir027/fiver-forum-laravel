<template>
    <div class="h5 text-muted d-block">
        <span class="mr-1">{{ like.likes }}</span>
        <i v-if="!like.liked" class="far fa-heart mr-1"></i>
        <i v-else class="fas fa-heart"></i>
    </div>
</template>

<script>
    export default {
        name: "PostLike",
        props: ['like'],
        data: () => {
            return {
                likes: 0,
                liked: false
            }
        },
        methods: {
            mutateLikeData() {
                this.likes = this.like.likes
                this.liked = this.like.liked
            }
        },
        mounted() {
            setTimeout(() => {
                this.mutateLikeData()
            }, 1000)
        }
    }
</script>

<style scoped>

</style>
