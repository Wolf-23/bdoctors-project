<template>
    <div class="navbar px-3 navbar-expand-md shadow-sm">

        <ul class="navbar-nav mr-auto">
             <li class="nav-item active" v-for="(link , index) in menu" :key="index">
                 <router-link class="nav-link btn eb_bg text-secondary" :to="{name: link.routeLink}">{{link.name}}</router-link>
             </li>
        </ul>
 
        <div class="navbar navbar-expand-md shadow-sm">
        <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                 <a href="http://127.0.0.1:8000/login" class="nav-link btn eb_bg text-secondary">{{'Login'}}</a>
             </li>
        </ul>
     
        </div>
    </div>
 </template>
 
 <script>
 export default {
     name: 'HeaderComponent',
     data(){
         return {
             menu: [
                 {
                     name: 'Home',
                     routeLink: 'MyHome'
                 },
                 
             ]
         }
     }
 }
 </script>
 
 <style scoped lang="scss">
    .navbar{
        background-color:#094067;
        .eb_bg{
            background-color: transparent;
        }
    }

 </style>
 