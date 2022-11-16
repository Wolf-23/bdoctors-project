<template>
<div>
  <div class="home_jumbo">
    
    <div class="px-5 left_side ">
      <div class="img-wrap d-flex">
        <img class="" src="/images/graphics/illustrazione-vaccinazione.png" alt="">
      </div>
      
        <h1 class="site_logo">BDoctors!*!</h1>
        <h1>Torva i migliori specialisti di Milano.</h1>
      
      <div class="home_search" style="position:relative;" role="search">

        <input v-model="searchInput" class="input_search" type="text" placeholder="Search" aria-label="Search">
        <button class="btn_search" type="">Search</button>

        <div style="" class="out-doctors">    
        <div class="wrap-doctors" :class="searchInput == '' ? 'd-none' :' ' " v-for="(profile, index) in filteredSearch" :key="index">
          <div>
            <router-link :to="{name:'single-profile', params:{slug:profile.slug}}" class="list-group-item list-group-item-action list_profile">

              <div class="img-wrapper_results">
                <img class="card_img_top" :src=" profile.profile_pic == false ? 'images/avatar.png' : 'storage/'+ profile.profile_pic" alt="Card image cap">
              </div>

              <div class="name_search_results">
                {{profile.name}} {{profile.surname}}
              </div>

              <div class="specializations_search_results">
                <span>{{profile.specializations[0].name}}</span>
              </div>

            </router-link> 
          </div>
        </div>
      </div>
    </div>
      
    </div>

    <div class="right_side">
      <div class="slogan">
        <h1>Sei stufo di fare la Fila?</h1>
        <p>Affidati a <b>Bdoctors</b>, i migliori specialisti di Milano.</p>
        <p class="text-square"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Non delectus rerum accusamus! Quas, magni corporis eveniet omnis quisquam qui tenetur?</p>
        <p>Dr. Girolamo Visconti</p>
      </div>
      <div class="img-wrap">
        <img class="jumbo_img" src="/images/graphics/DottorVisconti.png" alt="myImg">
      </div>
      
    </div>
  </div>
  <div class="ourDoctors">
      <h1 class="mt-5 py-4">Specialisti in Evidenza</h1>

      <label for="mediaVoto">Voto: {{mediaVoto}}</label>
      <input type="range" v-model="mediaVoto" min="0" max="5" name="mediaVoto" id="mediaVoto">
      
      <label for="reviewsRange">{{reviewsCheck}}</label>
      <input type="range" v-model="reviewsCheck" min="0" max="10" name="reviewsRange" id="reviewsRange">

      <div class="my_cards">
        <div class="my_card_wrapper col-2 ml-5" v-for="(profile, index) in filteredSearch" :key="index">
          <div class="my_card">
            <div class="img-wrapper">
              <img class="card_img_top" :src=" profile.profile_pic == false ? 'images/avatar.png' : 'storage/'+ profile.profile_pic" alt="Card image cap">
            </div>
            <div class="card_body">
              <h5 class="card_title">Dr. {{profile.name}} <br> {{profile.surname}}</h5>
              <p class="card_text">{{profile.specializations[0].name}}</p>
              <router-link class="btn btn-primary" :to="{name:'single-profile', params:{slug:profile.slug}} ">Profilo</router-link>
            </div>
          </div>
        </div>
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
      searchInput: '',
      slug: null,
      reviewsCheck: 0,

      mediaVoto: 0,
      mediaVotoProfilo: null,
      avgVote: [''],
    }
  },
  
  computed:
  {
    filteredSearch: function(){
      
      return this.profiles.filter(profile => {
        
        for(let i = 0 ; i < profile.specializations.length; i++){
          if(profile.specializations[i].name.toLowerCase().includes(this.searchInput.toLowerCase())){
            return profile.specializations[i].name.toLowerCase().includes(this.searchInput.toLowerCase())
            && profile.reviews.length >= this.reviewsCheck;
          }
        }   
        

        
        

        // for(let i = 0; i < this.profiles.length; i++){
        //   let divisore = this.profiles[i].reviews.length
        //   let somma = 0;
        //   let x = 0;

        //   while( x < divisore ){
        //     somma += this.profiles[i].reviews[x].vote;
        //     x++
        //   } 
        //   this.mediaVotoProfilo = Math.floor(somma / divisore) 
        // }
          

      });
    },

    filteredVote() {

      for(let i = 0; i < this.profiles.length; i++){
          let divisore = this.profiles[i].reviews.length
          let somma = 0;
          let x = 0;

          while( x < divisore ){
            somma =+ this.profiles[i].reviews[x].vote;
            x++
          }
          
          return (divisore / somma)
        }

      
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
        this.avgVote = resolve.data.media;
        console.log(this.profiles)
        console.log(this.avgVote)
        
        
        
      });

      
    },
  }
};
</script>

<style lang="sass" scoped>

</style>

