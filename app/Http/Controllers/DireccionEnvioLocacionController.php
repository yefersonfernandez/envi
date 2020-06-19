<?php

namespace App\Http\Controllers;
use App\Direccionenvio;

use Illuminate\Http\Request;

class DireccionenvioLocacionController extends Controller
{
    public function index(Direccionenvio $Direccionenvio)
    {
        $locacion = $Direccionenvio->rela_Locacion;
        return $this->successResponse($locacion);
    }
}
