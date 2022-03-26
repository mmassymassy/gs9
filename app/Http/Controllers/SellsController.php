<?php

namespace App\Http\Controllers;

use App\Models\Sells;
use Illuminate\Http\Request;

class SellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sells  $sells
     * @return \Illuminate\Http\Response
     */
    public function show(Sells $sells)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sells  $sells
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sells $sells)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sells  $sells
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sells $sells)
    {
        //
    }
    public function deleted()
    {
        return ShopsResource::collection(Shops::where('deleted',1)->get());
    }
    public function delete($id)
    {
        Shops::where('id',$id)->update([
            'deleted' => 1
        ]);
        return json_encode([
            'status' => 1,
            'message' => 'Produit supprimé'
        ]);
    }
    public function undelete($id)
    {
        Shops::where('id',$id)->update([
            'deleted' => 0
        ]);
        return json_encode([
            'status' => 1,
            'message' => 'Client restauré'
        ]);
    }
    public function infos(){
        $Shops = count(Shops::where('deleted',0)->get());
        $deletedShops = count(Shops::where('deleted',1)->get());
        return json_encode([
            'ShopsCount' => $Shops,
            'deletedShops' => $deletedShops,
        ]);
    }
}
