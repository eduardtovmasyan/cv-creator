require('./bootstrap');
window.Vue = require('vue')
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios,axios);
import Menu from "./Menu"
import Login from "./components/LoginComponent.vue"
import Profile from "./components/DashboardComponent.vue"

let r =[
	{path:'/home' ,component:Menu},
	{path:'/signin' ,component:Login},
	{path:'/profile' ,component:Profile},
]
let router = new VueRouter({
	routes:r,
	mode:'history'
})
let vm = new Vue(Vue.util.extend({router:router}, Menu)).$mount('#app')
