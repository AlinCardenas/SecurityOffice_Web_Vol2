<?php

namespace App\Http\Controllers;

use App\Models\Bono;
use App\Models\EntradasSalida;
use App\Models\Iotsistema;
use App\Models\Puesto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //* ASISTENCIAS
    public function asistencias(){
        $hoy = Carbon::today();
        $registros = EntradasSalida::select('entrada', 'salida', 'usuario_id')->whereDate('fecha', '=', $hoy)->whereNotNull('salida')->with('user.puesto')->get();

        return $registros;
    }

    //* REGISTROS
    public function registros(){
        $hoy = Carbon::today();
        $registros = EntradasSalida::select('entrada', 'salida', 'usuario_id')->whereDate('fecha', '=', $hoy)->with('user.puesto')->get();

        return $registros;
    }

    //* INASISTENCIAS
    public function inasistencias(){

        $hoy = Carbon::today();
        $registros = User::select('*')->whereNotIn('id',function($query){$query->select('usuario_id')->from('entradas_salidas')->whereDate('fecha', '=', Carbon::today());})->with('puesto')->get();

        return $registros;
    }

    //* EMPLEADOS CON BONO
    public function empleadobono(){
        $hoy = Carbon::today();

        $registros = EntradasSalida::select('*')->whereDate('fecha', '=', $hoy)->whereNotNull('bono_id')->with('user.puesto')->with('bono')->get();

        return $registros;
    }

    //* LISTADO DE BONOS DISPONIBLES
    public function bonos(){
        $registros = Bono::all();

        return $registros;
    }

    //* Voltaje y temperatura
    public function voltem(){
        $registro = Iotsistema::all();

        return $registro;
    }

    //* Usuarios
    public function getUsers(){
        $registros = User::select('*')->with('puesto')->get();

        return $registros;
    }

    //* Puestos
    public function getPuestos(){
        $registros = Puesto::select('*')->with('area')->get();

        return $registros;
    }

    //* Bonos
    public function getBonos(){
        $registros = Bono::select('*')->get();

        return $registros;
    }

    //* Mis entradas
    public function registrosEntradas(){
        $mes = Carbon::now()->month;
        $anio = Carbon::now()->year;
        $registros = EntradasSalida::select('*')->whereMonth('fecha', $mes)->whereYear('fecha', $anio)->with('user')->get();

        return $registros;
    }

    //* Mis bonos
    public function registrosBonos(){
        $mes = Carbon::now()->month;
        $anio = Carbon::now()->year;
        $registros = EntradasSalida::select('*')->whereNotNull('bono_id')->with('bono')->get();

        return $registros;
    }

}
