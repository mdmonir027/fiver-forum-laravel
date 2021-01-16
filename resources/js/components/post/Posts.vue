<template>
    <div class="topic ">
        <PostMinimum v-for="post in posts" :post="post" :key="post.id"></PostMinimum>
    </div>
</template>

<script>
    import PostMinimum from "./PostMinimum";

    export default {
        name: "Posts",
        components: {PostMinimum},
        computed: {
            posts() {
                let post = this.$store.getters.posts
                return post.splice(0, 10)
            }
        },
        mounted() {
            this.$store.dispatch('posts')
        },
        methods: {}
    }
</script>

<style scoped>

</style>
