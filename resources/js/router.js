import 'vue';
import Router from 'vue-router';
Vue.use(Router);

import login from './components/pages/LoginComponent'
import register from './components/pages/RegisterComponent'
import principal from './components/pages/PrincipalComponent'

const routes = [
    {
        path: '/login',
        component: login,
        name: 'login'

    },
    {
        path: '/register',
        component: register,
        name: 'register'

    },
    {
        path: 'principal',
        component: principal,
        name: 'principal'
    }
]



export default new Router({
    mode: 'history',
    routes
})
