<template>
    <div class="post d-flex">

        <user class="user"></user>

        <div class="post-content bg-white p-3">

            <div class="post-header border-bottom d-flex justify-content-between">

                <div class="h5 text-muted d-block" v-if="post">{{post.user.name}}</div>
                <div class="">
                    <span class="mr-1"><i class="fas fa-pencil-alt"></i></span>
                    <span v-if="post">{{ post.created_at}}</span>
                </div>

            </div>
            <div class="elabration my-3" v-if="post" v-html="post.content"></div>
            <div class="border-bottom mt-2 d-flex justify-content-between align-items-center">

                <div class="h5 text-muted d-block">
                    <span class="mr-1" v-if="post">{{ post.likes }}</span>
                    <i class="far fa-heart mr-1"></i>
                    <i class="fas fa-heart"></i>
                </div>
                <div class="">
                    <span class="mr-1"><i class="fas fa-share"></i></span>
                    <span>Share</span>
                </div>

            </div>
            <div class="post-footer mt-2 d-flex justify-content-between">

                <div class="d-flex align-items-center">
                    <div class="mr-3">
                        <p class="text-muted h6 text-center">Created</p>
                        <div class="created" v-if="post">
                            <user class="user" ></user>
                            {{ post.created_at }}
                        </div>
                    </div>
                    <div class="">
                        <p class="text-muted h6 text-center">Last Reply</p>
                        <div class="last-reply mr-1">
                            <user class="user"></user>
                            7d
                        </div>
                    </div>
                </div>
                <ul class="count-list">
                    <li v-if="post"> Replies <br>{{ post.replies_count }}</li>
                    <li>Users <br>20</li>
                    <li v-if="post"> Likes <br>{{ post.likes }}</li>
                </ul>


            </div>
        </div>

    </div>

</template>

<script>

    import User from "../inc/User";

    export default {
        name: "SinglePost",
        components: { User },
        data() {
            return {
                post: null
            }
        },
        methods: {
            getPost() {
                let self = this;
                axios.get(`/api/post/${this.$route.params.slug}`)
                    .then(response => self.post = response.data)
                    .catch(error => {
                        console.log(error)
                    })

                console.log('error')

            }
        },
        mounted() {
            this.getPost();
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


    @media only screen and (max-width: 460px) {
        .user {
            margin-bottom: 10px;
        }
    }


</style>
