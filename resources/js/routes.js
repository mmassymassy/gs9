import Home from './components/Home.vue';
import Clients from './components/client/Clients.vue';
import createClient from './components/client/createClient.vue';
import editClient from './components/client/editClient.vue';
import deletedClients from './components/client/deletedClients.vue';




export default{
    mode : history,
    routes: [
        {
            path : '/home',
            component : Home
        },
        {
            path : '/clients',
            component : Clients,
            children : [
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
        }
    ]
}
