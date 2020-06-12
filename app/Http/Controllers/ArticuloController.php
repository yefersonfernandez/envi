<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{
    public function __construct()
    {
        // $this->middleware('client-credentials');
        //  $this->middleware('client-credentials', ['only'=> ['index']] );

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all();
        return $this->successResponse($articulos);
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
            'valorUnitario' => 'required',
            'imagen' => 'required|image'
        ];
        $this->validate($request,$rules);
        
        $campos = $request->all();
        $campos['imagen']= $request->imagen->store('');

        //dd($campos);
        $Articulo = Articulo::create($campos);
        return $this->successResponse($Articulo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $Articulo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Articulo = Articulo::findOrFail($id);
        return $Articulo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $Articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'valorUnitario' => 'integer',
            'imagen' => 'image',
        ];
        
        $this->validate($request,$rules);
        $articulo = Articulo::findOrFail($id);
        $articulo->fill($request->execpt(['imagen']));

        if($request->hasFile('imagen')){
            Storage::delete($articulo->imagen);
            $articulo->imagen = $request->imagen->store('');
        }
        
        if($articulo->isClean()){
            return response()->json("No se hicieron cambios",422);
        }
        $articulo->save();
        return $this->successResponse($articulo);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $Articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);
        Storage::delete($articulo->imagen);
        $articulo->delete();
        return $this->successResponse($articulo);
    }
}
