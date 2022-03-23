<template>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des fournisseurs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableu" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Action</th>
                            <th>Nom</th>
                            <th>info</th>
                            <th>Tél</th>
                            <th>Total payé</th>
                            <th>Total non payé</th>
                            <th>Dettes alerte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="provider in providers" :key="provider.id" :class="'tr'+provider.id">
                            <td>{{ provider.id }}</td>
                            <td>
                                 <button @click="deleteProvider(provider.id)" class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
                                 <router-link :to="{path : '/providers/edit/'+provider.id,name :'edit',params : {id : provider.id}}" class="btn btn-success"><i class="fas fa-pen"></i></router-link>
                            </td>
                            <td>{{ provider.name }}</td>
                            <td>{{ provider.info }}</td>
                            <td>{{ provider.phone }}</td>
                            <td>{{ provider.totalPaid }}</td>
                            <td>{{ provider.totalUnpaid }}</td>
                            <td>{{ provider.debtAlert }}</td>

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
            providers : [],
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
        axios.get('/api/providers').then(resp =>{
            console.log(resp.data.data);
            this.providers = resp.data.data;
        }).catch(err=>{
            console.log(err);
        });
    },
        deleteProvider(id){
        axios.get('/api/providers/delete/'+id).then(resp=>{
            console.log(resp)
            if(resp.data.status == 1){
                $('.tr'+id).fadeOut();
                this.$emit('dataChange', 'delete') // update block in parent component
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
