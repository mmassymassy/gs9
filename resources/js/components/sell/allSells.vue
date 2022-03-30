<template>
       <div class="card card-100 shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des ventes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTableu" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Date</th>
                            <th>N° Bon</th>
                            <th>Client</th>
                            <th>Produit</th>
                            <th>Qte unité</th>
                            <th>Qte piéce</th>
                            <th>Prix piece</th>
                            <th>Prix gros</th>
                            <th>mode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="sell in sells" :key="sell.id"
                            :class="'tr'+sell.id"
                        >
                         <td>{{ sell.id }}</td>
                            <td>
                                 <button @click="deleteSell(sell.id)" class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
                                 <router-link :to="'/sells/edit/'+sell.id" class="btn btn-success"><i class="fas fa-pen"></i></router-link>

                            </td>
                            <td>{{ sell.sellDate }}</td>
                            <td>{{ sell.bonId}}</td>
                            <td>{{ sell.client }}</td>
                            <td>{{ sell.product }}</td>
                            <td>{{ sell.unitQuantity }}</td>
                            <td>{{ sell.pieceQuantity }}</td>
                            <td>{{ sell.dsellPrice }}</td>
                            <td>{{ sell.gsellPrice }}</td>
                            <td>{{ sell.mode }}</td>
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
            sells : [],
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
        axios.get('/api/sells').then(resp =>{
            console.log(resp.data.data);
            this.sells = resp.data.data;
        }).catch(err=>{
            console.log(err);
        });
    },
    deleteSell(id){
        axios.get('/api/sells/delete/'+id).then(resp=>{
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

<style scoped>
.card-100 {
    position: absolute;
    left: 0;
    width: 100%;
}
th{
    font-size: 12px;
}

</style>
