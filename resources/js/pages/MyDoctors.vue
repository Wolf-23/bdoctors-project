<template>
  <div class="container pt-5 px-5">
    <h1 class="mt-2 text-center text-md-left">Dottor. <span class="font-weight-bold">{{profile.name}} {{profile.surname}}</span></h1>
    <div class="row justify-content-around align-items-center">
      <div class="col-10 col-lg-5 eb_square">
          <img :src=" profile.profile_pic == false ? '/images/avatar.png' : '/storage/'+ profile.profile_pic" alt="" class="img-fluid">
      </div>
      <div class="flex-column col-10 col-lg-5">
          <div>
            <h2 class="mt-3 eb_color text-center text-md-left font-weight-bold">INFORMAZIONI</h2>
            <div class="container border-left border-primary my-5">
              <h5 class="font-weight-bold pl-2 pl-md-0 text-secondary">INDIRIZZO</h5>
              <span class="textGray pl-2 pl-md-0">{{profile.address}}</span>
              <h5 class="mt-2 pl-2 pl-md-0 font-weight-bold text-secondary">SPECIALIZZAZIONI</h5>
              <span  class="textGray pl-2 pl-md-0" v-for="(spec , index) in profile.specializations" :key = "index">{{spec.name}} </span>
              <h5 class="mt-2 pl-2 pl-md-0 font-weight-bold text-secondary">PRESTAZIONI OFFERTE</h5>
              <span class="textGray pl-2 pl-md-0">{{profile.services}}</span>
            </div>
          </div>
          <h2 class="mt-3 text-center text-md-left eb_color font-weight-bold">CONTATTAMI</h2>
          <div class="container my-5 border-left border-primary">
              <h5 class="pl-2 pl-md-0 mt-2 font-weight-bold text-secondary">E-MAIL</h5>
              <span class="pl-2 pl-md-0 textGray">{{profile.email}}</span>
              <h5 class="pl-2 pl-md-0 mt-2 font-weight-bold text-secondary">TELEFONO</h5>  
              <span class="pl-2 pl-md-0 textGray">{{profile.phone}}</span><br>
              <router-link :to="{name:'MessageForm'}" class="ml-2 ml-md-0 btn btn-group mt-2">Invia messaggio</router-link>
          </div>
          
      </div>
    </div>
    

    <div class="text-center">
      <form @submit.prevent='sendreview()'>
        <div class="d-flex flex-column pt-4">
          <h2 class="my-5 font-weight-bold eb_color">RECENSISCI IL TUO DOTTORE</h2>
          <label for="name" class="text-secondary h5 text-left">Nome</label>
          <input type="text" class="p-2" v-model="name" name="name" id="name">

          <label class="mt-3 text-secondary h5 text-left" for="surname">Cognome</label>
          <input type="text" class="p-2" v-model="surname" name="surname" id="surname">

          <label class="mt-3 text-secondary h5 text-left" for="Voto">Voto</label>
          <select class="border-0 p-2" v-model="vote" name="vote" id="vote">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>

          <label class="mt-3 text-secondary h5 text-left" for="review_text">Recensione</label>
          <textarea v-model="review_text" name="review_text" class="px-2 pt-1"  id="review_text" rows="6"></textarea>

        </div>
          <button type="" :disabled="sending" class="btn mt-3 mb-5">Invia</button>
      </form>
    </div>
    <div class="d-flex justify-content-center justify-content-md-end">
      <router-link :to="{name: 'MyHome'}" class="btn mb-3"><i class="fa-solid fa-arrow-left"></i> Torna alla Home</router-link>
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
        idProfile: null,
        sending: false
      }
    },

    mounted(){
      this.getSingleProfile();
    },

    methods: {
      sendreview(){
        this.sending = true;
        axios.post('/api/users/review/', { 
            'name': this.name,
            'surname': this.surname,
            'review_text': this.review_text,
            'vote': this.vote,
            'user_id': this.idProfile
          }).then( param => {
              this.sending = false;
               this.status = param.data.status
               if(this.status){
                    this.name = '';
                    this.surname = '';
                    this.review_text = '';
                    this.vote = '';
                    this.idProfile = '';
              }
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
  
  .eb_color{
    color: #0A4067;
  }

  .textGray{
    color:#5f6c7b;
  }
  input, textarea, select{
    border-radius: 10px;
    outline-color: #3da9fc;
    border: none;
  }
  
  .btn{
    background-color:#0A4067;
    color: whitesmoke;
  }

</style>