<template>
    <div class="">
        <welcome></welcome>
        <page-header></page-header>

        <div class="container">
            <div class="content-area">
                <div class="row">
                    <div class="col-md-6 first ">
                        <content-header title="Category"></content-header>
                        <categories></categories>
                    </div>
                    <div class="col-md-6 second">
                        <content-header title="Latest"></content-header>
                        <posts></posts>
                        <a href="/" class="btn btn-secondary btn-sm float-right">More</a>
                    </div>


                </div>
            </div>
        </div>

    </div>
</template>

<script>

    import Welcome from "../inc/Welcome";
    import PageHeader from "../inc/PageHeader";
    import ContentHeader from "../inc/ContentHeader";
    import Categories from "../category/Categories";
    import Posts from "../post/Posts";

    export default {
        name: "Home",
        components: {Posts, Categories, ContentHeader, PageHeader, Welcome},
        data() {
            return {}
        },
        computed: {
            categories() {
                return this.$store.getters.categories;
            }
        },
        mounted() {
            // this.$store.dispatch('categories')
        }

    }
</script>

<style scoped>

    .content-area {
        padding: 10px 20px;
        background: #ffffff;
        margin-top: 20px;
    }

    .topic {
        margin-bottom: 30px;
    }

    @media only screen and (max-width: 600px) {
        .col-md-6.first {
            flex: 1;
            order: 2;
        }

        .col-md-6.second {
            flex: 1;
            order: 1;
        }
    }

</style>
