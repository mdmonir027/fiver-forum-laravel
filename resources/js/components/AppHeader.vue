<template>
    <div class="header">

        <div class="container">
            <div class="menu">
                <div class="logo">
                    <router-link to="/" class="logo-link">Fiverr</router-link>
                </div>
                <div class="navigation">

                    <div class="user">
                        <div class="user-wrapper">
                            <img class="w-100" src="image/mdmonir027.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "AppHeader"
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
        /*flex: .5;*/
    }

    .navigation {
        /*flex: 0.5;*/
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

</style>
