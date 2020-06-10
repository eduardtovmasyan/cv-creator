require('./bootstrap');
window.Vue = require('vue')
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios,axios);
import Menu from "./Menu"
import Login from "./components/AuthComponent.vue"
import NewCV from "./components/NewCvComponent.vue"
import MyCV from "./components/MyCvComponent.vue"

let r = [
	{path: '/home' , component: Menu},
	{path: '/signin' , component: Login},
	{path: '/new-cv' , component: NewCV},
	{path: '/my-cv' , component: MyCV},
]

let router = new VueRouter({
	routes: r,
	mode: 'history'
})

let vm = new Vue(Vue.util.extend({router:router}, Menu)).$mount('#app')
