<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;


class ClienteDireccionenvioController extends Controller
{
    public function index(Cliente $cliente)
    {
        $Direccionenvio = $cliente->rela_Direccionenvio;
        return $this->successResponse($Direccionenvio);
    }
}
