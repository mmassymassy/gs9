<template>
       <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des clients supprimés</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Action</th>
                            <th>Nom</th>
                            <th>Tél</th>
                            <th>Total Payé</th>
                            <th>Total non payé</th>
                            <th>info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="provider in providers" :key="provider.id" :class="'tr'+provider.id">
                            <td>{{ provider.id }}</td>
                            <td>
                                <button @click="deleteProvider(provider.id)" class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
                                <button @click="restoreProvider(provider.id)" class="btn btn-success"><i class="fas fa-recycle"></i></button>
                            </td>
                            <td>{{ provider.name}}</td>
                            <td>{{ provider.phone}}</td>
                            <td>{{ provider.totalPaid}}</td>
                            <td>{{ provider.totalUnpaid}}</td>
                            <td>{{ provider.info}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props : ['providersInfo'],
    data() {
        return {
            providers : [],
        }
    },
mounted() {
    this.getData();
    setTimeout(() => {
            $('#dataTableu').DataTable();
            console.log(this.providersInfo)
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
        axios.get('/api/providers/deleted').then(resp =>{
            console.log(resp.data.data);
            if(resp.data.data != null){
                this.providers = resp.data.data;
            }
        }).catch(err=>{
            console.log(err);
        });
    },
    deleteProvider(id){
        axios.delete('/api/providers/'+id).then(resp=>{
            console.log(resp)
            if(resp.data.status == 1){
                $('.tr'+id).fadeOut();
                this.$emit('dataChange', 'finalDelete') // update block in parent component
            }
        }).catch(err=>{
            console.log(err)
        })
    },
    restoreProvider(id){
        axios.get('/api/providers/undelete/'+id).then(resp=>{
            if(resp.data.status == 1){
                $('.tr'+id).fadeOut();
                this.$emit('dataChange', 'restore') // update block in parent component
            }
        }).catch(err=>{
            console.log(err)
        })
    }
},

}
</script>

<style>

</style>
