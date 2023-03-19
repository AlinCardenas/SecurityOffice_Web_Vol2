<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursale extends Model
{
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'telefono' => 'required',
		'sistema_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion', 'telefono', 'sistema_id'];

    public function area()
    {
        return $this->hasMany('App\Models\Area', 'sucursal_id', 'id');
    }
}
