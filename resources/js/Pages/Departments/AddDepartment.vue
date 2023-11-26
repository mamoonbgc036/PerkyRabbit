<template>
    <DashboardLayout>
        <div v-if="switch" class="alert alert-warning alert-dismissible fade show" role="alert">
            <P>Department is created</P>
            <button type="button" @click="transfer" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
        <div class="row">
					<div class="col-md-12 grid-margin">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Add Department</h6>
								<div class="forms-sample">
									<div class="row mb-3">
										<div class="col">
											<label class="form-label">Name:</label>
											<input v-model="form.name" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Department name">
										</div>
                                        <p v-if="error" v-html="error" class="text-danger"></p>
									</div>
                                    <div class="row mb-3 text-center">
                                        <div class="col">
                                            <input @click.prevent="create_department" class="btn btn-primary w-25" type="button" value="Create">
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
    </DashboardLayout>
</template>
<script>
    import axios_client from '../../axios-client';
import DashboardLayout from '../Dashboard/DashboardLayout.vue';
    export default{
        data(){
            return{
                form:{
                    name : ''
                },
                switch : false,
                error : ''
            }
        },
        components:{
            DashboardLayout
        },
        methods:{
            async create_department(){
              try {
                const response = await axios_client.post('departments', this.form)
                this.form.name = ''
                this.switch = true
                console.log('response.data.errors.name');
              } catch (errors) {
                this.error = errors.response.data.message
              }
            },
            transfer(){
                this.switch = false
            }
        }
    }
</script>