<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Http\Resources\ClientsResource;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClientsResource::collection(Clients::where('deleted',0)->get());
    }
    public function deleted()
    {
        return ClientsResource::collection(Clients::where('deleted',1)->get());
    }
    public function delete($id)
    {
        Clients::where('id',$id)->update([
            'deleted' => 1
        ]);
        return json_encode([
            'status' => 1,
            'message' => 'Client supprimé'
        ]);
    }
    public function undelete($id)
    {
        Clients::where('id',$id)->update([
            'deleted' => 0
        ]);
        return json_encode([
            'status' => 1,
            'message' => 'Client restauré'
        ]);
    }
    public function infos(){
        $clients = count(Clients::where('deleted',0)->get());
        $deletedClients = count(Clients::where('deleted',1)->get());
        $clientWithDebts = count(Clients::where('debts','>','debtAlert')->get());
        return json_encode([
            'clientsCount' => $clients,
            'deletedClients' => $deletedClients,
            'clientsWithDebts' => $clientWithDebts
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
        $t = Clients::create($request->all());
        if($t){
            return json_encode([
                'status' => 1,
                'message' => 'Client créé'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return json_encode(Clients::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $clients)
    {
        $clients->update($request->all());
        return json_encode([
            'status' => 1,
            'message' => 'Client modifié'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clients::destroy($id);
        return json_encode([
            'status' => 1,
            'message' => 'Client modifié'
        ]);
    }
}
