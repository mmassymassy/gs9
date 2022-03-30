<template>
<div class="container">
         <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <router-link to="/sells" class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                List des ventes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{infos.sellsCount}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <router-link to="/sells/create" class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Nouvel vente</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-plus fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <router-link to="/sells/deleted" class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Ventes supprimés</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{infos.deletedSells}}</div>
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
            axios.get('/api/sells/infos').then(resp=>{
                console.log(resp)
                this.infos = resp.data;
            })
        }
    },

}
</script>

<style>

</style>
