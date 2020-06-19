<?php

namespace App\Http\Controllers;

use App\Direccionenvio;
use Illuminate\Http\Request;

class DireccionenvioController extends Controller
{
    /**
     * Display a listing of the resource.                                                      
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Direccionenvios = Direccionenvio::all();
         return $this->successResponse($Direccionenvios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'descripcion' => 'required',
            'ciudad_id' => 'required',
            'cliente_id' => 'required'
        ];
        $this->validate($request,$rules);
        
        $campos = $request->all();
        //dd($campos);
        $Direccionenvio = Direccionenvio::create($campos);
        return $this->successResponse($Direccionenvio);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Direccionenvio  $Direccionenvio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Direccionenvio = Direccionenvio::findOrFail($id);
        return $Direccionenvio;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Direccionenvio  $Direccionenvio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'descripcion' => 'string',
        ];
        //dd($request);
        $this->validate($request,$rules);
        $Direccionenvio = Direccionenvio::findOrFail($id);
        $Direccionenvio->fill($request->all());
        

        //dd($request);
        if($Direccionenvio->isClean()){
            return response()->json("No se hicieron cambios",422);
        }

        $Direccionenvio->save();
        
        return $this->successResponse($Direccionenvio);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direccionenvio  $Direccionenvio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Direccionenvio = Direccionenvio::findOrFail($id);
        $Direccionenvio->delete();
        return $this->successResponse($Direccionenvio);
    }
}
