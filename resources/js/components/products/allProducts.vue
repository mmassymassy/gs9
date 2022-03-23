<template>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des produits</h6>
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
                        <tr v-for="product in products" :key="product.id" :class="'tr'+product.id">
                            <td>{{ product.id }}</td>
                            <td>
                                 <button @click="deleteproduct(product.id)" class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
                                 <router-link :to="{path : '/products/edit/'+product.id,name :'edit',params : {id : product.id}}" class="btn btn-success"><i class="fas fa-pen"></i></router-link>
                            </td>
                            <td>{{ product.name }}</td>
                            <td>{{ product.info }}</td>
                            <td>{{ product.phone }}</td>
                            <td>{{ product.totalPaid }}</td>
                            <td>{{ product.totalUnpaid }}</td>
                            <td>{{ product.debtAlert }}</td>

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
            products : [],
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
        axios.get('/api/products').then(resp =>{
            console.log(resp.data.data);
            this.products = resp.data.data;
        }).catch(err=>{
            console.log(err);
        });
    },
        deleteproduct(id){
        axios.get('/api/products/delete/'+id).then(resp=>{
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
