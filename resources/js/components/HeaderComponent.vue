<template>
    <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

        <ul class="navbar-nav mr-auto">
             <li class="nav-item active" v-for="(link , index) in menu" :key="index">
                 <router-link class="nav-link" :to="{name: link.routeLink}">{{link.name}}</router-link>
             </li>
        </ul>
 
        <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                 <a href="http://127.0.0.1:8000/login" class="nav-link">{{'Login'}}</a>
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
                     name: 'Home ',
                     routeLink: 'home'
                 },
                 {
                     name: 'Blog',
                     routeLink: 'blog'
                 },
                 {
                     name: 'Contacts',
                     routeLink: 'contacts'
                 },
             ]
         }
     }
 }
 </script>
 
 <style>
 </style>
 Footer
 © 2022 GitHub, Inc.
 Footer navigation
 Terms
 