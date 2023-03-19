<?php

namespace App\Http\Controllers;

use App\Models\Bono;
use App\Models\EntradasSalida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserViewController extends Controller
{
    public function inasistencias(){
        return view('userview.inasistencias');
    }
    public function mbonos(){
        $my_id = Auth::user()->id;
        
        $registros = EntradasSalida::where('usuario_id', $my_id)->whereNotNull('bono_id')->get();

        return view('userview.misbonos', compact('registros'));
    }

    public function bonos(){
        $registros = Bono::all();
        return view('userview.bonos', compact('registros'));
    }
}
