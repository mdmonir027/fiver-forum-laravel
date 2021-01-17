<template>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-between justify-content-sm-center flex-wrap list-row">
                    <div class="page-header-category">
                        <select name="" id="" class="form-control">

                            <option>Categories</option>
                            <option v-for="category in categories">{{ category.name }}</option>

                        </select>
                    </div>
                    <ul class="page-header-list">
                        <li>
                            <router-link to="/">Category</router-link>
                        </li>
                        <li>
                            <router-link to="/top">Top</router-link>
                        </li>
                        <li>
                            <router-link to="/latest">Latest</router-link>
                        </li>
                        <li>
                            <router-link to="/unread">Unread (10)</router-link>
                        </li>
                    </ul>

                </div>
                <div class="col-md-6 text-right newTopicRow">
                    <div class="">
                        <router-link to="/add-new-post" class="btn btn-success newTopic "><span class="plus-icon"><i
                            class="fas fa-plus"></i></span>New
                            Topic
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PageHeader",
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

    .page-header-category {
        flex: 0.3;
    }

    .page-header-list {
        flex: 0.7;
        display: flex;
        align-items: center;
        list-style: none;
        margin-bottom: 0;
        margin-left: 30px;
        margin-right: 20px;
    }

    .page-header-list li {
        margin-right: 15px;
        font-size: 17px;

    }

    .page-header-list li:last-child {
        margin-right: 0;
    }

    .page-header-list a {
        color: #8D9096;
        text-decoration: none;
        transition: all .5s;
    }

    .page-header-list a:hover {
        color: #222325;
    }

    .plus-icon {
        color: #363636;
        transition: all .5s;
        margin-right: 5px;
    }

    .newTopic:hover .plus-icon {
        color: #ffffff;
    }

    .newTopic {
        font-size: 17px;
    }

    @media only screen and (max-width: 600px) {
        .page-header-category {
            /*   */
        }

        .page-header-list {
            margin-left: 0;
        }

        .col-md-6.text-right {
            text-align: center !important;
            margin-top: 10px;
        }
    }

    @media only screen and (max-width: 460px) {
        .page-header-category {
            display: none;
        }

        .page-header-list {
            flex: 1;
            margin-right: 0;
            justify-content: center;
            padding: 0;
        }

        .page-header-list li {
            font-size: 15px;
        }

        .list-row {
            flex: 0 0 70%;
        }

        .newTopicRow {
            flex: 0 0 30%;
        }

        .newTopic {
            font-size: 15px;
        }

        .newTopic span {
            display: none;
        }

    }


</style>
