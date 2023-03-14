<?php

namespace App\Http\Controllers;

use App\Models\EntradasSalida;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function asistencias(){
        $registros = EntradasSalida::whereMonth('fecha', '01')->get();

        return view('userview.asistencias', compact('registros'));
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
