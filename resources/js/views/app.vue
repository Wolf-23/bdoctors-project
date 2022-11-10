<template>
  <div>
    <HeaderComponent />
    <MainComponent />
    
  </div>
</template>

<script>
import HeaderComponent from '../components/HeaderComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import MyHome from '../pages/MyHome.vue';


export default {
    components: { HeaderComponent, MainComponent, MyHome }
}
</script>

<style>

</style>