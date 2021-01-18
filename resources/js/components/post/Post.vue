<template>
    <div>
        <div class="container py-5 px-3" v-if="post">

            <h1 class="h3" v-if="!titleEdit">{{ post.title }}</h1>
            <input type="text" v-else class="form-control" v-model="title" id="">
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
        data() {
            return {
                titleEdit: false,
                title: '',
                errors: null,
                old_title: ''
            }
        },
        computed: {
            replies() {
                return this.$store.getters.replies;
            },
            post() {
                return this.$store.getters.post;
            },

        },
        methods: {
            listen() {
                EventBus.$on('editSectionEnable', () => {
                    this.titleEdit = true
                })
                EventBus.$on('editSectionDisable', (value) => {
                    if (value === 'take' && this.old_title !== this.title) {
                        this.updateTitle();
                    }
                    this.titleEdit = false;
                })
            },
            updateTitle() {
                if (this.title !== this.old_title) {
                    let slug = this.$route.params.slug;
                    axios.put(`/api/post/${slug}`, {title: this.title})
                        .then(response => {
                            this.$router.push(`/post/${this.slugify(this.title)}`)
                            this.$store.dispatch('post', this.$route.params.slug);
                        })
                        .catch(error => this.error = error.response.data.erros)
                }

            },
            slugify(text, ampersand = 'and') {
                const a = 'àáäâèéëêìíïîòóöôùúüûñçßÿỳýœæŕśńṕẃǵǹḿǘẍźḧ'
                const b = 'aaaaeeeeiiiioooouuuuncsyyyoarsnpwgnmuxzh'
                const p = new RegExp(a.split('').join('|'), 'g')

                return text.toString().toLowerCase()
                    .replace(/[\s_]+/g, '-')
                    .replace(p, c =>
                        b.charAt(a.indexOf(c)))
                    .replace(/&/g, `-${ampersand}-`)
                    .replace(/[^\w-]+/g, '')
                    .replace(/--+/g, '-')
                    .replace(/^-+|-+$/g, '')
            }
        },
        mounted() {
            this.$store.dispatch('replies', this.$route.params.slug)
            this.$store.dispatch('post', this.$route.params.slug)
            this.listen();
            setTimeout(() => {
                this.title = this.post.title
                this.old_title = this.post.title
            }, 1000)
        },
        watch: {
            $route() {
                this.$store.dispatch('post', this.$route.params.slug)
            }
        }

    }
</script>

<style>
    .iconBtn {
        transition: all .5s;
    }

    .iconBtn {
        transition: all .5s;
    }

    .iconBtn:hover {
        cursor: pointer;
        color: #007bff;

    }

    .replyIcon i {
        transition: all .3s;
    }

    .replyIcon i:hover {
        color: #00B22D !important;
        cursor: pointer;
    }

</style>
