<template>
    <div class="reply d-flex mt-4">

        <user-avatar :image="reply.user.image" class="user"></user-avatar>

        <div class="reply-content bg-white p-3">

            <div class="reply-header border-bottom d-flex justify-content-between">

                <div class="h5 text-muted d-block">{{ reply.user.name}}</div>
                <div class="">
                    <span class="mr-1 replyIcon" v-if="own && !editReplySection">
                        <i class="fas fa-pencil-alt mr-1 text-info" @click="enableEditReplySection"></i>
                        <i class="fas fa-trash-alt text-danger" @click="deleteReply"></i>
                    </span>
                    <span>{{reply.created_at}}</span>
                </div>

            </div>
            <div class="elabration my-3" v-if="!editReplySection" v-html="reply.body"></div>
            <edit-reply v-else :content="{body:reply.body , id:reply.id}"></edit-reply>
            <div class="border-top pt-2 mt-4 d-flex justify-content-between align-items-center">

                <div class="h5 text-muted d-block">
                    <span class="mr-4 text-success reply-btn" v-if="hasReplies" @click="repliesToggle"> {{ reply.replies_count }} replies
                        <i class="fas fa-angle-down" v-if="!repliesSection"></i>
                        <i v-if="repliesSection" class="fas fa-angle-up"></i>
                    </span>
                    <reply-like :likes="reply.likes" :liked="reply.liked"></reply-like>

                </div>
                <div class="iconBtn">
                    <span class="mr-1"><i class="fas fa-share"></i></span>
                    <span>Reply</span>
                </div>

            </div>
            <div class="replies" v-if="repliesSection">
                <reply-reply :replyId="reply.id"></reply-reply>
            </div>
        </div>

    </div>

</template>

<script>


    import ReplyReply from "./ReplyReply";
    import ReplyLike from "../like/ReplyLike";
    import UserAvatar from "../inc/UserAvatar";
    import EditReply from "./EditReply";


    export default {
        name: "Reply",
        components: {EditReply, UserAvatar, ReplyLike, ReplyReply},
        props: ['reply'],
        data: () => {
            return {
                repliesSection: false,
                hasReplies: false,
                own: false,
                error: null,
                editReplySection: false
            }
        },
        methods: {
            repliesToggle() {
                this.repliesSection ? this.repliesSection = false : this.repliesSection = true;
            },
            hideReply() {
                this.repliesSection = false;
            },
            listen() {
                EventBus.$on('hideReplies', () => {
                    this.hideReply();
                });

                EventBus.$on('editReplySectionDisable', () => {
                    this.editReplySection = false
                });

            },
            hasReplyCheck() {
                this.hasReplies = this.reply.replies_count > 0;
            },
            checkOwn() {
                this.own = User.own(this.reply.user.id);
            },
            deleteReply() {
                axios.delete(`/api/post/${this.$route.params.slug}/reply/${this.reply.id}`)
                    .then(response => {
                        this.$store.dispatch('replies', this.$route.params.slug)
                        this.$store.dispatch('post', this.$route.params.slug)
                    })
                    .catch(error => {
                        this.error = error.response.data.error
                    })
            },
            enableEditReplySection() {
                this.editReplySection = true
            }

        },
        mounted() {
            this.listen();
            this.hasReplyCheck();
            this.checkOwn();
        }
    }
</script>

<style scoped>

    .reply-content {
        flex: 0.99;
        border-radius: 5px;
    }

    .user {
        width: 65px;
        height: 65px;
        margin-top: 20px;
    }

    .reply-btn:hover {
        cursor: pointer;
    }

    .reply-footer .user {
        margin-top: 0;
        margin-right: 0;
        width: 40px;
        height: 40px;
    }

    .count-list {
        list-style: none;
        display: flex;
        align-items: center;
        margin: 0 !important;
    }

    .count-list li {
        margin-right: 10px;
    }

    .count-list li:last-child {
        margin-right: 0;
    }


</style>
