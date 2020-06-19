<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;


class CiudadDireccionenvioController extends Controller
{
    public function index($id)
    {
        $ciudad=Ciudad::findOrfail($id);
        $Direccionenvio = $ciudad->rela_Direccionenvio;
        return $this->successResponse($Direccionenvio);
    }
}
