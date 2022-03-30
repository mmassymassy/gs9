<template>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des produits alertés</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTableu" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#Ref</th>
                            <th>Action</th>
                            <th>Nom</th>
                            <th>Prix detail par piéce</th>
                            <th>Prix detail par unité</th>
                            <th>Piéces restantes</th>
                            <th>Unités restantes</th>
                            <th>Position</th>
                            <th>Prix gros par unité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product in products" :key="product.id" :class="'tr'+product.id"
                         @click="this.$emit('productChange', product.id);"
                        >
                            <td>{{ product.id }}</td>
                            <td>
                                 <button @click="deleteproduct(product.id)" class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
                                 <router-link :to="{path : '/products/edit/'+product.id,name :'edit',params : {id : product.id}}" class="btn btn-success">
                                    <i class="fas fa-pen"></i>
                                 </router-link>
                            </td>
                            <td>{{ product.name }}</td>
                            <td>{{ product.dPiecePrice }}</td>
                            <td>{{ product.dUnitPrice }}</td>
                            <td>{{ product.initPieceQ }}</td>
                            <td>{{ product.initUnitQ }}</td>
                            <td>{{ product.position }}</td>
                            <td>{{ product.gUnitPrice }}</td>
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
        axios.get('/api/products/alerted').then(resp =>{
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

<style scoped>
.card {
    position: absolute;
    left: 0;
    width: 100%;
}
th{
    font-size: 12px;
}

</style>
