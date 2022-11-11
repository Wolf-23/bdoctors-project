<template>
  <div class="container">
    <div class="d-flex justify-content-between">
      <img src="" alt="" class="rounded-circle">
      <h2>name</h2>
    </div>
    <div>
      <h3>INFORMAZIONI</h3>
      <div class="container">
        <h4>INDIRIZZO</h4>
        <span></span>
        <h4>SPECIALIZZAZIONI</h4>
        <span></span>
        <h4>PRESTAZIONI OFFERTE</h4>
        <span></span>
      </div>
    </div>
    <div>
      <h3>CONTATTAMI</h3>
      <span>email</span>
      <span>telefono</span>
      <button>invia messaggio</button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'MyDoctors',
    methods: {
      data() {
        return {
          profiles: []
        }
      },
      getData(){
                
                axios.get('api/users')
                .then( resolve => {
                  this.profiles = resolve.data.results; 
                  
                });
              }
    
    }
}
</script>

<style>

</style>