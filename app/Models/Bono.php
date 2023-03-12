<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 /**
 * Class Bono
 *
 * @property $id
 * @property $cantidad
 * @property $descripcion
 * @property $tipoBonos_id
 * @property $created_at
 * @property $updated_at
 *
 * @property EntradasSalida[] $entradasSalidas
 * @property TiposBono $tiposBono
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bono extends Model
{
    
    static $rules = [
		'cantidad' => 'required',
		'descripcion' => 'required',
		'tipoBonos_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad','descripcion','tipoBonos_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entradasSalidas()
    {
        return $this->hasMany('App\Models\EntradasSalida', 'bono_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tiposBono()
    {
        return $this->hasOne('App\Models\TiposBono', 'id', 'tipoBonos_id');
    }
    

}
