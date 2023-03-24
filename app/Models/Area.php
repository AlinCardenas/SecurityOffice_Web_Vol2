<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 *
 * @property $id
 * @property $nombre
 * @property $estatus
 * @property $created_at
 * @property $updated_at
 *
 * @property Puesto[] $puestos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Area extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'estatus' => 'required',
		'sucursal_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','estatus', 'sucursal_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puestos()
    {
        return $this->hasMany('App\Models\Puesto', 'area_id', 'id');
    }
    public function sucursal()
    {
        return $this->hasOne('App\Models\Sucursale', 'id', 'sucursal_id');
    }

}
