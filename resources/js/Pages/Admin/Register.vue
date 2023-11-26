<template>
        <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">
    <div class="row w-100 mx-0 auth-page">
        <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
                <div class="row">
                    <div class="col-md-4 pe-md-0">
                        <div class="auth-side-wrapper">
                            <img src="../../login.png" alt="register" />
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
                                Create admin account.
                            </h5>
                            <form @submit.prevent="create_admin" class="forms-sample">
                                <div class="mb-3">
                                    <label
                                        for="exampleInputUsername1"
                                        class="form-label text-info"
                                        >Name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="exampleInputUsername1"
                                        autocomplete="Username"
                                        placeholder="Your name"
                                        v-model="form.name"
                                    />
                                </div>
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
                                </div>
                                <div class="mb-3">
                                  <label class="form-label text-info" for="formFile">Image Upload</label>
                                  <input class="form-control" @input="form.image = $event.target.files[0]" type="file" id="formFile">
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
                                        class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0"
                                    >
                                        Sign up
                                    </button>
                                </div>
                                <router-link
                                    to="/"
                                    class="d-block mt-3 text-info"
                                    >Already a user? Sign in</router-link
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
import { useRouter } from 'vue-router';
export default {
    data(){
      return {
        form:{
          name : '',
          email : '',
          password : '',
          image : null
        }
      }
    },
    methods:{
      create_admin(){
        axios_client.postForm('admin/register', this.form)
        .then((response)=>{
            if(response.data.user){
                const router = useRouter();
                this.$router.push('/dashboard');
            }
        })
      }
    }
};
</script>
