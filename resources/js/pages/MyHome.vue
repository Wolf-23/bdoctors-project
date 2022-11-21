<template>
  <div>
    <div class="eb_jumbotron px-0 container-fluid">
      <img src="/images/graphics/wave.svg" alt="">
    </div>
    
    <div class="eb_jumbo container-fluid px-0"></div>
    <div class="container-fluid px-0">
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

      <JumboComponent/>


  
      <div class="ourDoctors mt-5">
    <h1 class="mt-5 py-4">Specialisti in Evidenza</h1>
    
    <div class="filters-wrapper d-flex m-auto col-8 ">
      <input class="d-none" type="range" v-model="mediaVoto" min="1" max="5" name="mediaVoto" id="mediaVoto">
      <select v-model="selectSpecialization">
        <option value=""></option>
        <option v-for="(specialization , index) in specializations" :key="index" :value="specialization.id">{{specialization.name}}</option>
      </select>
      <button @click.prevent="getData()">Cerca</button>
      <div class="filters mb-5 mr-2">
        <h4>Usa i Filtri</h4>
        <div class="votes">
          <button @click="aMethod(0)" :style="mediaVoto == 0? 'background-color:red':''">Disabilita Filtro</button>
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

      

      <div class="my_cards pb-5 d-flex flex-wrap myCards">
        <div class="my_card_wrapper col-2 ml-5 mx-3" v-for="(profile, index) in profiles" :key="index">
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
    <CardHomeComponent/>
  </div>



</template>

<script>
import axios from 'axios';
import CardHomeComponent from '../components/CardHomeComponent.vue';
import JumboComponent from '../components/JumboComponent.vue';

export default {
  components: { JumboComponent, CardHomeComponent },

  name: 'MyHome',
  data(){
    return {
      profiles: [], // chiamata api
      specializations: [],

      selectSpecialization: '', // v-model specialization
      reviewsCheck: 0, //v-model numero recensioni
      avgVote: 1,  //v-model media voti

      myRev: null, //
      mediaVoto: 0,
    }
  },
  
  computed:
  {
    // filteredSearch: function(){
      
      // this.filteredAvg();
      
      //filtraggio per specializzazione che include...as....
  //     return this.profiles.filter(profile => {
  //       for(let i = 0 ; i < profile.specializations.length; i++){
  //         if(profile.specializations[i].name.toLowerCase().includes(this.searchInput.toLowerCase())){
  //           if(this.myRev.length == 0){
  //             return profile.specializations[i].name.toLowerCase().includes(this.searchInput.toLowerCase());
  //           } else {
  //             if(profile.reviews.length >= this.reviewsCheck){
  //               if(profile.avg >= this.mediaVoto){
  //                 return profile.specializations[i].name.toLowerCase().includes(this.searchInput.toLowerCase());
  //               }  
  //             }
  //           }
  //         }
  //       }   
  //     });
  //   },    
  },

  mounted(){
    this.getData()
    this.getSpecializations()
    
  },

  methods: {

    getSpecializations(){
                axios.get('/api/specializations/')
                .then((response) =>{
                    this.specializations = response.data.results
                })  
            }, 

    getData(){
      axios.get('api/users',{
        params:{
          specializationName: this.selectSpecialization,
          // avgVote: this.avgVote,
          reviewsNumber: this.reviewsCheck
        }
      })
      .then( resolve => {
        this.profiles = resolve.data.results;
        console.log(resolve.data);  
      })
      
    }
    
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
          return profile.avg = 0;
        }
        })
        
      })
    },             
  }

</script>


<style lang="scss" scoped>

.input_search_spec {
      position: relative;
      text-align: center;
      height:50px;
      width: 70%;
      border: none;
  }

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

        

        button {

        border: none;
        background-color: rgb(119, 167, 245);
        color: white;
        border-radius: 20px;
        padding: 10px;
        }

}
@media screen and (max-width: 800px) {
  .myCards {
    flex-wrap: nowrap;
    flex-direction: column;
  }
}


</style>




