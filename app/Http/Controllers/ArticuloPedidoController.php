<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;

class ArticuloPedidoController extends Controller
{
    public function index($id)
    {
        $articulo=Articulo::findOrfail($id);
        $pedido = $articulo->rela_Pedido;
        return $this->successResponse($pedido);
    }
}
