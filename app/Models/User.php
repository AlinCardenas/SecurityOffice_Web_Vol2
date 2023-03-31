<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    static $rules = [
		'nombre' => 'required',
		'appA' => 'required',
		'appB' => 'required',
		'fechaN' => 'required',
        'foto' => 'required|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        'email' => 'required'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'appA', 'appB', 'fechaN', 'genero', 'foto', 'email', 'password', 'estatus', 'puesto_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function puesto()
    {
        return $this->hasOne('App\Models\Puesto', 'id', 'puesto_id');
    }
}
