<template>
    <span class="likeIcons">
        <span class="mr-1">{{ likes }}</span>
        <i v-if="liked" class="fas fa-heart" @click="unlikeIt"></i>
        <i v-else class="far fa-heart mr-1" @click="likeIt"></i>
    </span>
</template>

<script>
    export default {
        name: "ReplyLike",
        props: ['like'],
        data: () => {
            return {
                likes: 0,
                liked: false,
                replyId: null,
                errors: null
            }
        },
        methods: {
            mutateLikeData() {
                this.likes = this.like.likes
                this.liked = this.like.liked
                this.replyId = this.like.replyId
            },
            likeIt() {
                let self = this;
                axios.post(`/api/post/${this.$route.params.slug}/reply/${this.replyId}/like`)
                    .then(response => {
                        self.likes++
                        self.liked = true
                    })
                    .catch(error => this.errors = error.response.data.error)
            },
            unlikeIt() {
                let self = this;
                axios.delete(`/api/post/${this.$route.params.slug}/reply/${this.replyId}/like`)
                    .then(response => {
                        self.likes--
                        self.liked = false
                    })
                    .catch(error => this.errors = error.response.data.error)
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
    /*.likeIcons i {*/
    /*    color: #ff00a56e;*/
    /*    transition: all;*/
    /*}*/

    /*.likeIcons i:hover {*/
    /*    color: #ff00a5bf;*/
    /*    cursor: pointer;*/
    /*}*/
</style>
