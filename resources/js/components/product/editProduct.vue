<template>
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body">
                <h4 class="font-weight-bold text-primary">Modifier le fournisseur</h4>
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
                <form @submit.prevent method="POST" id="providerForm" class="provider py-4">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="nom">Nom</label>
                            <input type="text" name="name" v-model="provider.name" class="form-control"
                                placeholder="Nom">
                        </div>
                        <div class="col-sm-4">
                            <label for="tel">Tél</label>
                            <input type="text" name="phone" v-model="provider.phone" class="form-control"
                                placeholder="Tél">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Dettes</label>
                            <input type="number" name="debts" v-model="provider.totalUnpaid" min="0" class="form-control"
                                placeholder="Dettes">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Dettes Alerte</label>
                            <input type="number" name="debtAlert" v-model="provider.debtAlert" min="0" class="form-control"
                                placeholder="Dettes Alerte">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="info">Info</label>
                        <textarea name="info" v-model="provider.info" cols="30" rows="1" class="form-control"></textarea>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button @click="editProvider" class="btn btn-primary py-2">
                            Modifier
                        </button>
                    </div>


                </form>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            id : this.$route.params.id,
            provider : {
                name : '',
                phone : '',
                totalUnpaid : '',
                info : '',
                debtAlert : ''
            },
            msg : '',
            errors : ''
        }
    },
    created() {
        this.getData(this.$route.params.id);
    },
    mounted() {
        this.getData(this.$route.params.id);
    },
    methods: {
        getData(id){
            axios.get('/api/providers/'+id).then(resp=>{
                console.log(resp)
                this.provider = resp.data;
            }).catch(err=>{
                console.log(err)
                this.errors = err.response.data.message;
            })
        },
        editProvider(){
            this.msg = '';
            this.errors = '';
            const data = new FormData($('#providerForm')[0]);
            console.log($('#providerForm')[0]);
            axios.patch(`/api/providers/${this.id}`,this.provider).then(resp=>{
                console.log(resp)
                if(resp.data.status == 1){
                    this.msg = resp.data;
                   $('#providerForm')[0].reset();
                    this.provider = [];
                }
            }).catch(err=>{
                this.errors = err.response.data.message;
                console.log(err.response.data);
            });
        }

    },


}
</script>

<style>

</style>
