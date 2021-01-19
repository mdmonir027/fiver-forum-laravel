<template>
    <form class="search-form" @submit.prevent="search">
        <div class="d-flex justify-content-between input-wrapper">
            <input type="text" v-model="searchData" class="form-control" name="" id="" placeholder="search here">
            <button class="submit-btn text-dark" :disabled="!searchData" type="submit"><i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "SearchForm",
        data: () => {
            return {
                searchData: ''
            }
        },
        methods: {
            search() {
                this.$router.push(`/search/${this.searchData}`)
            }
        }
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
