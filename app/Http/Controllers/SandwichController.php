<?php

namespace App\Http\Controllers;

use App\Models\Sandwich;
use Illuminate\Http\Request;

use App\Http\Requests;

class SandwichController extends BaseController
{
    /**
     * Display a listing of the sandwiches.
     * @SWG\Get(
        tags={"sandwiches"},
        path="/sandwiches",
        summary="List of sandwiches",
        description="Returns a list of sandwiches. Private endpoint",
        @SWG\Response(response=200, ref="#/responses/success_object")
        )
     */
    public function index()
    {
        $sandwiches = Sandwich::with('provider')->get();
        return response()->json($sandwiches);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sandwich = new Sandwich();
        $sandwich->name = $request->name;
        $sandwich->description = $request->description;
        $sandwich->price = $request->price;
        $sandwich->provider_id = $request->provider_id;

        $sandwich->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sandwich = Sandwich::find($id);
        return response()->json($sandwich);
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
        $sandwich = Sandwich::find($id);
        $sandwich->name = $request->name;
        $sandwich->description = $request->description;
        $sandwich->price = $request->price;
        $sandwich->provider_id = $request->provider_id;
        $sandwich->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sandwich = Sandwich::find($id);
        $sandwich->delete();
    }
}
