import Vue from 'vue';
import VueRouter from 'vue-router';
import MyHome from './pages/MyHome'
import MyDoctors from './pages/MyDoctors'
Vue.use(VueRouter);


//creo oggetto basato su VueRouter
//importo il componente



const router = new VueRouter({
        mode: 'history',//modalità history(consigliata)
        routes:[
            {
                path: '/',
                name:'MyHome',
                component: MyHome
            },
            {
                path: '/:slug',
                name:'slug',
                component: MyDoctors
            },

        ]
})

export default router;//diamo la possibilità di esportare router