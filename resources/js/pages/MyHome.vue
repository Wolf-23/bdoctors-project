<template>
  <div class="container">
    
    
    <form class="d-flex justify-content-center mt-5 advanced_search" role="search">
      <input v-model="searchInput" @keyup="inputValue" class=" text-center form-control me-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    

      <div :class="searchInput == '' ? 'd-none' :' ' " v-for="(profile, index) in filteredSearch" :key="index">
        <div>
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
      newArray: [],
      searchInput: '',

      

    }
  },
  
  computed:
  {
    filteredSearch: function(){
      
     
      return this.profiles.filter(profile => {
        console.log(profile);
        for(let i = 0 ; i < profile.specializations.length ; i++ ){
          if(profile.specializations[i].name.includes(this.searchInput)){
            return profile.specializations[i].name.includes(this.searchInput);
          }
          
        }
        
      })
         
    }  
  },

  mounted(){
    this.getData()
  },

  methods: {

    
    

    inputValue(){
      this.searchInput = this.searchInput
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