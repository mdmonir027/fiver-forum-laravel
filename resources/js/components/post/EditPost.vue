<template>
    <div class="d-block">
        <form @submit.prevent="updatePost">
            <VueEditor class="bg-white mb-3" v-model="content"></VueEditor>
            <div class="btn-group " role="group">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                <span @click="editSectionDisable" class="btn btn-danger"><i class="fas fa-times"></i></span>
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
                if (this.oldContent !== this.content) {
                    let slug = this.$route.params.slug;
                    axios.put(`/api/post/${slug}`, {content: this.content})
                        .then(response => {
                            this.$store.dispatch('post', this.$route.params.slug);
                            this.editSectionDisable('take');
                        })
                        .catch(error => this.error = error.response.data.errros)
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
