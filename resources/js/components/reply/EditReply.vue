<template>
    <div class="d-block clearfix">
        <form @submit.prevent="updateReply">
            <p class="text-danger" v-if="error && error.body">{{ error.body}}</p>
            <VueEditor class="bg-white mb-3" v-model="body"></VueEditor>

            <button :disabled="!body" type="submit" class="btn btn-success mr-2 float-right"><i
                class="fa fa-check"></i></button>
            <span @click="editReplySectionDisable" class="btn btn-danger float-right mr-1"><i class="fas fa-times"></i></span>

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
                        this.$store.dispatch('replies', this.$route.params.slug)
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
