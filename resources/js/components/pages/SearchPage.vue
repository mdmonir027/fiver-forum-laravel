<template>
    <div class="py-5">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="search">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <search-form></search-form>
                                    <div class="mt-2">
                                        <div class="d-flex justify-content-between ">
                                            <p class="text-muted h5"> 10 result for topic </p>
                                            <div class="float-right">
                                                <router-link to="/add-new" class="btn btn-primary btn-sm newTopic"><span
                                                    class="plus-icon mr-1"><i
                                                    class="fas fa-plus"></i></span>
                                                    New Topic
                                                </router-link>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    <search-post></search-post>
                                    <search-post></search-post>
                                    <search-post></search-post>
                                    <search-post></search-post>
                                    <search-post></search-post>
                                    <search-post></search-post>

                                </div>

                                <div class="col-md-3">

                                    <h4 class=" my-4 text-white bg-success text-center d-block w-100 py-2 rounded font-weight-bold">
                                        Categories</h4>

                                    <search-categories v-for="category in categories" :catData="category"
                                                       :key="category.id"></search-categories>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import SearchForm from "../forms/SearchForm";
    import SearchPost from "../inc/SearchPost";
    import SearchCategories from "../inc/SearchCategories";

    export default {
        name: "SearchPage",
        components: {SearchCategories, SearchPost, SearchForm},
        computed: {
            categories() {
                return this.$store.getters.categories
            }
        },
        mounted() {
            this.$store.dispatch('categories');
        }
    }
</script>

<style scoped>
    .newTopic:hover .plus-icon {
        color: #ffffff;
    }

    .newTopic {
        font-size: 13px;
    }
</style>
