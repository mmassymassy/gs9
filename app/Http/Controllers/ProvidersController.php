<?php

namespace App\Http\Controllers;

use App\Models\Providers;
use Illuminate\Http\Request;
use App\Http\Resources\ProvidersResource;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProvidersResource::collection(Providers::where('deleted',0)->get());
    }
    public function deleted()
    {
        return ProvidersResource::collection(Providers::where('deleted',1)->get());
    }
    public function delete($id)
    {
        Providers::where('id',$id)->update([
            'deleted' => 1
        ]);
        return json_encode([
            'status' => 1,
            'message' => 'Fournisseur supprimé'
        ]);
    }
    public function undelete($id)
    {
        Providers::where('id',$id)->update([
            'deleted' => 0
        ]);
            return json_encode([
                'status' => 1,
                'message' => 'Fournisseur restauré'
            ]);


    }
    public function infos(){
        $providers = count(Providers::where('deleted',0)->get());
        $deletedProviders = count(Providers::where('deleted',1)->get());
        $debtsWithProviders = count(Providers::whereRaw('totalUnpaid > debtAlert')->get());
        return json_encode([
            'providersCount' => $providers,
            'deletedProviders' => $deletedProviders,
            'debtsWithProviders' => $debtsWithProviders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = Providers::create($request->all());
        if($t){
            return json_encode([
                'status' => 1,
                'message' => 'Fournisseur créé'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Providers  $providers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return json_encode(Providers::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Providers  $providers
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $r)
    {
        $provider = Providers::find($id);
        $provider->update($r->all());
        return json_encode([
            'status' => 1,
            'message' => 'Founisseur modifié'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Providers  $providers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Providers::find($id);
        if($p->delete()){
            return json_encode([
                'status' => 1,
                'message' => 'Fournisseur supprimé'
            ]);

        }

    }
}
