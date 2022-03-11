@extends('layouts.app')
@section('content')
<main class="py-4">
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body">
                <h4 class="font-weight-bold text-primary">Crée un nouveau client</h4>
                <form action="/api/clients" method="POST" class="client py-4">
                    @csrf
                    @method('post')
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="nom">Nom</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Nom">
                        </div>
                        <div class="col-sm-4">
                            <label for="tel">Tél</label>
                            <input type="text" name="phone" class="form-control"
                                placeholder="Tél">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Dettes</label>
                            <input type="number" name="debts" min="0" value="0" class="form-control"
                                placeholder="Dettes">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Dettes Alerte</label>
                            <input type="number" name="debtAlert" min="0" class="form-control"
                                placeholder="Dettes Alerte">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="info">Info</label>
                        <textarea name="info" name="info" cols="30" rows="1" class="form-control">
                        </textarea>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary py-2">
                            Ajouter ce client
                        </button>
                    </div>


                </form>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-body">
                <h4 class="font-weight-bold text-primary">Crée un nouveau fournisseur</h4>
                <form class="client py-4">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="nom">Nom</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Nom">
                        </div>
                        <div class="col-sm-4">
                            <label for="tel">Tél</label>
                            <input type="text" name="phone" class="form-control"
                                placeholder="Tél">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Dettes précédentes</label>
                            <input type="number" value="0" name="totalUnpaid" min="0" class="form-control"
                                placeholder="Dettes précédentes">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Dettes Alerte</label>
                            <input type="number" name="debtAlert" min="0" class="form-control"
                                placeholder="Dettes Alerte">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="info">Info</label>
                        <textarea name="info" name="info" cols="30" rows="1" class="form-control">
                        </textarea>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <a href="login.html" class="btn btn-primary py-2">
                            Ajouter ce fournisseur
                        </a>
                    </div>


                </form>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-body">
                <h4 class="font-weight-bold text-primary">Crée un nouveau produit</h4>
                <form class="produit py-4" action="/api/products" method="POST">
                    @csrf
                    @method('post')
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="nom">Nom</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Nom">
                        </div>
                        <div class="col-sm-2">
                            <label for="tel">Famille</label>
                            <input type="text" name="family" class="form-control"
                                placeholder="Famille">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Marque</label>
                            <input type="text" name="brand"  class="form-control"
                                placeholder="Marque">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Model</label>
                            <input type="text" name="model" class="form-control"
                                placeholder="Model">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Position</label>
                            <input type="text" name="position" class="form-control"
                                placeholder="Position">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label for="nom">Unité</label>
                            <select name="unit" class="form-select">
                                <option value="unité">Unité</option>
                                <option value="metre">Mètre</option>
                                <option value="kilogramme">Kilogramme</option>
                                <option value="litre">Litre</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="tel">Pièces/unité</label>
                            <input type="number" min="1" value="1" name="piecesInUnit" class="form-control"
                                placeholder="Nombre de pièces par unité">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Prix de vente/unité</label>
                            <input type="number" min="1" name="dUnitPrice"  class="form-control"
                                placeholder="Prix de vente par unité">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Prix de vente/pièce</label>
                            <input type="number" min="1" name="dPiecePrice" class="form-control"
                                placeholder="Prix de vente par pièce">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Prix gros/unité</label>
                            <input type="number" min="1" name="gUnitPrice" class="form-control"
                                placeholder="Prix gros par unité">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="tel">Quantité initiale des unités</label>
                            <input type="number" min="0" value="0" name="initUnitQ" class="form-control"
                                placeholder="Quantité initiale des unités">
                        </div>
                        <div class="col-sm-2">
                            <label for="tel">Quantité initiale des piéces</label>
                            <input type="number" min="0" value="0" name="initPieceQ" class="form-control"
                                placeholder="Quantité initiale des pièces">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Quantité alertée/unité</label>
                            <input type="number" min="1" name="quantityAlert"  class="form-control"
                                placeholder="Quantité alertée/unité">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="info">Info</label>
                        <textarea name="info" cols="30" rows="1" class="form-control">
                        </textarea>
                    </div>
                    <input type="hidden" name="gPiecePrice" value="0" id="">
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary py-2">
                            Ajouter ce produit
                        </button>
                    </div>


                </form>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-body">
                <h4 class="font-weight-bold text-primary">Crée un nouvelle achat</h4>
                <form class="client py-4">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="da">Produit</label>
                            <input type="text" name="productId"  class="form-control"
                                placeholder="Produit">
                        </div>
                        <div class="col-sm-2">
                            <label for="nom">Date d'achat</label>
                            <input type="date" name="shopDate" class="form-control"
                                >
                        </div>
                        <div class="col-sm-3">
                            <label for="tel">Fournisseur</label>
                            <select type="text" name="providerId" class="form-select form-control">
                                <option value="1">Knauf</option>
                                <option value="2">Fournisseur 2</option>
                                <option value="3">Fournisseur 3</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="tel">Quantité en unité</label>
                            <input type="number" min="1" name="quantity" class="form-control"
                                placeholder="Nombre d'unité achetées">
                        </div>
                        <div class="col-sm-2">
                            <label for="tel">Prix Total</label>
                            <input type="number" min="1" name="total" class="form-control"
                                placeholder="Prix total des unités">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="tel">Total payé</label>
                            <input type="number" min="1" value="1" name="totalPaid" class="form-control"
                                placeholder="Montant versé">
                        </div>
                        <div class="col-sm-4">
                            <label for="info">Info</label>
                            <textarea type="text" class="form-control" rows="1" cols="30" name="info" id=""></textarea>
                        </div>
                    </div>
                    <hr>
                    <h4 class="font-weight-bold text-primary">Modifier les informations de produit</h4>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="da">Prix de vente/unité</label>
                            <input type="number" min="1" name="dUnitPrice"  class="form-control"
                                placeholder="Prix de vente par unité">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Prix de vente/pièce</label>
                            <input type="number" min="1" name="dPiecePrice" class="form-control"
                                placeholder="Prix de vente par pièce">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Prix gros/unité</label>
                            <input type="number" min="1" name="gUnitPrice" class="form-control"
                                placeholder="Prix gros par unité">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Pièces/unité</label>
                            <input type="number" min="1" name="piecesInUnit" class="form-control"
                                placeholder="Nombre de pièces par unité">
                        </div>
                        <div class="col-sm-2">
                            <label for="da">Quantité alertée/unité</label>
                            <input type="number" min="1" name="quantityAlert"  class="form-control"
                                placeholder="Quantité alertée/unité">
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <a href="login.html" class="btn btn-primary py-2">
                            Ajouter l'achat
                        </a>
                    </div>
                </form>
            </div>
        </div>



    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des clients</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Nom</th>
                            <th>info</th>
                            <th>Tél</th>
                            <th>Dettes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahman massinissa</td>
                            <td>some random client information </td>
                            <td>0560779755</td>
                            <td>1540</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ahman ferhat</td>
                            <td>some random client information </td>
                            <td>0560779755</td>
                            <td>1940</td>
                        </tr>                                <tr>
                            <td>3</td>
                            <td>Ahman massinissa</td>
                            <td>some random client information </td>
                            <td>0560779755</td>
                            <td>1540</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des Produits</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Nom</th>
                            <th>Prix/unité</th>
                            <th>Prix/boite</th>
                            <th>Position</th>
                            <th>Prix d'achat/unité</th>
                            <th>Quantité restante/unité</th>
                            <th>Quantité restante/pièce</th>
                            <th>Prix gros</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahman massinissa</td>
                            <td>some random client information </td>
                            <td>0560779755</td>
                            <td>1540</td>
                            <td>1540</td>
                            <td>1540</td>
                            <td>1540</td>
                            <td>1540</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des fournisseurs</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Nom</th>
                            <th>info</th>
                            <th>Tél</th>
                            <th>Total payé</th>
                            <th>Total non payé</th>
                            <th>Dettes alerte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahman massinissa</td>
                            <td>some random client information </td>
                            <td>0560779755</td>
                            <td>1540</td>
                            <td>1540</td>
                            <td>1540</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des achats</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Date</th>
                            <th>Fournisseur</th>
                            <th>Produit</th>
                            <th>Qté</th>
                            <th>Total payé</th>
                            <th>Total restant</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>15/06/2022</td>
                            <td>Knauf </td>
                            <td>Ciment blanc 40kg</td>
                            <td>50</td>
                            <td>450540</td>
                            <td>1540</td>
                            <td>Some random info</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List des ventes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>N° Bon</th>
                            <th>Client</th>
                            <th>Produit</th>
                            <th>Qté/unité</th>
                            <th>Qté/pièce</th>
                            <th>Prix vente/unité</th>
                            <th>Prix vente/pièce</th>
                            <th>Total</th>
                            <th>Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>Massi ahman </td>
                            <td>Ciment blanc</td>
                            <td>2 sacs</td>
                            <td>4 kg</td>
                            <td>2000</td>
                            <td>50</td>
                            <td>4200</td>
                            <td>Some random info</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
