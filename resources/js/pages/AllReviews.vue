<template>
    <div class="container-fluid bg-light my-5">
        <ReviewComponent/>
        <div class="m-auto text-center pt-4">
            <router-link :to="{name: 'single-profile'}" class="btn"><i class="fa-solid fa-arrow-left"></i> Torna al Profilo</router-link>
        </div>
    </div>
</template>

<script>
import ReviewComponent from '../components/ReviewComponent.vue'
export default {
  components: { ReviewComponent },
    name: 'AllReviews'
}
</script>

<style lang="scss" scoped>
    .btn{
        background-color: #0A4067;
        color: whitesmoke;
        &:hover{
            background-color: whitesmoke;
            color: #0A4067;
            outline: 2px solid #0A4067;
        }
    }
</style>