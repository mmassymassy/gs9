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
     * @param  \App\Models\Providers  $providers
     * @return \Illuminate\Http\Response
     */
    public function show(Providers $providers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Providers  $providers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Providers $providers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Providers  $providers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Providers $providers)
    {
        //
    }
}
