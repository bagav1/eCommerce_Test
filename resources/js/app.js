require('./bootstrap');
import 'vue'
import router from './router'
Vue.prototype.$http = axios;
import commons from './Commons.js';
Vue.mixin(commons);
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue';
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)

Vue.component('mainapp', require('./components/mainapp.vue').default)

const app = new Vue({
    el: '#app',
    router,
});
