<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;


class ClienteDireccionenvioController extends Controller
{
    public function index($id)
    {
        $cliente=Cliente::findOrfail($id);
        $Direccionenvio = $cliente->rela_Direccionenvio;
        return $this->successResponse($Direccionenvio);
    }
}
