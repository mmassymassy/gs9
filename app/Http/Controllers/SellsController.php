<?php

namespace App\Http\Controllers;

use App\Models\Sells;
use Illuminate\Http\Request;
use App\Http\Resources\SellsResource;

class SellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SellsResource::collection(Sells::where('deleted',0)->get());
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
    public function show($id)
    {
        return json_encode(Shops::find($id));
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
        return SellsResource::collection(Sells::where('deleted',1)->get());
    }
    public function delete($id)
    {
        Sells::find($id)->update([
            'deleted'=> 1
        ]);
        return json_encode([
            'status' => 1,
            'message' => 'Achat supprimé'
        ]);
    }
    public function undelete($id)
    {
        Sells::where('id',$id)->update([
            'deleted' => 0
        ]);
        return json_encode([
            'status' => 1,
            'message' => 'Achat restauré'
        ]);
    }
    public function infos(){
        $Sells = count(Sells::where('deleted',0)->get());
        $deletedSells = count(Sells::where('deleted',1)->get());
        return json_encode([
            'sellsCount' => $Sells,
            'deletedSells' => $deletedSells,
        ]);
    }
}
