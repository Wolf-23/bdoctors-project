<template>
    <div>
      <div class="eb_jumbotron px-0 container-fluid">
        <img src="/images/graphics/wave.svg" alt="">
      </div>
      <div class="eb_jumbo container-fluid px-0"></div>
      <div class="container-fluid">
        <div class="eb_height">
          <div class="container shadow-drop-2-center home_jumbo px-0 m-auto">
            <div class="row eb_space">
              <div class="col-12 col-lg-5 flex-lg-column justify-content-center eb_border">
                <div class="eb_img">
                    <img class="img-fluid" src="/images/graphics/illustrazione-vaccinazione.png" alt="">
                </div>
                <div class="d-flex mb-4 justify-content-center bg-dark align-items-center">
                  <h1 class="site_logo text-light">BDoctors!*!</h1>
                </div>
                <h2 class="text-center">Trova i migliori specialisti della tua città!</h2>
        
                <div class="home_search position-relative" role="search">

                    <input v-model="searchInput" class="input_search border-0 position-relative text-center" type="text" placeholder="cerca..." aria-label="Search">
                    <button class="btn_search border-0" type="">Cerca</button>

                    <div style="" class="out-doctors position-absolute">    
                        <div class="wrap-doctors" :class="searchInput == '' ? 'd-none' :' ' " v-for="(profile, index) in filteredSearch" :key="index">
                            <div>
                                <router-link :to="{name:'single-profile', params:{slug:profile.slug}}" class="list-group-item list-group-item-action list_profile d-flex justify-content-between align-items-center">

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
            <div class="d-none d-lg-flex eb_dott">

            </div>
            <div class="col-12 d-lg-flex col-lg-5 pb-0 pt-3">
                  <div class="slogan d-flex flex-column justify-content-between">
                      <h2 class="h1 eb_fs text-center pl-2 text-lg-left">Sei stufo di fare la fila?</h2>
                      <p class="text-center pl-2 text-lg-left">Affidati a <b>Bdoctors</b>, i migliori specialisti della tua città!</p>
                      <p class="text-square bg-light mx-2"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Non delectus rerum accusamus! Quas, magni corporis eveniet omnis quisquam qui tenetur?</p>
                      <p class="pl-2 h5">Dr. Girolamo Visconti</p>
                      <div class="img-wrap">
                        <img src="/images/graphics/DottorVisconti.png" alt="">
                      </div>
                  </div>
            </div>
            </div>
          </div>
        </div>
                <!-- <div class="px-5 left_side">
                    
                </div>
                <div class="right_side px-4">
                  
      
                </div> -->
    

    
    <div class="ourDoctors mt-5">
      <h1 class="mt-5 py-4">Specialisti in Evidenza</h1>

      <input class="d-none" type="range" v-model="mediaVoto" min="1" max="5" name="mediaVoto" id="mediaVoto">
      <div class="filters-wrapper d-flex m-auto col-6 ">
        <div class="filters mb-5 mr-2">
          <h4>Usa i Filtri</h4>
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
        

      <div class="my_cards pb-5">
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
    filteredSearch: function(){
      this.filteredAvg();
      
      //filtraggio per specializzazione che include...as....
      return this.profiles.filter(profile => {
        for(let i = 0 ; i < profile.specializations.length; i++){
          if(profile.specializations[i].name.toLowerCase().includes(this.searchInput.toLowerCase())){
            console.log(profile)
            let avgVoteFinal = console.log(profile.avg); 
            //1 Return filtraggio specializzazioni
            if(profile.reviews.length >= this.reviewsCheck){
              if(profile.avg >= this.mediaVoto)
              return profile.specializations[i].name.toLowerCase().includes(this.searchInput.toLowerCase());  
            }
            
  
            //2 Return filtraggio numero recensioni 
            // && profile.reviews.length >= this.reviewsCheck

            //3 Return filtraggio per media voto con dati recuperati da filteredAvg()
            // &&  profile.avg >= this.mediaVoto;
            

          }
        }   
      });
    },    
  },

  mounted(){
    this.getData()
    
  },

  methods: {

    checkReviews(){

      return profile.reviews.length >= this.reviewsCheck
    },

    checkVote(){

      return profile.avg >= this.mediaVoto
    },

    aMethod(n){
      this.mediaVoto = n;
    },

    filteredAvg(){
      this.profiles.forEach( profile => {
        this.avgVote.forEach( avg => {
          if(avg.user_id == profile.id){
          return profile.avg = avg.avgVote
        }

        if(profile.avg == undefined){
          return profile.avg = 1;
        }
        })
        
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
  input{
    border-radius: 10px;
    outline-color: #3da9fc;
    border: none;
  }

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

