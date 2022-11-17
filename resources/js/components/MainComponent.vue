<template>
  <div class="main_color">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
    name: 'MainComponent'
}
</script>

<style scoped lang="scss">
  .main_color{
    background-color: whitesmoke;
    height: calc(100vh - 71px);
    overflow-y: auto;
    &::-webkit-scrollbar { 
        width: 6px;
    }
    
    &::-webkit-scrollbar-track {
      background: whitesmoke;        /* color of the tracking area */
    }
    
    &::-webkit-scrollbar-thumb {
      background-color: #094067;    /* color of the scroll thumb */
      border-radius: 30px;       /* roundness of the scroll thumb */
      opacity: 1;
      height: 10px;
    }
  }
</style>