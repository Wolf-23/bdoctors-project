<template>
  <div>
    <HeaderComponent />
    <MainComponent class="main_color"/>
    <FooterComponent />
    
  </div>
</template>

<script>
import FooterComponent from '../components/FooterComponent.vue';
import HeaderComponent from '../components/HeaderComponent.vue';
import MainComponent from '../components/MainComponent.vue';


export default {
    components: { HeaderComponent, MainComponent, FooterComponent}
}
</script>

<style scoped lang="scss">
  .main_color{
    background-color: #90b4ce;
    height: 100%;
  }
</style>