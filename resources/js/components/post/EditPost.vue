<template>
    <div class="d-block clearfix">
        <form @submit.prevent="updatePost">
            <p class="text-danger" v-if="error && error.content">{{ error.content}}</p>
            <VueEditor class="bg-white mb-3" v-model="content"></VueEditor>
            <div class="float-right" role="group">
                <span @click="editSectionDisable" class="btn btn-danger mr-1"><i class="fas fa-times"></i></span>
                <button type="submit" :disabled="!content" class="btn btn-success"><i class="fa fa-check"></i></button>
            </div>
        </form>
    </div>
</template>

<script>
    import {VueEditor} from 'vue2-editor'

    export default {
        name: "EditPost",
        props: ['postContent'],
        components: {VueEditor},
        data: () => {
            return {
                content: '',
                oldContent: '',
                error: null
            }
        },
        methods: {
            editSectionDisable(value = 'leave') {
                EventBus.$emit('editSectionDisable', value);
            },
            updatePost() {
                // for will be submitted to server when the content change
                // and emit an event to disable the content edit section
                if (this.oldContent !== this.content) {
                    let slug = this.$route.params.slug;
                    axios.put(`/api/post/${slug}`, {content: this.content})
                        .then(response => {
                            this.$store.dispatch('post', this.$route.params.slug);
                            this.editSectionDisable('take');
                        })
                        .catch(error => this.error = error.response.data.errors)
                } else {

                    this.editSectionDisable('take')
                }
            }
        },
        mounted() {
            this.content = this.postContent;
            this.oldContent = this.postContent;
        }
    }
</script>

<style scoped>

</style>
