<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class PedidoArticuloController extends Controller
{
    public function index($id)
    {
        $pedido=Pedido::findOrfail($id);
        $articulo = $pedido->rela_Articulo;
        return $this->successResponse($articulo);
    }
}
