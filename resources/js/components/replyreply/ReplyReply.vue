<template>
    <div class="d-flex align-items-center">

        <div class="mr-4 col-md-1 icon">
            <i class="fas fa-angle-up" @click="hideReplies"></i>
        </div>
        <div class="col-md-11">
            <div v-for="reply in replyReplies">
                <div class="d-flex justify-content-between align-items-center">
                    <user-avatar class="user" :image="reply.user.image"></user-avatar>
                    <div class="replyIcon mt-2">
                        <span class="mr-1 iconBtn text-danger" @click="deleteReplyReply(reply.id)"><i
                            class="fas fa-trash-alt"></i></span>
                        <span>{{ reply.created_at }}</span>
                    </div>
                </div>
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
        props: ['id'],
        data: () => {
            return {
                replyId: null,
                replyReplies: null,
                errors: null
            }
        },
        methods: {
            hideReplies() {
                EventBus.$emit('hideReplies', this.replyId)
            },
            getReplies() {
                axios.get(`/api/post/${this.$route.params.slug}/reply/${this.replyId}/reply_reply`)
                    .then(response => this.replyReplies = response.data)
                    .catch(error => this.errors = error.response.data.errors)
            },
            listen() {
                EventBus.$on('addReplyReplySectionDisable', (data) => {
                    if (data.id === this.replyId) {
                        this.replyReplies.push(data.reply)
                    }
                });
            },
            deleteReplyReply(id) {
                axios.delete(`/api/post/${this.$route.params.slug}/reply/${this.replyId}/reply_reply/${id}`)
                    .then(response => {
                        let replyReplies = this.replyReplies;
                        for (let index = 0; index < replyReplies.length; index++) {
                            if (replyReplies[index].id === id) {
                                replyReplies.splice(index, 1);
                                EventBus.$emit('deleteReplyReply', this.replyId);
                            }
                        }
                    })
                    .catch(error => this.errors = error.response.data.errors)


            }
        },
        mounted() {
            this.getReplies();
            this.listen();
        },
        created() {
            this.replyId = this.id
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
