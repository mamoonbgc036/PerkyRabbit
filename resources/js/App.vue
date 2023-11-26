<!-- App.vue -->

<template>
    <Layout>
        <router-view></router-view>
    </Layout>
</template>
  
  <script>
  import Layout from './Pages/Layout.vue';
  export default {
    components:{
        Layout
    }
  };
  </script>
  
  <style>
  /* Styles for your app */
  </style>
  