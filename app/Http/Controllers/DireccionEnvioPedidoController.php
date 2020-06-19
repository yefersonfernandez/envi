<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direccionenvio;

class DireccionenvioPedidoController extends Controller
{
    public function index($id)
    {
        $Direccionenvio=Direccionenvio::findOrfail($id);
        $pedido = $Direccionenvio->rela_Pedido;
        return $this->successResponse($pedido);
    }
}
