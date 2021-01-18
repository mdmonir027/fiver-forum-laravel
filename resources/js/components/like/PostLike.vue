<template>
    <div class="h5 text-muted d-block likeIcons">
        <span class="mr-1">{{ likes }}</span>
        <i v-if="liked" @click="unlikeIt" class="fas fa-heart"></i>
        <i v-else @click="likeIt" class="far fa-heart mr-1"></i>
    </div>
</template>

<script>
    export default {
        name: "PostLike",
        props: ['like'],
        data: () => {
            return {
                likes: 0,
                liked: false,
                errors: null
            }
        },
        methods: {
            mutateLikeData() {
                this.likes = this.like.likes
                this.liked = this.like.liked
            },
            likeIt() {
                let self = this;
                axios.post(`/api/post/${this.$route.params.slug}/like`)
                    .then(response => {
                        self.likes++
                        self.liked = true
                    })
                    .catch(error => this.errors = error.response.data.error)
            },
            unlikeIt() {
                let self = this;
                axios.delete(`/api/post/${this.$route.params.slug}/like`)
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

</style>
