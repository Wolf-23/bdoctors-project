<template>
  <div class="container mt-5">
    <div class="d-flex justify-content-between">
      <img src="" alt="" class="rounded-circle">
      <h2>name</h2>
    </div>
    <div>
      <h3 class="mt-3">INFORMAZIONI</h3>
      <div class="container mt-5">
        <h5>INDIRIZZO</h5>
        <span></span>
        <h5>SPECIALIZZAZIONI</h5>
        <span></span>
        <h5>PRESTAZIONI OFFERTE</h5>
        <span></span>
      </div>
    </div>
    <div class="mt-5">
      <h3>CONTATTAMI</h3>
      <span>email</span>
      <span>telefono</span>
      <button class="btn btn-primary">invia messaggio</button>
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