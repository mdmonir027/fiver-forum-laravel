<template>
    <form class="search-form">
        <div class="d-flex justify-content-between input-wrapper">
            <input type="text" class="form-control" name="" id="" placeholder="search here">
            <button class="submit-btn" type="button">
                <router-link class="text-dark" to="/search"><i class="fas fa-search"></i></router-link>
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "SearchForm"
    }
</script>

<style scoped>
    .search-form {
        width: 100%;
    }

    .input-wrapper {
        background: #ffffff;
        border-radius: 6px;
    }

    .search-form input {
        height: 30px !important;
        font-size: 14px;
        background: transparent;
        border: none;
        outline: none !important;
        padding-bottom: 8px;
    }

    .submit-btn {
        color: #000000;
        background: transparent;
        border: none;
    }
</style>
