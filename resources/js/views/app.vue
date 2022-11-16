<template>
  <div>
    <HeaderComponent />
    <MainComponent class="main_color"/>
    
  </div>
</template>

<script>
import HeaderComponent from '../components/HeaderComponent.vue';
import MainComponent from '../components/MainComponent.vue';


export default {
    components: { HeaderComponent, MainComponent}
}
</script>

<style scoped lang="scss">
  .main_color{
    background-color: #90b4ce;
    height: 100%;
  }
</style>