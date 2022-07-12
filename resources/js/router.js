import vueRouter from 'vue-router'
import Vue from 'vue'
import Product from './components/Product'
import ProductList from './components/ProductList'

Vue.use(vueRouter)

const routes = [
    {
        path: '/products',
        name: 'product_list',
        component: ProductList
    },
    {
        path: '/products/:id',
        name: 'product',
        component: Product
    },
]

export default new vueRouter({
    history: 'history',
    routes
})