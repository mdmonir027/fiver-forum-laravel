<template>
    <div class="d-flex text-muted justify-content-between align-items-center" v-if="category">
        <h5>{{ category.name }}</h5>
        <p class="mb-0">{{ category.post_count }}</p>
    </div>
</template>

<script>
    export default {
        name: "SearchCategories",
        props: ['catData'],
        data() {
            return {
                category: null
            }
        },
        methods: {
            mutateCategory() {
                this.category = this.catData
            }
        },
        mounted() {
            this.mutateCategory();
        }
    }
</script>

<style scoped>

</style>
