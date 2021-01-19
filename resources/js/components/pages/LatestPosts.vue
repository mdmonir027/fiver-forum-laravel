<template>
    <div class="">
        <welcome></welcome>
        <page-header></page-header>

        <div class="container mt-3">
            <div class="content-area bg-white">
                <table class="table table-borderless px-3">
                    <tr class="table-heading-row">
                        <th class="w-75">Topic</th>
                        <th class="text-center">Replies</th>
                        <th class="text-center">View</th>
                        <th class="text-center">Activity</th>
                    </tr>

                    <top-page-post v-for="post in posts" :postData="post" :key="post.id"></top-page-post>

                </table>
            </div>
        </div>

    </div>
</template>

<script>


    import Welcome from "../inc/Welcome";
    import PageHeader from "../inc/PageHeader";
    import TopPagePost from "../inc/TopPagePost";

    export default {
        name: "LatestPosts",
        components: {TopPagePost, PageHeader, Welcome},
        computed: {
            posts() {
                return this.$store.getters.posts
            }
        },
        mounted() {
            this.$store.dispatch('posts');
        }
    }
</script>

<style scoped>

    table {
        border-collapse: separate;
        border-spacing: 0 10px;
    }

</style>
