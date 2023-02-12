<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Turno
 *
 * @property $id
 * @property $turno
 * @property $hora_inicio
 * @property $hora_fin
 * @property $created_at
 * @property $updated_at
 *
 * @property PuestosTurno[] $puestosTurnos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Turno extends Model
{
    
    static $rules = [
		'turno' => 'required',
		'hora_inicio' => 'required',
		'hora_fin' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['turno','hora_inicio','hora_fin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puestosTurnos()
    {
        return $this->hasMany('App\Models\PuestosTurno', 'turno_id', 'id');
    }
    

}
