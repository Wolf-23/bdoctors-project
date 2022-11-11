<template>
  <div class="">
    
    
    <form class="d-flex justify-content-center mt-5 advanced_search" role="search">
      <input v-model="searchInput" @keyup="myFunction" class="col-4  text-center form-control me-2" type="search" placeholder="Search" aria-label="Search">
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
      profiles: [],
      filteredRes: [],
      searchInput: '',
    }
  },
  
  computed:
  {
    filteredSearch() {
      this.searchInput = this.searchInput
      return this.profiles.filter((profile) => {
        return profile.name.toLowerCase().includes(this.searchInput.toLowerCase())
      }); 
    }
    
  },
  mounted(){
    this.getData()
  },

  methods: {
    myFunction(){
      this.searchInput = this.searchInput
      console.log(this.searchInput)
      console.log(this.profiles)
      return this.profiles.filter((profile) => {
        return profile.name.toLowerCase().includes(this.searchInput.toLowerCase())
      }); 
       
    }, 
    getData(){
                
      axios.get('api/users')
      .then( resolve => {
        this.profiles = resolve.data.results; 
        
      });

      
    },
   
    
  }
};
</script>

<style>

</style>