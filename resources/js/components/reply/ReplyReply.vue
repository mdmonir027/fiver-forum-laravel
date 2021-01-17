<template>
    <div class="d-flex align-items-center">

        <div class="mr-4 col-md-1 icon">
            <i class="fas fa-angle-up" @click="hideReplies"></i>
        </div>
        <div class="col-md-11">
            <div v-for="reply in replyReplies">
                <user-avatar class="user" :image="reply.user.image"></user-avatar>
                <div class="mt-2 p-3 border">
                    <div v-html="reply.body"></div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>


    import UserAvatar from "../inc/UserAvatar";

    export default {
        name: "ReplyReply",
        components: {UserAvatar},
        props: ['replyId'],
        data: () => {
            return {
                replyReplies: null
            }
        },
        methods: {
            hideReplies() {
                EventBus.$emit('hideReplies')
            },
            getReplyReply() {
                axios.get(`/api/post/${this.$route.params.slug}/reply/${this.replyId}/reply_reply`)
                    .then(response => this.replyReplies = response.data)
                    .catch(error => console.log(error));
            }
        },
        mounted() {
            this.getReplyReply();
        }

    }
</script>

<style scoped>
    .user {
        width: 50px;
        height: 50px;
        margin-top: 20px;
    }

    .icon {
        font-size: 50px;
        color: #8D9096;
        margin-top: 20px;
        transition: all .5s;
    }

    .icon i:hover {
        cursor: pointer;
        color: #000;
    }

    p {
        margin-bottom: 0;
    }

    @media only screen and (max-width: 600px) {
        .icon {
            width: 0;
        }
    }
</style>
