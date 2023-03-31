<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SuperApiController extends Controller
{
    public function login(){
        $registros = User::all();

        return $registros;
    }
}
