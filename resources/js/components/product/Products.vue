<template>
<div class="container">
    <div class="row mb-4 fixed-card" :class="this.$route.path == '/products/create' ?'unfixed-card' : ''">
        <div class="col-md-9">
                        <div class="card border-left-primary shadow h-100 py-2" :class="this.$route.path == '/products/create' ?' hidden' : ''">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Nom</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">{{ product.name }}</div>
                                        </div>
                                       <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Ancien Prix/piece</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">{{product.olddPiecePrice}}</div>
                                        </div>
                                       <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Ancien Prix/unité</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">{{product.olddUnitPrice}}</div>
                                        </div>
                                         <div class="col-auto mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Image
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <img style="height:4rem;width:4rem" src="img/im.jpg" alt="">

                                            </div>
                                        </div>


                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Position</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">{{product.position}}</div>
                                        </div>
                                       <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Quantité d'alerte</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">{{product.quantityAlert}}</div>
                                        </div>
                                       <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Crée le</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">{{product.created_at}}</div>
                                        </div>
                                        <div class="col-auto">
                                                <div style="width:4rem">

                                                </div>
                                         </div>



                                    </div>
                                </div>
                         </div>
                   </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-6">
                    <router-link to="/products" class="btn btn-info btn-round">
                        <div class="btn-round-text">
                          <i class="fas fa-list"></i> Lister
                        </div>
                    </router-link>
                </div>
                <div class="col-md-6">
                    <router-link to="/products/create" class="btn btn-success btn-round">
                        <div class="btn-round-text">
                         <i class="fas fa-plus"></i>  Créer
                        </div>
                    </router-link>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <router-link to="/products/alert" class="btn btn-warning btn-round">
                        <div class="btn-round-text">
                           <i class="fas fa-exclamation"></i>  Alertés
                        </div>
                    </router-link>
                </div>
                <div class="col-md-6">
                    <router-link to="/products/deleted" class="btn btn-danger btn-round">
                        <div class="btn-round-text">
                          <i class="fas fa-trash"></i>  Supprimés
                        </div>
                    </router-link>

                </div>
            </div>
        </div>

    </div>
         <router-view @dataChange='getInfos' @productChange='getProduct'></router-view>

</div>

</template>

<script>
export default {
    data() {
        return {
            infos : [],
            product : {"id":0,"name":"nom de produit","family":"outils","brand":"nbnbnbb","model":"nbnbnbnbnbn","position":"R0 E1","unit":"unit\u00e9","piecesInUnit":1,"gUnitPrice":100,"dUnitPrice":100,"gPiecePrice":0,"dPiecePrice":54545,"initUnitQ":5475,"initPieceQ":575,"quantityAlert":5454,"expDate":null,"oldgUnitPrice":100,"olddUnitPrice":null,"oldgPiecePrice":null,"olddPiecePrice":null,"created_at":"2022-03-11T13:21:48.000000Z","updated_at":"2022-03-26T15:11:58.000000Z","deleted":0},
        }
    },
    mounted() {
        this.getInfos();
        console.log(this.$route);
    },
    methods: {
        getInfos(){
            axios.get('/api/products/infos').then(resp=>{
                console.log(resp)
                this.infos = resp.data;
            })
        },
        getProduct(id){
                axios.get('/api/products/'+id).then(resp =>{
                    console.log(this.productChange)
                    this.product = resp.data;
                }).catch(err=>{
                    console.log(err);
                });
        }
    },

}
</script>

<style lang='scss'>
.crow{
    display: flex;
    flex-wrap: wrap;
    margin-right: -0.75rem;
    margin-left: -0.75rem;
    flex-direction: column;
    align-items: flex-end;
}
.btn-round{
    height: 6rem;
    width: 6rem;
    margin: .3rem auto;
    position: relative;
    &-text{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
}

.hidden{
    visibility: hidden;
}
</style>
