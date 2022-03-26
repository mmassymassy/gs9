<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Resources\ProductsResource;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductsResource::collection(Products::where('deleted',0)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $t = Products::create($request->all());
       if($t){
        return json_encode([
            'status' => 1,
            'message' => 'Produit créé'
        ]);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return json_encode(Products::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $product = Products::find($id);
        if ($product->update($request->all()) ){
            return json_encode([
                'status' => 1,
                'message' => 'Produit modifié'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        $product = Products::find($id);
        $product->delete();
        return json_encode([
            'status' => 1,
            'message' => 'Produit supprimé'
        ]);

    }
    public function deleted()
    {
        return ProductsResource::collection(Products::where('deleted',1)->get());
    }
    public function alerted()
    {
        return ProductsResource::collection(Products::whereRaw('initUnitQ < quantityAlert')->get());
    }
    public function delete($id)
    {
        Products::where('id',$id)->update([
            'deleted' => 1
        ]);
        return json_encode([
            'status' => 1,
            'message' => 'Produit supprimé'
        ]);
    }
    public function undelete($id)
    {
        Products::where('id',$id)->update([
            'deleted' => 0
        ]);
        return json_encode([
            'status' => 1,
            'message' => 'Client restauré'
        ]);
    }
    public function infos(){
        $Products = count(Products::where('deleted',0)->get());
        $deletedProducts = count(Products::where('deleted',1)->get());
        $alertedProducts = count(Products::whereRaw('initUnitQ < quantityAlert')->get());
        return json_encode([
            'productsCount' => $Products,
            'deletedProducts' => $deletedProducts,
            'alertedProducts' => $alertedProducts
        ]);
    }
}
