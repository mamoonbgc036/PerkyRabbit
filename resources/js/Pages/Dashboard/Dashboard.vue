<template>
   <DashboardLayout :image="image">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
   </DashboardLayout>
</template>
<script>
import DashboardLayout from './DashboardLayout.vue';
import axios from 'axios';
  export default{
    data(){
      return{
        image : ''
      }
    },
    components:{
      DashboardLayout
    },
    mounted(){
      this.get_image();
    },
    methods:{
     get_image(){
      axios.get('/admin/image')
        .then((response)=>{
          this.image = response.data.image
          console.log(this.image);
        })
     }
    }
  }
</script>