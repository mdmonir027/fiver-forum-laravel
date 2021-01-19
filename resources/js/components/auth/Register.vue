<template>
    <div class="login-bg pt-5">
        <div class="login">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5">

                        <div class="card-group">
                            <div class="card p-4">
                                <h1 class="text-center my-3"> Register </h1>
                                <form @submit.prevent="register">

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" v-model="form.name" class="form-control" id="name"
                                               aria-describedby="emailHelp">
                                        <div class="text-danger" v-if="error && error.name">{{ error.name[0]}}</div>

                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" v-model="form.email" class="form-control" id="email"
                                               aria-describedby="emailHelp">
                                        <div class="text-danger" v-if="error && error.email">{{ error.email[0]}}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" v-model="form.password" class="form-control"
                                               id="password">
                                        <div class="text-danger" v-if="error && error.password">{{ error.password[0]}}
                                        </div>
                                    </div>

                                    <button type="submit" :disabled="!form.name || !form.email || !form.password"
                                            class="btn btn-primary btn-block">Register
                                    </button>
                                </form>
                                <hr>
                                <router-link to="/login" class="text-center"> Have account ? Login</router-link>
                                <router-link to="/forgot-password" class="text-center text-danger"> Forgot password?
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
        name: "Register",
        data: () => {
            return {
                form: {
                    name: '',
                    email: '',
                    password: ''
                },
                error: {}
            }
        },
        methods: {
            register() {
                axios.post('/api/auth/sign-up', this.form)
                    .then(response => {
                        let token = response.data;
                        User.responseLoginAfter(token)
                    })
                    .catch(error => this.error = error.response.data.errors)
            }
        },
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
