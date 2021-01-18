<template>
    <div class="py-5">
        <div class="container">
            <h1 class="mb-4">Create a new topic</h1>
            <div class="row">
                <div class="col-md-8">
                    <form @submit.prevent="addPost">
                        <div class="row my-3 ">
                            <div class="col-md-6">
                                <span class="text-danger" v-if="error && error.title">{{ error.title[0] }}</span>
                                <input v-model="form.title" type="text" placeholder="Give a title"
                                       class="form-control">
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger"
                                      v-if="error && error.category_id">{{ error.category_id[0] }}</span>
                                <select class="form-control" v-model="form.category_id">
                                    <option value="">Category</option>
                                    <option v-for="category in categories" :value="category.id">{{category.name}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <span class="text-danger" v-if="error && error.content">{{ error.content[0] }}</span>
                        <VueEditor class="bg-white mb-3" v-model="form.content"></VueEditor>
                        <button :disabled="!form.content || !form.title || !form.category_id" type="submit"
                                class="btn btn-primary">Create
                        </button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div v-html="form.content" class="border rounded topicContentShow mt-3 p-4"></div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import {VueEditor} from 'vue2-editor'

    export default {
        name: "AddPost",
        components: {VueEditor},
        data: () => {
            return {
                form: {
                    content: null,
                    title: null,
                    category_id: ''
                },
                error: null

            }
        },
        computed: {
            categories() {
                return this.$store.getters.categories;
            }
        },
        methods: {
            addPost() {
                axios.post('/api/post', this.form)
                    .then(response => {
                        this.$router.push(response.data)
                    })
                    .catch(error => {
                        this.error = error.response.data.errors;
                    })
            }
        },
        mounted() {
            this.$store.dispatch('categories');
        }
    }
</script>

<style scoped>
    p, input, select {
        font-size: 16px !important;
    }

    .topicContentShow {
        min-height: 333px;
    }


</style>
