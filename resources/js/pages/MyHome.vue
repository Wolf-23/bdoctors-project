<template>
  <div class="pt-5">
  <div class="home_jumbo">
    
    <div class="px-5 left_side ">
      <div class="img-wrap d-flex">
        <img class="" src="/images/graphics/illustrazione-vaccinazione.png" alt="">
      </div>
      
        <h1 class="site_logo">BDoctors!*!</h1>
        
        <h1>Torva i migliori specialisti della tua città!</h1>
        
      
      <div class="home_search" style="position:relative;" role="search">

        <input v-model="searchInput" class="input_search" type="text" placeholder="cerca..." aria-label="Search">
        <button class="btn_search" type="">Cerca</button>

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
        <h1>Sei stufo di fare la fila?</h1>
        <p>Affidati a <b>Bdoctors</b>, i migliori specialisti della tua città!</p>
        <p class="text-square"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Non delectus rerum accusamus! Quas, magni corporis eveniet omnis quisquam qui tenetur?</p>
        <p>Dr. Girolamo Visconti</p>
      </div>
      <div class="img-wrap">
        <img class="jumbo_img" src="/images/graphics/DottorVisconti.png" alt="myImg">
      </div>
      
    </div>
  </div>
  <div class="ourDoctors mt-5">
    <h1 class="mt-5 py-4">Specialisti in Evidenza</h1>

    <input class="d-none" type="range" v-model="mediaVoto" min="1" max="5" name="mediaVoto" id="mediaVoto">
    <div class="filters-wrapper d-flex m-auto col-6 ">
      <div class="filters mb-5 mr-2">
        <h4>Usa i Filtri</h4>
        <!-- <span v-for="(star, index) in 5" :key="index" :style="mediaVoto >= index? 'background-color:yellow;':''" >☆</span> -->
        <div class="votes">
          <button @click="aMethod(0)" :style="mediaVoto == 0? 'background-color:red':''">Disabilità Filtro</button>
          <a @click.prevent class="star" v-for="index in 5" :key="index" @click="aMethod(index)" href ="" :style="mediaVoto >= index? 'color:rgb(260, 210, 143);':''" ><i class="fa-solid fa-star"></i></a>
        </div>
      </div>
      <div class="filters mb-5">
        <div class="num-recensioni d-flex flex-column">
          <label for="reviewsRange"><h5>Numero di Recensioni</h5></label>
          <input type="range" v-model="reviewsCheck" min="0" max="10" name="reviewsRange" id="reviewsRange">
          <span>{{reviewsCheck}}</span>
        </div> 
      </div>
    </div>
      

    <div  v-if='filteredSearch' class="my_cards pb-5">
      <div class="my_card_wrapper col-2 ml-5" v-for="(profile, index) in filteredSearch" :key="index">
        <div class="my_card pb-2">
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

    <div v-else class="">
      non ci sono risultati
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
      
      reviewsCheck: 0,

      mediaVoto: 1,
      avgVote: null,
    }
  },
  
  computed:
  {
    //funzione dedicata al filtraggio
    filteredSearch: function(){

      //funzione che genera la media del voto
      this.filteredAvg();

      //filtraggio per specializzazione che include...
      return this.profiles.filter(profile => {
        for(let i = 0 ; i < profile.specializations.length; i++){
          if(profile.specializations[i].name.toLowerCase().includes(this.searchInput.toLowerCase())){

            //1 Return filtraggio specializzazioni
            return profile.specializations[i].name.toLowerCase().includes(this.searchInput.toLowerCase())
  
            //2 Return filtraggio numero recensioni 
            && profile.reviews.length >= this.reviewsCheck 

            //3 Return filtraggio per media voto con dati recuperati da filteredAvg()
            && profile.avg >= this.mediaVoto;

          }
        }   
      });
    },    
  },

  mounted(){
    this.getData()
    this.mymethods()
  },

  methods: {

    aMethod(n){
      this.mediaVoto = n;
    },

    filteredAvg(){
      this.profiles.forEach( profile => {
        this.avgVote.forEach( avg => {
          if(avg.user_id == profile.id){
          return profile.avg = avg.avgVote
        }
        })
        
      })
    },

    mymethods(){
      this.profiles.forEach( oneProfile => {
        console.log('myProfile')
        console.log(oneProfile);
      })
    },

    inputValue(){
      this.searchInput = this.searchInput
    }, 

    getData(){
                
      axios.get('api/users')
      .then( resolve => {
        this.profiles = resolve.data.results;
        this.avgVote = resolve.data.media;        
      });
    },
  }
};
</script>

<style lang="scss" scoped>

.filters {

  background-color: white;
  padding: 10px 20px 10px 20px;
  border-radius: 20px;
  width: 50%;
  margin:auto;
  

  .votes {

    
    
  }
  

  button {

    border: none;
    background-color: rgb(119, 167, 245);
    color: white;
    border-radius: 20px;
    padding: 10px;
  }
  
}
</style>


