<template>

    <tr class="topic-row my-4" v-if="post">
        <td>

            <div class="d-flex align-items-center">

                <div class="user">
                    <user-avatar :image="post.user.image"></user-avatar>

                </div>
                <div>
                    <router-link :to="`/post/${post.slug}`" class="h5 title">{{ post.title }}</router-link>
                    <span class="text-muted d-block small">{{ post.user.name }}</span>
                </div>
            </div>

        </td>
        <td class="text-center  text-success"> {{ post.replies_count }}</td>
        <td class="text-center  text-success"> 9</td>
        <td class="text-center  text-success position-relative"> {{ post.created_at}} <span class="row-border"></span>
        </td>

    </tr>

</template>

<script>


    import UserAvatar from "./UserAvatar";

    export default {
        name: "TopPagePost",
        components: {UserAvatar},
        props: ['postData'],
        data() {
            return {
                post: null
            }
        },
        mounted() {
            this.post = this.postData;
        }
    }
</script>

<style scoped>
    .user {
        width: 35px;
        height: 35px;
        margin-right: 20px;
    }

    .title {
        color: #007bff;
        text-decoration: none;
    }

    .title:hover {
        color: #00B22D;
    }

    .topic-row {
        box-shadow: 0 2px 10px -5px #00000069;
        border-right: 2px solid #007bff;
    }

    span.row-border:after {
        content: '';
        background: #007bff;
        height: 53px;
        width: 7px;
        display: block;
        position: absolute;
        top: 0;
        right: 0;
        border-radius: 3px 0 0 3px;
    }

</style>
