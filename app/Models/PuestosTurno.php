<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PuestosTurno
 *
 * @property $id
 * @property $puesto_id
 * @property $turno_id
 * @property $lapso
 * @property $fechaIngreso
 * @property $created_at
 * @property $updated_at
 *
 * @property Puesto $puesto
 * @property Turno $turno
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PuestosTurno extends Model
{
    
    static $rules = [
		'puesto_id' => 'required',
		'turno_id' => 'required',
		'lapso' => 'required',
		'fechaIngreso' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['puesto_id','turno_id','lapso','fechaIngreso'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function puesto()
    {
        return $this->hasOne('App\Models\Puesto', 'id', 'puesto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function turno()
    {
        return $this->hasOne('App\Models\Turno', 'id', 'turno_id');
    }
    

}
