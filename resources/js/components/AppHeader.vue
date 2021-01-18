<template>
    <div class="header">

        <div class="container">
            <div class="menu">
                <div class="logo">
                    <router-link to="/" class="logo-link">Fiverr</router-link>
                </div>
                <div class="navigation">
                    <ul class='navigation-list'>
                        <li>
                            <router-link to="/logout" class="navlink">Logout</router-link>
                        </li>
                    </ul>
                    <div class="user">
                        <div class="user-wrapper" v-if="user">
                            <img class="w-100" :src="`/upload/image/${user.image}`" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "AppHeader",
        data: () => {
            return {
                user: null
            }
        },
        methods: {
            getUser() {
                axios.post('/api/auth/me')
                    .then(response => this.user = response.data)
                    .catch(error => Exceptions.handle(error))
            }
        },
        mounted() {
            this.getUser();
        },
        watch: {
            $route() {
                this.getUser();
            }
        },
        created() {
            this.getUser();
        }

    }
</script>

<style scoped>
    .header {
        background: #000;
        color: #fff;
        padding: 10px 0;
    }

    .menu {
        display: flex;
        justify-content: space-between;
    }

    .logo .logo-link {
        color: #fff;
        font-size: 30px;
        text-decoration: none;
        letter-spacing: 0;
    }

    .navigation {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }


    .user {
        margin-left: 10px;

    }

    .user-wrapper {
        border-radius: 50%;
        background: #000;
        border: 1px solid #ffffff;
        width: 40px;
        height: 40px;
    }

    .user-wrapper img {
        height: inherit;
        border-radius: 50%;
    }

    .navigation-list {
        list-style: none;
        margin: 0;
        padding: 0;
        margin-right: 20px;
    }

    .navlink {
        text-decoration: none;
        color: #fff;
        transition: all .5s;
    }

    .navlink:hover {
        color: #007bff;
    }

</style>
