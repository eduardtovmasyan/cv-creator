require('./bootstrap');
// window.Vue = require('vue')
// import VueRouter from "vue-router";
// Vue.use(VueRouter);
// import VueAxios from "vue-axios";
// import axios from "axios";
// Vue.use(VueAxios,axios);
// import Menu from "./menu.vue"
// import Home from "./components/HomeComponent.vue"
// import User from "./components/UserComponent.vue"
// import Product from "./components/ProductComponent.vue"
// let r =[
// 	{path:'/admin',component:Home},
// 	{path:'/admin/users',component:User},
// 	{path:'/admin/products',component:Product},
// ]
// let router = new VueRouter({
// 	routes:r,
// 	mode:'history'
// })
// let vm = new Vue(Vue.util.extend({router:router},Menu)).$mount('#app')
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);
