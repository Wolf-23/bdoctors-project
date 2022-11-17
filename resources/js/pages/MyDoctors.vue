<template>
  <div class="container pt-5 px-5">
    <router-link :to="{name: 'MyHome'}" class="btn btn-primary mb-3">Torna alla Home</router-link>
    <h1 class="mt-2">Dottor. {{profile.name}} {{profile.surname}}</h1>
    <div class="d-flex justify-content-between align-items-center">
      <div class="d-flex border border-2 eb_square img-fluid rounded-circle">
          <img src="" alt="" class="rounded-circle">
      </div>
      <div class="d-flex-flex-column">
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
          <div class="my-5">
              <h2 class="mt-1">CONTATTAMI</h2>
              <h5 class="">E-MAIL</h5>
              <span class="textGray">{{profile.email}}</span>
              <h5 class="">TELEFONO</h5>  
              <span class="textGray">{{profile.phone}}</span>
              <router-link :to="{name:'MessageForm'}" class="btn btn-primary ml-3">invia messaggio</router-link>
          </div>
      </div>
    </div>
    

    <div class="text-center">
      <form @submit.prevent='sendreview()'>
        <div class="d-flex flex-column pt-4">
          <h2 class="my-5">RECENSISCI IL TUO DOTTORE</h2>
          <label for="name" class="textGray h5 text-left">Nome</label>
          <input type="text" v-model="name" name="name" id="name">

          <label class="mt-3 textGray h5 text-left" for="surname">Cognome</label>
          <input type="text" v-model="surname" name="surname" id="surname">

          
          <label class="mt-3 textGray h5 text-left" for="review_text">Recensione</label>
          <textarea v-model="review_text" name="review_text"  id="review_text" rows="6"></textarea>

        </div>
          <button href="" type="submit" class="btn btn-primary mt-3 ml-3 mb-5">Invia</button>
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
    width: 400px;
    height: 400px;
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