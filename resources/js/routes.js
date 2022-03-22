

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
                    component : allClients
                },
                {
                    path : 'debts',
                    component : allClients
                },
                {
                    path : 'create',
                    component : createClient
                },
                {
                    path : 'edit/:id',
                    component : editClient
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
                    component : editProvider
                },
                {
                    path : 'deleted',
                    component : deletedProviders
                },

            ]
        }
    ]
const router = createRouter({
        history: createWebHistory(),
        routes,
});

export default router;
