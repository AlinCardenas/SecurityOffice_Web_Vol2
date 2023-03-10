<?php

namespace App\Http\Controllers;

use App\Models\EntradasSalida;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsisInasisController extends Controller
{
    public function asistencias(){
        $hoy = Carbon::today();
        $registros = EntradasSalida::select('entrada', 'salida', 'usuario_id')->whereDate('fecha', '=', $hoy)->whereNotNull('salida')->get();
        $cantidad = EntradasSalida::select('entrada', 'salida', 'usuario_id')->whereDate('fecha', '=', $hoy)->whereNotNull('salida')->count();
        // dump($cantidad);
        return view('welcome', compact('registros', 'cantidad'));
    }

    public function inasistencias(){
        $hoy = Carbon::today();
        $registros = User::select('*')->whereNotIn('id',function($query){$query->select('usuario_id')->from('entradas_salidas');})->get();
        $cantidad = User::select('*')->whereNotIn('id',function($query){$query->select('usuario_id')->from('entradas_salidas');})->count();

        // dump($registros);
        return view('faltas', compact('registros', 'cantidad'));
    }
    
}
