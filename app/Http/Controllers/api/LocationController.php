<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Location;
use App\Http\Resources\Location as LocationResource;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retorna todos os registros do banco em Location
        $location = Location::all();
        return new LocationResource($location);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Faz um registro no banco
        $location = new Location();
        $location->street = $request->input('street');
        $location->number = $request->input('number');
        $location->district = $request->input('district');
        $location->city = $request->input('city');
        $location->state = $request->input('state');
        $location->zipcode = $request->input('zipcode');
        $location->observation = $request->input('observation');

        return new LocationResource($location);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Retorna apenas 1 registro
        $location = Location::findOrFail($id);
        return new LocationResource($location);
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
        //Atualiza dados do banco
        $location = Location::findOrFail($id);

        $location->street = $request->input('street');
        $location->number = $request->input('number');
        $location->district = $request->input('district');
        $location->city = $request->input('city');
        $location->state = $request->input('state');
        $location->zipcode = $request->input('zipcode');
        $location->observation = $request->input('observation');
        $location->save();

        return new LocationResource($location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Exclui um registro baseado no id
        $location = Location::findOrFail($id);
        if($location->delete()){
            return new LocationResource($location);
        }
    }
}
