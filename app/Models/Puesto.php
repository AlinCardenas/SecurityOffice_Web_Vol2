<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Puesto
 *
 * @property $id
 * @property $nombre
 * @property $salario
 * @property $estatus
 * @property $rol
 * @property $area_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @property PuestosTurno[] $puestosTurnos
 * @property User[] $users
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Puesto extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'salario' => 'required',
		'estatus' => 'required',
		'rol' => 'required',
		'area_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','salario','estatus','rol','area_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'id', 'area_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puestosTurnos()
    {
        return $this->hasMany('App\Models\PuestosTurno', 'puesto_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'puesto_id', 'id');
    }
    

}
