<template>
  <div class="">
    
    
    <form class="d-flex justify-content-center mt-5 advanced_search" role="search">
      <input class="col-4  text-center form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    
      <div class="search_list" v-for="(profile, index) in profiles" :key="index">
       <span> {{profile.name}} {{profile.surname}}</span> 
      </div>
    
  </div>
</template>

<script>
import axios from 'axios';

export default {

  name: 'MyHome',
  data(){
    return {
      profiles: []
    }
  },
  
  computed(){
      
  },
  mounted(){
    this.getData()
  },
  methods: {
    getData(){
                
      axios.get('api/users')
      .then( resolve => {
        this.profiles = resolve.data.results;  
      });

      
    },
   
    filteredSearch(){
      return this.contacts.filter((contatto)=>{
      return contatto.name.toLowerCase().includes(this.mySearchValue.toLowerCase())
      })
            
    }
  }
};
</script>

<style>

</style>