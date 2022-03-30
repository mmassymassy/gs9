

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

//Shops
import Shops from './components/shop/Shops.vue';
import allShops from './components/shop/allShops.vue';
import createShop from './components/shop/createShop.vue';
import editShop from './components/shop/editShop.vue';
import deletedShops from './components/shop/deletedShops.vue';

//Sells
import Sells from './components/sell/Sells.vue';
import allSells from './components/sell/allSells.vue';
import createSell from './components/sell/createSell.vue';
import editSell from './components/sell/editSell.vue';
import deletedSells from './components/sell/deletedSells.vue';



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
                    props : true,
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
        },
        {
            path : '/Shops',
            component : Shops,
            children : [
                {
                    path : '',
                    component : allShops
                },
                {
                    path : 'create',
                    component : createShop
                },
                {
                    path : 'edit/:id',
                    component : editShop,
                    props : true,
                },
                {
                    path : 'deleted',
                    component : deletedShops
                },


            ]
        },
        {
            path : '/sells',
            component : Sells,
            children : [
                {
                    path : '',
                    component : allSells
                },
                {
                    path : 'create',
                    component : createSell
                },
                {
                    path : 'edit/:id',
                    component : editSell,
                    props : true,
                },
                {
                    path : 'deleted',
                    component : deletedSells
                },


            ]
        }
    ]
const router = createRouter({
        history: createWebHistory(),
        routes,
});

export default router;
