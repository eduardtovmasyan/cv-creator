require('./bootstrap');
window.Vue = require('vue')
import VueRouter from "vue-router";
Vue.use(VueRouter);
import VueAxios from "vue-axios";
import axios from "axios";
Vue.use(VueAxios,axios);

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
