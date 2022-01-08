import Vue from 'vue'
import vuetify from '../vue/plugins/vuetify'
import Routes from '../vue/routes'
import App from '../vue/App.vue'
import store from '../vue/stores';
import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);

new Vue({
    vuetify,
    router: Routes,
    render: h => h(App),
    store
}).$mount('#app');
