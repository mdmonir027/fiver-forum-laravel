<template>
    <div class="categories mt-2">

        <category v-for="category in categories" :key="category.id" :category="category"></category>

    </div>
</template>

<script>
    import Category from "./Category";

    export default {
        name: "Categories",
        components: {Category},
        computed: {
            categories() {
                return this.$store.getters.categories;
            }
        },
        mounted() {
            this.$store.dispatch('categories')
        }
    }
</script>

<style scoped>

</style>
