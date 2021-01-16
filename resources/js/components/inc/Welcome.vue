<template>
    <div class="text-center py-5">

        <h1>Welcome to the Fiverr Community Forum</h1>
        <p class="sub-title">Please search before posting. There are a lot of great topics out there.</p>
        <div class="search">
            <search-form></search-form>
        </div>
    </div>
</template>

<script>
    import SearchForm from "../forms/SearchForm";
    export default {
        name: "Welcome",
        components: {SearchForm}
    }
</script>

<style scoped>
    .search {
        width: 45%;
        height: 20px !important;
        margin: auto;
    }

    @media only screen and (max-width: 700px) {
        .search {
            width: 75%;
        }

        .sub-title {
            margin-right: 10px;
            margin-left: 10px;
        }
    }
</style>
