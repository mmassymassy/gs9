<template>
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body">
                <h4 class="font-weight-bold text-primary">Crée un nouveau client</h4>
                <form action="/api/clients" method="POST" class="client py-4">
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
                        <textarea name="info" cols="30" rows="1" class="form-control">
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

    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
