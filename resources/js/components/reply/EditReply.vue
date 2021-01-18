<template>
    <div class="d-block">
        <form @submit.prevent="updateReply">
            <p class="text-danger" v-if="error && error.body">{{ error.body}}</p>
            <VueEditor class="bg-white mb-3" v-model="body"></VueEditor>
            <div class="btn-group " role="group">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                <span @click="editReplySectionDisable" class="btn btn-danger"><i class="fas fa-times"></i></span>
            </div>
        </form>
    </div>
</template>

<script>
    import {VueEditor} from 'vue2-editor'

    export default {
        name: "EditReply",
        components: {VueEditor},
        props: ['content'],
        data: () => {
            return {
                body: '',
                id: null,
                error: null
            }
        },
        methods: {
            updateReply() {
                axios.put(`/api/post/${this.$route.params.slug}/reply/${this.id}`, {body: this.body})
                    .then(response => {
                        this.$store.dispatch('replies' , this.$route.params.slug)
                        this.editReplySectionDisable()
                    })
                    .catch(error => this.error = error.response.data.errors)
            },
            editReplySectionDisable() {
                EventBus.$emit('editReplySectionDisable')
            },
        },
        created() {
            this.body = this.content.body;
            this.id = this.content.id;
        }
    }
</script>

<style scoped>

</style>
