<?php

namespace App\Http\Controllers;
use App\Direccionenvio;

use Illuminate\Http\Request;

class DireccionenvioLocacionController extends Controller
{
    public function index($id)
    {
        $Direccionenvio=Direccionenvio::findOrfail($id);
        $locacion = $Direccionenvio->rela_Locacion;
        return $this->successResponse($locacion);
    }
}
