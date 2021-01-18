<template>
    <div class="mt-1">
        <form @submit.prevent="addReplyReply">
            <vue-editor class="bg-white" v-model="body"></vue-editor>

            <button type="submit" class="btn btn-success float-right mr-2 mt-2"><i class="fa fa-check"></i></button>
            <span @click="abortReply" class="btn btn-danger mr-1 float-right mt-2"><i
                class="fas fa-times"></i></span>
        </form>
    </div>
</template>

<script>

    import {VueEditor} from 'vue2-editor'

    export default {
        name: "AddReplyReply",
        components: {VueEditor},
        props: ['data'],
        data: () => {
            return {
                body: '',
                id: null,
                errors: null
            }
        },
        methods: {
            addReplyReply() {
                axios.post(`/api/post/${this.$route.params.slug}/reply/${this.id}/reply_reply`, {body: this.body})
                    .then(response => {
                        this.addReplyReplySectionDisable({reply: response.data, type: true, id: this.id});
                    })
                    .catch(error => this.errors = error.response.data.error)
            },
            addReplyReplySectionDisable(data) {
                EventBus.$emit('addReplyReplySectionDisable', data)
                console.log(data)
            },
            abortReply() {
                let data = {type: false, id: this.id}
                this.addReplyReplySectionDisable(data);
            }
        },
        created() {
            this.id = this.data.id
        }
    }
</script>

<style scoped>

</style>
