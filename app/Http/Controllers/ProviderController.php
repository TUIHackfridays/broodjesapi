<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProviderController extends BaseController
{
    /**
     * Display a listing of providers.
     * @SWG\Get(
        tags={"providers"},
        path="/providers",
        summary="List of providers",
        description="Returns a list of providers. Private endpoint",
        @SWG\Response(response=200, ref="#/responses/success_object")
        )
     */
    public function index()
    {
        $providers = Provider::all();
        return response()->json($providers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $provider = new Provider();
        $provider->name = $request->name;
        $provider->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::with('sandwiches')->find($id);
        return response()->json($provider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provider = Provider::find($id);
        $provider->name = $request->name;
        $provider->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete;
    }
}
