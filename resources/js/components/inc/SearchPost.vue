<template>
    <div class="d-flex mt-4" v-if="post">
        <user-avatar :image="post.user.image" class="user"></user-avatar>
        <div class="w-100">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <router-link :to="`/post/${post.slug}`" class="mb-0 h3 title"> {{ post.title | str_limit('40') }}
                    </router-link>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center mr-3">
                            <span class="text-danger small mt-1"><i class="fas fa-square"></i></span>
                            <p class="text-muted ml-1 mb-0 h6">{{ post.category }}</p>
                        </div>

                    </div>
                    <p class="text-info">{{ post.user.name }} posted in {{ post.created_at }}</p>
                </div>
                <div class="count">
                    <p class="text-primary font-weight-bold mb-0 text-center">{{ post.replies_count }} <br> Replies</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


    import UserAvatar from "./UserAvatar";

    export default {
        name: "SearchPost",
        props: ['postData'],
        components: {UserAvatar},
        data() {
            return {
                post: null
            }
        },
        methods: {
            mutatePost() {
                this.post = this.postData;
            }
        },
        mounted() {
            this.mutatePost();
        }
    }
</script>

<style scoped>
    .user {
        width: 55px;
        height: 55px;
        margin-top: 5px;
    }

    .title {
        color: #00B22D;
        transition: all .5s;
        text-decoration: none;
    }

    .title:hover {
        color: #007bff;
    }
</style>
