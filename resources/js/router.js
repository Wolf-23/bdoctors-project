import Vue from 'vue';
import VueRouter from 'vue-router';
import MyHome from './pages/MyHome'
Vue.use(VueRouter);


//creo oggetto basato su VueRouter
//importo il componente



const router = new VueRouter({
        mode: 'history',//modalità history(consigliata)
        routes:[
            {
                path: '/home',
                name:'MyHome',
                component: MyHome
            },
        ]
})

export default router;//diamo la possibilità di esportare router