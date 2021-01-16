<template>
    <div class="category d-flex justify-content-between">
        <div class="category-image">
            <img class="w-100 h-100 rounded" src="" alt="">
        </div>
        <div class="category-details">
            <div class="d-flex justify-content-between">
                <h3>Fiverr Tips</h3>
                <p>10 Topic</p>
            </div>
            <p>This category is for posts with original tips for sellers to utilize. If you
                want to ask for tips, please use Improve my Gig.</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Category"
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

    .category-image {
        width: 220px;
        margin-right: 10px;
        margin-left: 10px;
    }

</style>
