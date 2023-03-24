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
        'nombre' => 'required',
		'cantidad' => 'required',
		'descripcion' => 'required',
		'tipo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'cantidad','descripcion','tipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entradasSalidas()
    {
        return $this->hasMany('App\Models\EntradasSalida', 'bono_id', 'id');
    }
    
}
