<template>
<div class="container-fluid">
         <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <router-link to="/products" class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                List des Produits</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{infos.productsCount}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-boxes-stacked fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <router-link to="/products/create" class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Ajouter un produit</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box-circle-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <router-link to="/products/alert" class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Produits alertés
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{infos.productAlert}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shield-exclamation fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <router-link to="/products/deleted" class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Produits supprimés</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{infos.deletedProducts}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-trash fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>
     </div>
     <router-view @dataChange='getInfos'></router-view>
</div>
</template>

<script>
export default {
    data() {
        return {
            infos : [],
        }
    },
    mounted() {
        this.getInfos();
    },
    methods: {
        getInfos(){
            axios.get('/api/products/infos').then(resp=>{
                console.log(resp)
                this.infos = resp.data;
            })
        }
    },

}
</script>

<style>

</style>
