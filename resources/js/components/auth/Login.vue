<template>
    <div class="login-bg">
        <div class="login">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5">

                        <div class="card-group">
                            <div class="card py-2 px-4">
                                <h1 class="text-center my-3"> Login </h1>
                                <p class=" text-center alert-danger alert" v-if="error">{{ error }}</p>
                                <form @submit.prevent="login">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" v-model="form.email" class="form-control" id="email"
                                               aria-describedby="emailHelp">

                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" v-model="form.password" class="form-control"
                                               id="password">
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="check">
                                        <label class="form-check-label" for="check">Check me out</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </form>
                                <br>
                                <hr>
                                <router-link to="/register" class="text-center"> Register a account</router-link>
                                <router-link to="/forgot-password" class="text-center text-danger"> Forgor password?
                                </router-link>
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
        name: "Login",
        data() {
            return {
                form: {
                    email: '',
                    password: ''
                },
                error: null
            }
        },
        methods: {
            login() {
                axios.post('api/auth/login', this.form)
                    .then(response => {
                        let token = response.data;
                        User.responseLoginAfter(token)
                    })
                    .catch(error => this.error = error.response.data.error)
            }
        }
    }
</script>

<style scoped>
    html p,
    html a,
    html button,
    html input,
    html p,
    html label {
        font-size: 17px !important;
    }

    .login {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        min-width: 900px;
    }

    .login-bg {
        background: linear-gradient(90deg, #00c4cc 25%, #6e44bd) !important;
        height: 100vh;
    }

</style>
