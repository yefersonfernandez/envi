<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locacion extends Model
{
    protected $fillable = [
        'id',
        'longitud',
        'latitud',
        'Direccionenvio_id'
    ];

    public function rela_Direccionenvio()
    {

        return $this->belongsTo(Direccionenvio::class);
    }

}
