<template>
  <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des produits</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTableu" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#Ref</th>
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
                        <tr
                            v-for="product in products" :key="product.id"
                            :class="[product.initUnitQ<product.quantityAlert ? 'tr'+product.id + ' table-warning' : 'tr'+product.id ]"
                            @click="getProduct(product.id)"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"

                        >
                            <td>{{ product.id }}</td>
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
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="card my-2">
            <div class="card-body">
              <h4 class="font-weight-bold text-primary">Nouvel achat : {{product.name}}</h4>
              <p class="text-warning">
                  Vérifiez les informations de produit avant d'effectuer un nouvel achat, en cas de changement des
                  propriétes de produit, mettez à jour les informations en bas, puis remplissez ce formulaire
              </p>
              <div
                v-if="msg != ''"
                class="alert alert-dismissible alert-info"
                :class="{ 'alert-danger': msg.status != 1 }"
              >
                <p>
                  {{ msg.message }}
                </p>
              </div>
              <div
                v-if="errors != ''"
                class="alert alert-dismissible alert-danger"
              >
                <p>
                  {{ errors }}
                </p>
              </div>
              <form
                @submit.prevent
                method="POST"
                id="shopForm"
                class="shop py-4"
              >
                <div class="form-group row">

                    <input
                      type="hidden"
                      name="productId"
                      :value="product.id"
                      class="form-control"
                      placeholder="Produit"
                    />
                  <div class="col-sm-3">
                    <label for="nom">Date d'achat</label>
                    <input
                      type="date"
                      name="shopDate"
                      class="form-control"
                      placeholder="Date d'achat"
                    />
                  </div>
                  <div class="col-sm-3">
                    <label for="tel">Fournisseur</label>
                    <select name="providerId" id="" class="form-select">
                      <option
                        v-for="provider in providers"
                        :key="provider.id"
                        :value="provider.id"
                      >
                        {{ provider.name }}
                      </option>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <label for="da">Quantité achetée</label>
                    <input
                      type="number"
                      name="quantity"
                      min="0"
                      value="0"
                      class="form-control"
                      placeholder="Nombre d'unité"
                    />
                  </div>
                  <div class="col-sm-3">
                    <label for="da">Prix Total</label>
                    <input
                      type="number"
                      v-model="total"
                      name="total"
                      min="0"
                      class="form-control"
                      placeholder="Total payé"
                    />
                  </div>

                </div>

                <div class="form-group row">

                  <div class="col-sm-3">
                    <label for="da">Total payé</label>
                    <input
                      type="number"
                      v-model="totalPaid"
                      name="totalPaid"
                      min="0"
                      class="form-control"
                      placeholder="Total payé"
                    />
                  </div>
                  <div class="col-sm-3">
                    <label for="da">Information</label>
                    <textarea
                      type="text"
                      name="info"
                      class="form-control"
                    ></textarea>
                  </div>
                </div>
                <div class="d-flex flex-row-reverse">
                  <button @click="createShop" class="btn btn-primary py-2">
                    Ajouter
                  </button>
                </div>
              </form>
            </div>
            <div class="card-body">
                <h4 class="font-weight-bold text-primary">Modifier les information de {{ product.name }}</h4>
                <form  @submit.prevent method="POST" id="productForm" class="product py-4">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="nom">Nom</label>
                            <input type="text" v-model="product.name" name="name" class="form-control"
                                placeholder="Nom">
                        </div>
                        <div class="col-sm-2">
                            <label for="tel">Famille</label>
                            <input type="text" v-model="product.family" name="family" class="form-control"
                                placeholder="Famille">
                        </div>
                        <div class="col-sm-3">
                            <label for="da">Marque</label>
                            <input type="text" v-model="product.brand" name="brand" class="form-control"
                                placeholder="Marque">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Modéle</label>
                            <input type="text" v-model="product.model" name="model"  class="form-control"
                                placeholder="Modéle">
                        </div>
                         <div class="col-sm-2">
                            <label for="da">Position</label>
                            <input type="text" name="position" v-model="product.position"  class="form-control"
                                placeholder="Position">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="">Unité</label>
                            <select name="unit" v-model="product.unit" id="" class="form-select">
                                <option value="unité">Unité standard</option>
                                <option value="boite">Boite</option>
                                <option value="metre">Métre</option>
                                <option value="kilogramme">Kilogramme</option>
                                <option value="litre">Litre</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="">Piéces/unité</label>
                             <input type="number" min="0" v-model="product.piecesInUnit" name="piecesInUnit"  class="form-control" placeholder="Piéces par unité">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="">Prix det/piece</label>
                            <input type="number" v-model="product.dPiecePrice" name="dPiecePrice" id="" class="form-control">
                        </div>                        <div class="col-sm-3">
                            <label for="">Prix det/unité</label>
                            <input type="number" v-model="product.dUnitPrice" name="dUnitPrice" id="" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Prix gros/unité</label>
                            <input type="number" v-model="product.gUnitPrice" name="gUnitPrice" id="" class="form-control">
                            <input type="hidden" v-model="product.gPiecePrice" name="gPiecePrice" id="" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <label for="">Quantité d'alerte</label>
                            <input type="number" v-model="product.quantityAlert"  name="quantityAlert" id="" class="form-control">
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button @click="editProduct" class="btn btn-primary py-2">
                            Modifier ce produit
                        </button>
                    </div>


                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
        product : [],
        products : [],
      providers: [],
      msg: "",
      errors: "",
    };
  },
  methods: {
    getProviders() {
      axios
        .get("/api/providers")
        .then((resp) => {
          this.providers = resp.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    createShop() {
      this.msg = "";
      this.errors = "";
      const data = new FormData($("#shopForm")[0]);
      axios
        .post("/api/shops", data)
        .then((resp) => {
          if (resp.data.status == 1) {
            this.msg = resp.data;
            $("#shopForm")[0].reset();
            this.$emit('dataChange', 'create');
          }
        })
        .catch((err) => {
          this.errors = err.response.data.message;
          console.log(err.response.data);
        });
    },
    getData(){
        axios.get('/api/products').then(resp =>{
            console.log(resp.data.data);
            this.products = resp.data.data;
        }).catch(err=>{
            console.log(err);
        });
    },
    getProduct(id){
                axios.get('/api/products/'+id).then(resp =>{
                    this.product = resp.data;
                }).catch(err=>{
                    console.log(err);
                });
    },
    editProduct(){
            this.msg = '';
            this.errors = '';
            axios.patch('/api/products/'+this.product.id,this.product).then(resp=>{
                if(resp.data.status == 1){
                    this.msg = resp.data;
                   $('#productForm')[0].reset();
                    this.product = [];
                }
            }).catch(err=>{
                this.errors = err.response.data.message;
                console.log(err.response.data);
            });
    }
  },
  mounted() {
    this.getProviders();
    this.getData();
    setTimeout(() => {
            $('#dataTableu').DataTable();
    }, 3000);
  },
};
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
