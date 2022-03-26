<template>
        <div class="card my-2">
            <div class="card-body">
                <h4 class="font-weight-bold text-primary">Crée un nouveau produit</h4>
                <div v-if="msg != ''" class="alert alert-dismissible alert-info"  :class="{'alert-danger' : msg.status != 1} ">
                    <p>
                        {{ msg.message }}
                    </p>
                </div>
                <div v-if="errors != ''" class="alert alert-dismissible alert-danger">
                    <p>
                        {{ errors }}
                    </p>
                </div>
                <form  @submit.prevent method="POST" id="productForm" class="product py-4">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="nom">Nom</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Nom">
                        </div>
                        <div class="col-sm-2">
                            <label for="tel">Famille</label>
                            <input type="text" name="family" class="form-control"
                                placeholder="Famille">
                        </div>
                        <div class="col-sm-3">
                            <label for="da">Marque</label>
                            <input type="text" name="brand" class="form-control"
                                placeholder="Marque">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Modéle</label>
                            <input type="text" name="model"  class="form-control"
                                placeholder="Modéle">
                        </div>
                         <div class="col-sm-2">
                            <label for="da">Position</label>
                            <input type="text" name="position"  class="form-control"
                                placeholder="Position">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="">Unité</label>
                            <select name="unit" id="" class="form-select">
                                <option value="unité">Unité standard</option>
                                <option value="boite">Boite</option>
                                <option value="metre">Métre</option>
                                <option value="kilogramme">Kilogramme</option>
                                <option value="litre">Litre</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="">Piéces/unité</label>
                             <input type="number" min="0" v-model="piecesInUnit" name="piecesInUnit"  class="form-control" placeholder="Piéces par unité">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Quanité initiale(unités)</label>
                            <input type="number" min="0" v-model="initUnitQ" name="initUnitQ" id="" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Quanité initiale(piéces)</label>
                            <input type="number" min="0" v-model="initPieceQ" name="initPieceQ" id="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="">Prix det/piece</label>
                            <input type="number" v-model="dPiecePrice" name="dPiecePrice" id="" class="form-control">
                        </div>                        <div class="col-sm-3">
                            <label for="">Prix det/unité</label>
                            <input type="number" v-model="dUnitPrice" name="dUnitPrice" id="" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Prix gros/unité</label>
                            <input type="number" v-model="dUnitPrice" name="gUnitPrice" id="" class="form-control">
                            <input type="hidden" v-model="dPiecePrice" name="gPiecePrice" id="" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Quantité d'alerte</label>
                            <input type="number"  name="quantityAlert" id="" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button @click="createProduct" class="btn btn-primary py-2">
                            Ajouter ce fournisseur
                        </button>
                    </div>


                </form>
            </div>
        </div>
</template>

<script>
export default {
    data() {
        return {
            msg : '',
            errors : '',
            initUnitQ : 0,
            piecesInUnit : 1,
            dPiecePrice : '',
        }
    },
    methods: {
        createProduct(){
            this.msg = '';
            this.errors = '';
            const data = new FormData($('#productForm')[0]);
            axios.post('/api/products',data).then(resp=>{
                if(resp.data.status == 1){
                    this.$emit('dataChange', 'create');
                    this.msg = resp.data;
                    $('#productForm')[0].reset();
                }

            }).catch(err=>{
                this.errors = err.response.data.message;
                console.log(err.response.data);
            });
        },

    },
    mounted() {
        console.log(this.id);
    },
    computed : {
        initPieceQ(){
             return this.initUnitQ*this.piecesInUnit;
        },
        dUnitPrice(){
            return this.dPiecePrice*this.piecesInUnit;
        }

    }

}
</script>

<style>

</style>
