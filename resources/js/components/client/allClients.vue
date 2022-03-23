<template>
       <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des clients</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTableu" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Nom</th>
                            <th>info</th>
                            <th>Tél</th>
                            <th>Dettes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="client in clients" :key="client.id"
                            :class="[client.debts>client.debtAlert ? 'tr'+client.id + ' table-warning' : 'tr'+client.id ]"

                        >
                         <td>{{ client.id }}</td>
                            <td>
                                 <button @click="deleteClient(client.id)" class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
                                 <router-link :to="'/clients/edit/'+client.id" class="btn btn-success"><i class="fas fa-pen"></i></router-link>

                            </td>
                            <td>{{ client.name }}</td>
                            <td>{{ client.info }}</td>
                            <td>{{ client.phone }}</td>
                            <td>{{ client.debts }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            clients : [],
        }
    },
mounted() {
    this.getData();
    setTimeout(() => {
            $('#dataTableu').DataTable();
    }, 3000);
},
created() {
    this.getData();
    setTimeout(() => {
            $('#dataTableu').DataTable();
    }, 3000);
},
methods: {
    getData(){
        axios.get('/api/clients').then(resp =>{
            console.log(resp.data.data);
            this.clients = resp.data.data;
        }).catch(err=>{
            console.log(err);
        });
    },
        deleteClient(id){
        axios.get('/api/clients/delete/'+id).then(resp=>{
            console.log(resp)
            if(resp.data.status == 1){
                $('.tr'+id).fadeOut();
                this.$emit('dataChange', 'delete');
            }
        }).catch(err=>{
            console.log(err)
        })
    },
},

}
</script>

<style>

</style>
