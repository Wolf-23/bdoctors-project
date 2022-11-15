<template>
  <div class="container mt-5">
    <router-link :to="{name: 'MyHome'}">Torna alla Home</router-link>
    <div class="d-flex justify-content-between">
      <img src="" alt="" class="rounded-circle">
      <h2>{{profile.name}} {{profile.surname}}</h2>
    </div>
    <div>
      <h3 class="mt-3">INFORMAZIONI</h3>
      
      <div class="container mt-5">
        <h5>INDIRIZZO</h5>
        <span>{{profile.address}}</span>
        <h5>SPECIALIZZAZIONI</h5>
        <span v-for="(spec , index) in profile.specializations" :key = "index">{{spec.name}} </span>
        <h5>PRESTAZIONI OFFERTE</h5>
        <span>{{profile.services}}</span>
      </div>
    </div>
    <div class="mt-5">
      <h3>CONTATTAMI</h3>
      <span>email</span>
      <span>telefono</span>
      <router-link :to="{name:'MessageForm'}" class="btn btn-primary">invia messaggio</router-link>
    </div>
  </div>
  
</template>

<script>
import axios from 'axios';
export default {
    name: 'MyDoctors',
    data() {
      return {
        profile: [],
        slug: null
      }
    },

    mounted(){
      this.getSingleProfile();
    },

    methods: {

      getSingleProfile(){

        let slug = this.$route.params.slug
        console.log(slug)

        axios.get('/api/users/' + slug )
      .then( response => {
        this.profile = response.data.resolve; 
        console.log(this.profile) 
      })
        .catch((error => {
          this.$router.push({name: 'not-found'})
        }));

        
      },

      

    }

    
}
</script>

<style>

</style>