<template>
    <div class="category">
        <div class="category-details ml-2">
            <div class="d-flex justify-content-between">
                <h3>{{category.name}}</h3>
                <p>{{ category.post_count}} Post</p>
            </div>
            <p>{{ category.description }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Category",
        props: ['category']
    }
</script>

<style scoped>

    .category {
        margin-top: 5px;
        margin-bottom: 10px;
        border-left: 4px solid #4A8CFF;
        border-radius: 5px 0 0 5px;
        padding: 10px 5px;
        box-shadow: 0 4px 11px #00000038
    }

</style>
