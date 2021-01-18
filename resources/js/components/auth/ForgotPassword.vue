<template>
    <div class="login-bg">
        <div class="login">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5">

                        <div class="card-group">
                            <div class="card px-3 py-2">
                                <h1 class="text-center my-3"> Forgot Password </h1>
                                <form @submit.prevent="login">

                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email"
                                               aria-describedby="emailHelp">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">Get Code</button>
                                </form>
                                <br>
                                <hr>
                                <router-link to="/login" class="text-center"> Have account ? Login</router-link>
                                <router-link to="/register" class="text-center text-info"> Need a account?</router-link>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ForgotPassword"
    }
</script>

<style scoped>
    .login-bg {
        background: linear-gradient(90deg, #00c4cc 25%, #6e44bd) !important;
        height: 100vh;
    }

    .login {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        min-width: 900px;
    }
</style>
