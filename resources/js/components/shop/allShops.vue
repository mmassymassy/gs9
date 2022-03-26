<template>
       <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des shops</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTableu" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Info</th>
                            <th>Total</th>
                            <th>Total payé</th>
                            <th>Dettes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="shop in shops" :key="shop.id"
                            :class="[shop.debts>shop.debtAlert ? 'tr'+shop.id + ' table-warning' : 'tr'+shop.id ]"

                        >
                         <td>{{ shop.id }}</td>
                            <td>
                                 <button @click="deleteShop(shop.id)" class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
                                 <router-link :to="'/shops/edit/'+shop.id" class="btn btn-success"><i class="fas fa-pen"></i></router-link>

                            </td>
                            <td>{{ shop.shopDate }}</td>
                            <td>{{ shop.productId}}</td>
                            <td>{{ shop.quantity }}</td>
                            <td>{{ shop.info }}</td>
                            <td>{{ shop.total }}</td>
                            <td>{{ shop.totalPaid }}</td>
                            <td>{{ shop.total - shop.totalPaid }}</td>
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
            shops : [],
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
        axios.get('/api/shops').then(resp =>{
            console.log(resp.data.data);
            this.shops = resp.data.data;
        }).catch(err=>{
            console.log(err);
        });
    },
        deleteShop(id){
        axios.get('/api/shops/delete/'+id).then(resp=>{
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
