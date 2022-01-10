import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from './views/pages/Dashboard.vue'
import Login from './views/pages/Login.vue'
import NotFound from './views/pages/NotFound.vue'

import ProductNew from './views/pages/Product/New.vue'
import ProductStockMovementIndex from './views/pages/ProductStockMovement/Index.vue'
import ProductStockMovementShow from './views/pages/ProductStockMovement/Show.vue'
import ProductStockMovementNew from './views/pages/ProductStockMovement/New.vue'

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

    {
        path: `/produtos/cadastrar`,
        name: 'productNew',
        component: ProductNew,
    },

    {
        path: `/sku/:sku/movimentos/estoque`,
        name: 'skuStockMovements',
        props: true,
        component: ProductStockMovementShow,
    },

    {
        path: `/movimentos/estoque`,
        name: 'stockMovements',
        component: ProductStockMovementIndex,
    },

    {
        path: `/movimentar/estoque`,
        name: 'stockMovementNew',
        component: ProductStockMovementNew,
    },

    {
        path: `/*`,
        component: NotFound,
        name: 'notFound',
    },
]
    .map(route => ({
        ...route, path: `${basePath}${route.path}`
    }
    ));

const routers = new VueRouter({
    mode: 'history',
    routes: routes
});

export default routers;
