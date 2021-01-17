<template>
    <div class="topic-minimum d-flex justify-content-start my-2 align-items-center">

        <user-avatar :image='post.user.image'></user-avatar>

        <div class="topic-details">
            <router-link :to="`/post/${post.slug}`" class="h4 title">{{post.title | str_limit(20)}}</router-link>
            <p class="text m-0">{{ post.content | str_limit(120) }}</p>
            <ul class="counters m-0 p-0">
                <li>{{ post.likes }} like</li>
                <li>{{ post.replies_count }} reply</li>
                <li>1 share</li>
                <li>1 view</li>
            </ul>
        </div>

    </div>
</template>

<script>
    import UserAvatar from "../inc/UserAvatar";

    export default {
        name: "PostMinimum",
        components: {UserAvatar},
        props: ['post']
    }
</script>

<style scoped>

    .topic-details .title {
        color: #333333;
        text-decoration: none;
    }

    .topic-details .text {
        font-size: 14px;
    }

    .topic-details .title:hover {
        color: #007bff;
    }

    .counters {
        display: flex;
        list-style: none;
    }

    .counters li {
        margin-right: 10px;
        color: #00B22D;
    }

    .counters li:last-child {
        margin-right: 0;
    }

</style>
