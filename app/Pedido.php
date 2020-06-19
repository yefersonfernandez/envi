<?php

namespace App;
use App\Direccionenvio;
use App\Articulo;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id',
        'fechaPedido',
        'Direccionenvio_id'
    ];

    public function rela_Direccionenvio()
    {

        return $this->belongsTo(Direccionenvio::class);
    }
    public function rela_Articulo()
    {

        return $this->belongsToMany(Articulo::class);
    }
}
