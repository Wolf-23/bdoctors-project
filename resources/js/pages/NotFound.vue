<template>
    <div class="container-fluid eb_height flex-column d-flex align-items-end justify-content-center">
        <div class="mainbox d-flex justify-content-end mr-3">
            <div class="err">4</div>
            <i class="far fa-question-circle fa-spin"></i>
            <div class="err2">4</div>
        </div>
        <div class="d-flex mt-4 justify-content-end mr-3">    
            <h3>Page Not Found!</h3>
        </div>
        <div class="d-flex mt-4 mr-3">
            <router-link :to="{name: 'MyHome'}" class="btn mb-3"><i class="fa-solid fa-arrow-left"></i> Torna alla Home</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'NotFound'
}
</script>

<style lang="scss" scoped>
    .eb_height{
        background-image: url('/images/graphics/404.png');
        background-size: contain;
        background-position-x: left;
        background-repeat: no-repeat;
        .mainbox {
            .err {
                color: #0A4067;
                font-family: 'Nunito Sans', sans-serif;
                font-size: 14rem;
            }

            .far {
                font-size: 11.5rem;
                color: #0A4067;
            }

            .err2 {
                color: #0A4067;
                font-family: 'Nunito Sans', sans-serif;
                font-size: 14rem;
            }
        }

        h3 {
            text-align: center;
            font-family: 'Nunito Sans', sans-serif;
            font-size: 3rem;
            color: #0A4067;
        }
        .btn{
            background-color: #0A4067;
            color: whitesmoke;
            &:hover{
                background-color: whitesmoke;
                color: #0A4067;
                outline: 2px solid #0A4067;
            }
        }
        
    }
</style>