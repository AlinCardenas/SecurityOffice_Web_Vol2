<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class faltasController extends Controller
{
    public function __invoke(){
        return view('faltas');
    }
}
