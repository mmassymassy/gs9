

import { createWebHistory, createRouter } from "vue-router";

import Home from './components/Home.vue';
//clients
import Clients from './components/client/Clients.vue';
import allClients from './components/client/allClients.vue';
import createClient from './components/client/createClient.vue';
import editClient from './components/client/editClient.vue';
import deletedClients from './components/client/deletedClients.vue';

//providers
import Providers from './components/provider/Providers.vue';
import allProviders from './components/provider/allProviders.vue';
import createProvider from './components/provider/createProvider.vue';
import editProvider from './components/provider/editProvider.vue';
import deletedProviders from './components/provider/deletedProviders.vue';

//products
import Products from './components/product/Products.vue';
import allProducts from './components/product/allProducts.vue';
import createProduct from './components/product/createProduct.vue';
import editProduct from './components/product/editProduct.vue';
import deletedProducts from './components/product/deletedProducts.vue';
import alertedProducts from './components/product/alertedProducts.vue';





const routes = [
        {
            path : '/',
            component : Home
        },
        {
            path : '/clients',
            component : Clients,
            children : [
                {
                    path : '',
                    component : allClients,
                    name : 'clients'
                },
                {
                    path : 'create',
                    component : createClient
                },
                {
                    path : 'edit/:id',
                    component : editClient,
                    props : true
                },
                {
                    path : 'deleted',
                    component : deletedClients
                },

            ]
        },
        {
            path : '/providers',
            component : Providers,
            children : [
                {
                    path : '',
                    component : allProviders
                },
                {
                    path : 'create',
                    component : createProvider
                },
                {
                    path : 'edit/:id',
                    component : editProvider,
                    props: route => ({ idString: `id ${route.params.id}` }),
                    name : 'edit'
                },
                {
                    path : 'deleted',
                    component : deletedProviders
                },

            ]
        },
        {
            path : '/products',
            component : Products,
            children : [
                {
                    path : '',
                    component : allProducts
                },
                {
                    path : 'create',
                    component : createProduct
                },
                {
                    path : 'edit/:id',
                    component : editProduct,
                    props: route => ({ idString: `id ${route.params.id}` }),
                    name : 'edit'
                },
                {
                    path : 'deleted',
                    component : deletedProducts
                },
                {
                    path : 'alert',
                    component : alertedProducts
                },

            ]
        }
    ]
const router = createRouter({
        history: createWebHistory(),
        routes,
});

export default router;
