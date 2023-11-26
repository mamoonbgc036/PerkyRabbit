<template>
       <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">
    <div class="row w-100 mx-0 auth-page">
        <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
                <div class="row">
                    <div class="col-md-4 pe-md-0">
                        <div class="auth-side-wrapper">
                            <img src="../../login.png" alt="login" />
                        </div>
                    </div>
                    <div class="col-md-8 ps-md-0">
                        <div class="auth-form-wrapper px-4 py-5">
                            <a
                                href="#"
                                class="noble-ui-logo logo-light d-block mb-2"
                                >Perky Rabbit Corporation Limited</a
                            >
                            <h5 class="text-warning fw-normal mb-4">
                                Admin Login
                            </h5>
                            <form class="forms-sample" @submit.prevent="admin_login">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label text-info"
                                        >Email address</label
                                    >
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="userEmail"
                                        placeholder="Email"
                                        v-model="form.email"
                                    />
                                    <p v-if="emailError" v-html="emailError" class="text-danger"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="userPassword" class="form-label text-info"
                                        >Password</label
                                    >
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="userPassword"
                                        autocomplete="current-password"
                                        placeholder="Password"
                                        v-model="form.password"
                                    />
                                    <p v-if="passwordError" v-html="passwordError" class="text-danger"></p>
                                </div>
                                <div class="form-check mb-3">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="authCheck"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="authCheck"
                                    >
                                        Remember me
                                    </label>
                                </div>
                                <div>
                                    <button
                                        type="submit"
                                        class="btn btn-primary me-2 mb-2 mb-md-0 text-white"
                                        >Login</button
                                    >
                                </div>
                                <router-link
                                    to="/register"
                                    class="d-block mt-3 text-warning"
                                    >Not a user? Sign up</router-link
                                >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</template>
<script>
import axios_client from '../../axios-client';
export default {
    data(){
        return {
            form:{
                email : '',
                password : ''
            },
            emailError : '',
            passwordError : ''
        }
    },
    methods:{
        admin_login(){
            axios_client.post('/admin/login', this.form)
            .then((response)=>{
                this.$router.push('/dashboard');
            })
            .catch((error)=>{
                this.emailError = error.response.data.errors.email[0]
                this.passwordError = error.response.data.errors.password[0]
            })           
        }
    }
};
</script>
<style>
.auth-side-wrapper img {
    height: 100%;
    width: 100%;
}
</style>
