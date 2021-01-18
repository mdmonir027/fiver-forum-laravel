<template>
    <div class="mt-5">
        <form @submit.prevent="addReply">
            <vue-editor class="bg-white" v-model="content"></vue-editor>
            <button :disabled="!content" type="submit" class="btn btn-success float-right mr-2 mt-2">Reply</button>
        </form>
    </div>
</template>

<script>
    import {VueEditor} from "vue2-editor";

    export default {
        name: "AddReply",
        components: {VueEditor},
        data: () => {
            return {
                content: null
            }
        },
        methods: {
            addReply() {
                axios.post(`/api/post/${this.$route.params.slug}/reply`, {body: this.content})
                    .then(response => {
                        this.$store.commit('addReplies', response.data)
                        this.content = '';
                        this.$store.dispatch('post', this.$route.params.slug)
                    })
                    .catch(error => console.log(error))
            },
        }
    }
</script>

<style scoped>

</style>
