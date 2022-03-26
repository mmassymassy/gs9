<?php

namespace App\Http\Controllers;

use App\Models\Shops;
use App\Models\Products;
use App\Models\Providers;
use Illuminate\Http\Request;
use App\Http\Resources\ShopsResource;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ShopsResource::collection(Shops::where('deleted',0)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $t = Shops::create($request->all());
        if($t){
            $f = Providers::find($request->providerId);
            $f->update([
                'totalPaid' => $f->totalPaid + $request->totalPaid,
                'totalUnpaid' => $f->totalUnpaid + $request->total - $request->totalPaid
            ]);
            $product = Products::find($request->productId);
            $initUnitQ = $request->quantity + $product->initUnitQ;
            $initPieceQ = $product->initPieceQ + $request->quantity * $product->piecesInUnit;
            $product->update([
                'initUnitQ'=> $initUnitQ,
                'initPieceQ'=>$initPieceQ
            ]);
         return json_encode([
             'status' => 1,
             'message' => 'Achat créé'
         ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function show(Shops $shops)
    {
        return json_encode(Shops::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shops $shops)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shops  $shops
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shops $shops)
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
            'message' => 'Achat supprimé'
        ]);
    }
    public function undelete($id)
    {
        Shops::where('id',$id)->update([
            'deleted' => 0
        ]);
        return json_encode([
            'status' => 1,
            'message' => 'Achat restauré'
        ]);
    }
    public function infos(){
        $Shops = count(Shops::where('deleted',0)->get());
        $deletedShops = count(Shops::where('deleted',1)->get());
        return json_encode([
            'shopsCount' => $Shops,
            'deletedShops' => $deletedShops,
        ]);
    }
}
