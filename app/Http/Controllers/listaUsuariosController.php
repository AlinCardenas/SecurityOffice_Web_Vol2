<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listaUsuariosController extends Controller
{
    public function __invoke(){
        return view('listaUsuarios');
    }
}
