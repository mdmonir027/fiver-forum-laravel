<template>
    <div>
        <div class="container py-5 px-3" v-if="post">

            <h1 class="h3">{{ post.title }}</h1>
            <span class="text-muted category">{{ post.category }}</span>

            <div class="content p-3 mt-3">

                <single-post :post="post"></single-post>

                <hr>
                <!-- comments -->
                <reply v-for="reply in replies" :key="reply.id" :reply="reply"></reply>
                <hr class="mt-3">
                <!--    add reply     -->
                <add-reply></add-reply>
            </div>

        </div>

    </div>
</template>

<script>
    import SinglePost from "./SinglePost";
    import Reply from "../reply/Reply";
    import AddReply from "../reply/AddReply";

    export default {
        name: "Post",
        components: {AddReply, Reply, SinglePost},
        computed: {
            replies() {
                return this.$store.getters.replies;
            },
            post() {
                return this.$store.getters.post;
            }
        },
        mounted() {
            this.$store.dispatch('replies', this.$route.params.slug)
            this.$store.dispatch('post', this.$route.params.slug)
        }

    }
</script>

<style scoped>
    .replyBtn {
        transition: all .5s;
    }
</style>
