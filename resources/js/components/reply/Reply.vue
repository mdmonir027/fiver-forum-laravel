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

            <div class="border-top pt-2 mt-4 d-flex justify-content-between align-items-center"
                 v-if="!addReplyReplySection">

                <div class="h5 text-muted d-block">
                    <span class="mr-4 text-success reply-btn" v-if="hasReplies" @click="repliesToggle"> {{ repliesCount }} replies
                        <i v-if="repliesSection" class="fas fa-angle-up"></i>
                        <i class="fas fa-angle-down" v-if="!repliesSection"></i>
                    </span>
                    <reply-like :like="{likes:reply.likes , liked:reply.liked , replyId: reply.id}"></reply-like>

                </div>
                <div class="iconBtn" @click="enableAddReplyReplySection">
                    <span class="mr-1"><i class="fas fa-share"></i></span>
                    <span>Reply</span>
                </div>

            </div>


            <div class="replies" v-if="repliesSection">
                <reply-reply :id="reply.id"></reply-reply>
            </div>

            <add-reply-reply v-if="addReplyReplySection" :data="{id:reply.id}"></add-reply-reply>
        </div>

    </div>

</template>

<script>


    import ReplyReply from "../replyreply/ReplyReply";
    import ReplyLike from "../like/ReplyLike";
    import UserAvatar from "../inc/UserAvatar";
    import EditReply from "./EditReply";
    import AddReplyReply from "../replyreply/AddReplyReply";


    export default {
        name: "Reply",
        components: {AddReplyReply, EditReply, UserAvatar, ReplyLike, ReplyReply},
        props: ['reply'],
        data: () => {
            return {
                repliesSection: false,
                hasReplies: false,
                own: false,
                error: null,
                editReplySection: false,
                addReplyReplySection: false,
                repliesCount: null
            }
        },
        methods: {
            repliesToggle() {
                this.repliesSection ? this.repliesSection = false : this.repliesSection = true;
            },
            listen() {
                let self = this;
                EventBus.$on('hideReplies', (replyId) => {
                    if (this.reply.id === replyId) {
                        this.repliesSection = false;
                    }
                });

                EventBus.$on('editReplySectionDisable', () => {
                    this.editReplySection = false
                });

                EventBus.$on('addReplyReplySectionDisable', (data) => {
                    if (data.id === this.reply.id) {
                        this.addReplyReplySection = false;
                        if (data.type) {
                            this.repliesSection = true
                            this.repliesCount++
                        }
                    }
                });

                EventBus.$on('deleteReplyReply', (id) => {
                    if (self.reply.id === id) {
                        self.repliesCount--
                    }
                })

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

            hideReplyRepliesSection() {
                this.repliesSection = false;
            },
            showReplyRepliesSection() {
                this.repliesSection = true;
            },
            enableAddReplyReplySection() {
                this.addReplyReplySection = true;
                this.repliesSection = false;
            },
            disableAddReplyReplySection() {
                this.addReplyReplySection = false;
            },
            enableEditReplySection() {
                this.editReplySection = true
            },
            disableEditReplySection() {
                this.editReplySection = false
            },

        },
        mounted() {
            this.listen();
            this.hasReplyCheck();
            this.checkOwn();
        },
        created() {
            this.repliesCount = this.reply.replies_count
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
