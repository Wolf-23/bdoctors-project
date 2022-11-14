<template>
  <div>
  <div class="home_jumbo">
    
    <div class="px-5 left_side ">
      <div class="img-wrap d-flex">
        <img class="" src="/images/graphics/illustrazione-vaccinazione.png" alt="">
      </div>
      
        <h1 class="site_logo">BDoctors</h1>
        <h1>Torva i migliori specialisti di Milano.</h1>
      
      <form class="home_search" style="position:relative;" role="search">

        <input v-model="searchInput" @keyup="inputValue" class="input_search" type="text" placeholder="Search" aria-label="Search">
        <button class="btn_search" type="submit">Search</button>

        <div style="" class="out-doctors">    
        <div class="wrap-doctors" :class="searchInput == '' ? 'd-none' :' ' " v-for="(profile, index) in filteredSearch" :key="index">
          <div>
            <router-link to="#" class="list-group-item list-group-item-action list_profile">{{profile.name}} {{profile.surname}}</router-link> 
          </div>
        </div>
      </div>
      </form>
      
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
      <div class="my_cards">
        <div class="my_card_wrapper col-2 ml-5" v-for="(profile, index) in profiles" :key="index">
          <div class="my_card">
            <div class="img-wrapper">
              <img class="card_img_top" :src=" profile.profile_pic == false ? 'images/avatar.png' : 'storage/'+ profile.profile_pic" alt="Card image cap">
            </div>
            <div class="card_body">
              <h5 class="card_title">Dr. {{profile.name}} <br> {{profile.surname}}</h5>
              <p class="card_text">{{profile.specializations[0].name}}</p>
              <router-link class="btn btn-primary" :to="{name:'slug', params:{slug:profile.name}} ">Profilo</router-link>
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
      searchInput: ''
    }
  },
  
  computed:
  {
    filteredSearch: function(){
  
      return this.profiles.filter(profile => {
        for(let i = 0 ; i < profile.specializations.length ; i++ ){
          if(profile.specializations[i].name.includes(this.searchInput)){
            return profile.specializations[i].name.includes(this.searchInput);
          }  
        }
      })
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
      });
    },
  }
};
</script>

<style lang="sass" scoped>

</style>

