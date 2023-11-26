<!-- name, email, phone,
address -->
<template>
    <DashboardLayout>
        <div class="row">
            <div class="col-md-12 grid-margin">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Add Employee</h6>
								<div class="forms-sample">
									<div class="row mb-3">
										<div class="col">
											<label class="form-label">Name</label>
											<input v-model="form.name" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="employee name">
											 <p v-if="error" v-html="error" class="text-danger"></p>
										</div>
										<div class="col-md-6">
											<label class="form-label">Email</label>
											<input v-model="form.email" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="employee email">
										</div>
									</div>
                                    <div class="row mb-3">
										<div class="col">
											<label class="form-label">Phone</label>
											<input v-model="form.phone" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="employee phone">
											 <p v-if="error" v-html="error" class="text-danger"></p>
										</div>
										<div class="col-md-6">
											<label class="form-label">Address</label>
											<input v-model="form.address" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="employee address">
										</div>
									</div>
                                    <div class="row mb-3" data-select2-id="7">
                                        <label class="form-label">Select Department</label>
                                        <select v-model="form.department_id" class="js-example-basic-single form-select select2-hidden-accessible" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option v-for="depart in departments.data" :key="depart.id" :value="depart.id" data-select2-id="3">{{ depart.name }}</option>
                                        </select>
                                    </div>
                                    <div>
                                        <div v-for="(input, index) in inputFields" :key="index" class="row mb-3">
										    <div class="col">
											    <label class="form-label">Achievements</label>
                                        
                                                <input v-model="input.value" type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="employee name">  
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Date</label>
                                                <input v-model="input.date" type="date" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="employee email">
                                            </div>                                       
									    </div>
                                        <button class="btn btn-sm btn-warning" @click="addInputField">+</button>
                                    </div>
                                    <div class="row mb-3 text-center">
	                                        <div class="col">
	                                            <input @click.prevent="create_employee" class="btn btn-primary w-25" type="button" value="Create">
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
    import { useRoute } from 'vue-router';
import axios_client from '../../axios-client';
import DashboardLayout from '../Dashboard/DashboardLayout.vue';
    export default{
        data(){
            return{
                form:{
                    name : '',
                    email : '',
                    phone : '',
                    address : '',
                    department_id : '',
                    achievements : {
                        name : [],
                        date : []
                    },
                },
                inputFields: [{ value: '' }],
                error : '',
                departments: [],
            }
        },
        components:{
            DashboardLayout
        },
        mounted(){
            this.get_departments();
        },
        methods:{
            async create_employee(){
                this.form.achievements.name = []
                this.form.achievements.date = []
                if(this.inputFields[0].value!=''){
                        if(this.inputFields.length < 2){
                        this.form.achievements.name.push(this.inputFields[0].value);
                        this.form.achievements.date.push(this.inputFields[0].date);
                    } else {
                        for(let i = 0; i < this.inputFields.length; i++){
                            this.form.achievements.name.push(this.inputFields[i].value);
                            this.form.achievements.date.push(this.inputFields[i].date);
                        }
                    }
                }
              try {
                const response = await axios_client.post('employees', this.form)
                const rout = useRoute()
                this.$router.push('/allEmployee');
              } catch (errors) {
                this.error = errors.response.data.message
              }
            },
            addInputField() {
                this.inputFields.push({ value: '' }); // Add a new input field to the list
            },
            async get_departments(){
                this.departments = await axios_client.get('/departments');
            }
        }
    }
</script>