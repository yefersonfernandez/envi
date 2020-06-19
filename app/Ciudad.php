<?php

namespace App;
use App\Direccionenvio;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable = [
        'id',
        'nombre'
    ];
    
    public function rela_Direccionenvio()
    {

        return $this->hasMany(Direccionenvio::class);
    }
}
