<template>
    <div class="post d-flex" v-if="post">

        <user-avatar v-if="post.user && post.user.image" :image="post.user.image" class="user"></user-avatar>

        <div class="post-content bg-white p-3">

            <div class="post-header border-bottom d-flex justify-content-between">

                <div class="h5 text-muted d-block" v-if="post.user && post.user.name">{{post.user.name}}</div>
                <div class="replyIcon">
                    <span class="mr-1 iconBtn text-info" v-if="own && !editSection" @click="editSectionEnable"><i
                        class="fas fa-pencil-alt"></i></span>
                    <span class="mr-1 iconBtn text-danger" v-if="own"><i
                        class="fas fa-trash-alt"></i></span>
                    <span v-if="post.created_at">{{ post.created_at}}</span>
                </div>

            </div>

            <div class="" v-if="!editSection">
                <div class="elabration my-3" v-if="post.content" v-html="post.content"></div>
                <div class="border-bottom mt-2 d-flex justify-content-between align-items-center">
                    <post-like :data='{like:post.likes , like:post.liked}'></post-like>
                    <div class="replyBtn">
                        <span class="mr-1"><i class="fas fa-share"></i></span>
                        <span>Reply</span>
                    </div>

                </div>
            </div>
            <div class="" v-else>
                <edit-post v-if="post.content" :postContent="post.content"></edit-post>
            </div>
            <div class="post-footer mt-2 d-flex justify-content-between">

                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <p class="text-muted h6 text-center">Created</p>
                        <div class="created">
                            <user-avatar class="user" v-if="post.user && post.user.image"
                                         :image="post.user.image"></user-avatar>
                            {{ post.created_at }}
                        </div>
                    </div>
                </div>
                <ul class="count-list">
                    <li> Replies <br> <span v-if="post">{{ post.replies_count }}</span></li>
                    <li> Likes <br> <span v-if="post">{{ post.likes }}</span></li>
                </ul>


            </div>
        </div>

    </div>

</template>

<script>
    import UserAvatar from "../inc/UserAvatar";
    import PostLike from "../like/PostLike";
    import EditPost from "./EditPost";

    export default {
        name: "SinglePost",
        components: {EditPost, PostLike, UserAvatar},
        props: ['post'],
        data: () => {
            return {
                own: false,
                editSection: false
            }
        },
        methods: {
            checkOwn() {
                if (this.post && this.post.user) {
                    this.own = User.own(this.post.user.id)
                }
            },
            editSectionEnable() {
                EventBus.$emit('editSectionEnable');
                this.editSection = true
            },
            listen() {
                EventBus.$on('editSectionDisable', () => {
                    this.editSection = false;
                })
            }
        },
        mounted() {
            setTimeout(() => {
                this.checkOwn();
            }, 1000);

            this.listen();
        }
    }
</script>

<style scoped>

    .post {
        flex-wrap: wrap;
    }

    .post-content {
        flex: 0.99;
        border-radius: 5px;
    }

    .user {
        width: 65px;
        height: 65px;
        margin-top: 20px;
    }

    .post-footer {
        text-align: center;
    }

    .post-footer .user {
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

    .replyBtn {
        transition: all .5s;
    }

    .replyBtn:hover {
        cursor: pointer;
        color: #007bff;

    }


    @media only screen and (max-width: 460px) {
        .user {
            margin-bottom: 10px;
        }
    }


</style>
