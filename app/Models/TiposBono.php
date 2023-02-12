<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposBono
 *
 * @property $id
 * @property $tipo
 * @property $created_at
 * @property $updated_at
 *
 * @property Bono[] $bonos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TiposBono extends Model
{
    
    static $rules = [
		'tipo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonos()
    {
        return $this->hasMany('App\Models\Bono', 'tipoBonos_id', 'id');
    }
    

}
