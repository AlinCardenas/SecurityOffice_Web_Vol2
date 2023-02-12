<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EntradasSalida
 *
 * @property $id
 * @property $entrada
 * @property $salida
 * @property $usuario_id
 * @property $bono_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Bono $bono
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EntradasSalida extends Model
{
    
    static $rules = [
		'entrada' => 'required',
		'usuario_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['entrada','salida','usuario_id','bono_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bono()
    {
        return $this->hasOne('App\Models\Bono', 'id', 'bono_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'usuario_id');
    }
    

}
