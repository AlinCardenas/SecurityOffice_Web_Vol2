<?php

namespace App\Http\Controllers;

use App\Models\EntradasSalida;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AsisInasisController extends Controller
{

    public function getMonths(){
        //* Obtener id de usuario
        $my_id = Auth::user()->id;
        $datos=[];

        $enero = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '01')->count();
        $febrero = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '02')->count();
        $marzo = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '03')->count();
        $abril = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '04')->count();
        $mayo = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '05')->count();
        $junio = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '06')->count();
        $julio = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '07')->count();
        $agosto = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '08')->count();
        $septiembre = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '9')->count();
        $octubre = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '10')->count();
        $noviembre = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '11')->count();
        $diciembre = EntradasSalida::where('usuario_id', $my_id)->whereMonth('fecha', '12')->count();

        if($enero>0){ array_push($datos, $enero); }
        if($febrero>0){ array_push($datos, $febrero); }
        if($marzo>0){ array_push($datos, $marzo); }
        if($abril>0){ array_push($datos, $abril); }
        if($mayo>0){ array_push($datos, $mayo); }
        if($junio>0){ array_push($datos, $junio); }
        if($julio>0){ array_push($datos, $julio); }
        if($agosto>0){ array_push($datos, $agosto); }
        if($septiembre>0){ array_push($datos, $septiembre); }
        if($octubre>0){ array_push($datos, $octubre); }
        if($noviembre>0){ array_push($datos, $noviembre); }
        if($diciembre>0){ array_push($datos, $diciembre); }

        return $datos; 
    }

    public function asistencias(){

        $valores = $this->getMonths();
        $valores = json_encode($valores);

        $hoy = Carbon::today();
        $registros = EntradasSalida::select('entrada', 'salida', 'usuario_id')->whereDate('fecha', '=', $hoy)->whereNotNull('salida')->get();
        $cantidad = EntradasSalida::select('entrada', 'salida', 'usuario_id')->whereDate('fecha', '=', $hoy)->whereNotNull('salida')->count();
        // dump($cantidad);
        return view('welcome', compact('registros', 'cantidad', 'valores'));
    }

    public function inasistencias(){
        
        $hoy = Carbon::today();
        // $usuarios = EntradasSalida::select('usuario_id')->whereDate('fecha', '=', $hoy)->get();
 
        $registros = User::select('*')->whereNotIn('id',function($query){$query->select('usuario_id')->from('entradas_salidas')->whereDate('fecha', '=', Carbon::today());})->get();
        $cantidad = User::select('*')->whereNotIn('id',function($query){$query->select('usuario_id')->from('entradas_salidas')->whereDate('fecha', '=', Carbon::today());})->count();

        return view('faltas', compact('registros', 'cantidad'));
    }
    
}
