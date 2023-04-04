<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iotsistema extends Model
{
    use HasFactory;

    protected $fillable = ['estado', 'voltaje','temperatura'];

    public function entradasSalidas()
    {
        return $this->hasMany('App\Models\Sucursale', 'sistema_id', 'id');
    }

}
