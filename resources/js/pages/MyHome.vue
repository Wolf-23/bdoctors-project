<template>
  <div class="container">
    
    
    <form class="d-flex justify-content-center mt-5 advanced_search" role="search">
      <input v-model="searchInput" @keyup="myFunction" class="  text-center form-control me-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    

      <div class="search_list" v-for="(profile, index) in profiles" :key="index">
        <div class="" :class="profile.name.toLowerCase().includes(searchInput.toLowerCase()) ? 'visible' : 'd-none'">
          <router-link to="#" class="list-group-item list-group-item-action">{{profile.name}} {{profile.surname}}</router-link> 
          
        </div>
        
       
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
      message: 'Hello',
      reversedMessage: '',
    }
  },
  
  computed:
  {
  
    
  
  },
  mounted(){
    this.getData()
  },

  methods: {

    searchFilter(){
      this.profiles.forEach(profile => {
        if( profile.name.includes(this.searchInput)){
          
        }
      })
    },

    myFunction(){
      this.searchInput = this.searchInput
      this.profiles.forEach
      console.log(this.searchInput)
      console.log(this.profiles)
      
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