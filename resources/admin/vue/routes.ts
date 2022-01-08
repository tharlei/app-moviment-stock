import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from './views/pages/Dashboard.vue'
import Login from './views/pages/Login.vue'
import NotFound from './views/pages/NotFound.vue'

// import Product from './views/pages/Product/Index.vue'
// import ProductNew from './views/pages/Product/New.vue'
// import ProductEdit from './views/pages/Product/Edit.vue'

Vue.use(VueRouter);

const basePath = '/admin'
const routes = [
    {
        path: `/entrar`,
        name: 'login',
        component: Login,
    },

    {
        path: `/`,
        name: 'dashboard',
        component: Dashboard,
    },

    // {
    //   path: `/produtos`,
    //   name: 'productIndex',
    //   component: Product,
    // },

    // {
    //   path: `/produtos/cadastrar`,
    //   name: 'productNew',
    //   component: ProductNew,
    // },

    // {
    //   path: `/produtos/:id/editar`,
    //   name: 'productEdit',
    //   component: ProductEdit,
    //   props: true,
    // },

    {
        path: `/*`,
        component: NotFound,
        name: 'notFound',
    },
]
.map(route => ({
    ...route, path: `${basePath}${route.path}`}
));

const routers = new VueRouter({
    mode: 'history',
    routes: routes
});

export default routers;
