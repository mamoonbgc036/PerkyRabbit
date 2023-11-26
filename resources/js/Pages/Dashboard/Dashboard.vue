<template>
   <DashboardLayout>
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
   </DashboardLayout>
</template>
<script>
import DashboardLayout from './DashboardLayout.vue';
import axios_client from '../../axios-client';
  export default{
    data(){
      return{
        image : ''
      }
    },
    components:{
      DashboardLayout
    },
    methods:{
     get_image(){
      axios_client.get('/admin/image')
        .then((response)=>{
          this.image = response.data
        })
     }
    }
  }
</script>