<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function asistencias(){
        return view('userview.asistencias');
    }
    public function inasistencias(){
        return view('userview.inasistencias');
    }
    public function mbonos(){
        return view('userview.misbonos');
    }
    public function bonos(){
        return view('userview.bonos');
    }
}
