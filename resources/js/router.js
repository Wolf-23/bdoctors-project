import Vue from 'vue';
import VueRouter from 'vue-router';
import MyHome from './pages/MyHome';
import MyDoctors from './pages/MyDoctors';
import MessageForm from './pages/MessageForm';
import NotFound from './pages/NotFound';
Vue.use(VueRouter);


//creo oggetto basato su VueRouter
//importo il componente



const router = new VueRouter({
        mode: 'history',
        routes:[
            {
                path: '/',
                name:'MyHome',
                component: MyHome
            },
            {
                path: '/profile/:slug',
                name:'single-profile',
                component: MyDoctors
            },

            {
                path: '/profile/:slug/message',
                name:'MessageForm',
                component: MessageForm
            },
            {
                path: "/:catchAll(.*)",
                name: "NotFound",
                component: NotFound,
            }

        ]
})

export default router;