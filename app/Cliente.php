<?php

namespace App;
use App\Direccionenvio;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'email',
        'telefono'
    ];

    public function rela_Direccionenvio()
    {

        return $this->hasMany(Direccionenvio::class);
    }
}
