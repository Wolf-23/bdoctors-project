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

    <div>
    <form @submit.prevent='sendreview()' class="d-flex flex-column col-6">
        <label for="name">Nome</label>
        <input type="text" v-model="name" name="name" id="name">

        <label for="surname">Cognome</label>
        <input type="text" v-model="surname" name="surname" id="surname">

        <select v-model='vote' name="" id="">
          <option value="1">1</option>
          <option value="1">2</option>
          <option value="1">3</option>
          <option value="1">4</option>
          <option value="1">5</option>
        </select>
        <label for="review_text">Recensione</label>
        <textarea v-model="review_text" name="review_text"  id="review_text"></textarea>
        <button type="submit">Invia</button>
    </form>
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
        

        name: null,
        surname: null,
        review_text: null,
        vote: 4,
        idProfile: null

      }
    },

    mounted(){
      this.getSingleProfile();
    
    },

    methods: {

      sendreview(){
        
        
        axios.post('/api/users/review/', { 
            'name': this.name,
            'surname': this.surname,
            'review_text': this.review_text,
            'vote': this.vote,
            'user_id': this.idProfile
          }).then( param => {
               this.status = param.data.status
            });
      },

      getSingleProfile(){

        let slug = this.$route.params.slug
        console.log(slug)

        axios.get('/api/users/' + slug)
      .then( response => {
        this.profile = response.data.resolve;
        this.idProfile = response.data.resolve.id 
        console.log(this.profile) 
      })
      .catch(error => {
          this.$router.push({name: 'not-found'})
        });
        
      },

      

    }

    
}
</script>

<style>

</style>