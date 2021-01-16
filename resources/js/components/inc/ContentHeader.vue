<template>
    <div class="category-header">
        <div class="title">
            {{ title }}
        </div>
    </div>
</template>

<script>
    export default {
        name: "ContentHeader",
        props: ['title']
    }
</script>

<style scoped>

    .category-header {
        padding: 10px 0;
        border-bottom: 1px solid #b5b5b5;
    }

    .title {
        font-size: 15px;
        color: #8D9096;
    }

</style>
