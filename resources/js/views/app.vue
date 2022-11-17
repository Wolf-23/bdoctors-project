<template>
  <div>
    <HeaderComponent />
    <MainComponent />
    
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
  
</style>