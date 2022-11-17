<template>
    <div class="position-relative container-fluid">
        <div class="eb_height">
            <div class="eb_shadow"></div>
            <div class="home_jumbo">
      
                <div class="px-5 left_side ">
                    <div class="img-wrap d-flex">
                        <img class="" src="/images/graphics/illustrazione-vaccinazione.png" alt="">
                    </div>
            
                    <h1 class="site_logo">BDoctors!*!</h1>
                    <h1>Torva i migliori specialisti della tua città!</h1>
            
                    <div class="home_search pt-3" style="position:relative;" role="search">

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
                <div class="right_side px-4">
                  <div class="slogan">
                    <h1>Sei stufo di fare la fila?</h1>
                    <p>Affidati a <b>Bdoctors</b>, i migliori specialisti della tua città!</p>
                    <p class="text-square"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Non delectus rerum accusamus! Quas, magni corporis eveniet omnis quisquam qui tenetur?</p>
                    <p>Dr. Girolamo Visconti</p>
                  </div>
                  <div class="img-wrap">
                  </div>
      
                </div>
            </div>
    

    
  </div>
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

      mediaVoto: 0,
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
            //1 Return filtraggio specializzazioni
            if(profile.reviews.length >= this.reviewsCheck){
              console.log(profile);
              if(profile.avg >= this.mediaVoto)
              return profile.specializations[i].name.toLowerCase().includes(this.searchInput.toLowerCase());  
            }
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
            profile.avg = avg.avgVote
            if(profile.avg == undefined){
              profile.avg = 1
            } else {
              return profile.avg = avg.avgVote
            }
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

