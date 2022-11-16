<template>
  <div class="container pt-5">
    <router-link :to="{name: 'MyHome'}" class="btn btn-primary mb-3">Torna alla Home</router-link>
    <div class="d-flex justify-content-between">
      <div>
          <h1 class="mt-2">Dottor. {{profile.name}} {{profile.surname}}</h1>
          <div class="d-flex flex-wrap border eb_square img-fluid m-auto rounded-circle">
            <img src="" alt="" class="rounded-circle">
          </div>
      </div>
      <div>
        <h2 class="mt-3 ml-3">INFORMAZIONI</h2>
      <div class="container mt-5">
        <h5>INDIRIZZO</h5>
        <span class="textGray">{{profile.address}}</span>
        <h5 class="mt-2">SPECIALIZZAZIONI</h5>
        <span  class="textGray" v-for="(spec , index) in profile.specializations" :key = "index">{{spec.name}} </span>
        <h5 class="mt-2">PRESTAZIONI OFFERTE</h5>
        <span class="textGray">{{profile.services}}</span>
      </div>
      </div>
    </div>
    <div class="my-5">
      <h3 class="mt-1 ml-3">CONTATTAMI</h3>
      <p class="ml-3">E-MAIL :  
        <span class="textGray">{{profile.email}}</span>
      </p>
      <p class="ml-3">TELEFONO :  
        <span class="textGray">{{profile.phone}}</span>
      </p>
      <router-link :to="{name:'MessageForm'}" class="btn btn-primary ml-3">invia messaggio</router-link>
    </div>

    <div>
      <form @submit.prevent='sendreview()'>
        <div class="d-flex flex-column col-6">
          <h3 class="my-5">RECENSISCI IL TUO DOTTORE</h3>
          <label for="name" class="textGray">Nome</label>
          <input type="text" v-model="name" name="name" id="name">

          <label class="mt-3 textGray" for="surname">Cognome</label>
          <input type="text" v-model="surname" name="surname" id="surname">

          
          <label class="mt-3 textGray" for="review_text">Recensione</label>
          <textarea v-model="review_text" name="review_text"  id="review_text" rows="6"></textarea>

        </div>
          <a href="" type="submit" class="btn btn-primary mt-3 ml-3 mb-5">Invia</a>
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
        vote: null,
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

<style scoped lang="scss">
  .eb_square{
    width: 200px;
    height: 200px;
  }
  h1, h2, h3, h5, p{
    color: #094067
  }
  .textGray{
    color:#5f6c7b;
  }
  input, textarea{
    border-radius: 10px;
    outline-color: #3da9fc;
    border: none;
  }

</style>