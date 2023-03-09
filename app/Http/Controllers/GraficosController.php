<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\EntradasSalida;
use Illuminate\Http\Request;



class GraficosController extends Controller
{
    public function welcome(){
        // ? Trae todos las fechas de forma unica
        // $registros = Attendance::select('fecha')->groupBy('fecha')->orderBy('fecha')->get();
                $registros = EntradasSalida::select('fecha', EntradasSalida::raw('count(fecha) as count'))->groupBy('fecha')->orderByDesc('fecha')->limit(7)->get();

        $puntos = [];
        foreach($registros as $registro){
            $date = Carbon::parse($registro['fecha'])->format('l');
            switch ($date) {
                case 'Monday':
                    $date='Lunes';
                break;
                case 'Tuesday':
                    $date='Martes';
                break;
                case 'Wednesday':
                    $date='Miercoles';
                break;
                case 'Thursday':
                    $date='Jueves';
                break;
                case 'Friday':
                    $date='Viernes';
                break;
                case 'Saturday':
                    $date='Sabado';
                break;
                case 'Sunday':
                    $date='Domingo';
                break;
                
                default:
                break;
            }
            $puntos[] = ['nombre' => $registro['fecha'], 'y' => floatval($registro['count']), 'drilldown' => $registro['fecha']];
        }
  

        // return view('ver', compact('registros'));
        return view('welcome',  ['data' => json_encode($puntos)] );
    }

    public function faltas(){
        $registros = EntradasSalida::select('fecha', EntradasSalida::raw('count(fecha) as count'))->groupBy('fecha')->orderByDesc('fecha')->limit(7)->get();
        $cantidad = User::select(User::raw('count(nombre) as count'))->get();
        $cant=0;
        foreach ($cantidad as $item) {
            $cant=$item['count'];
        }
        
        $puntos = [];
        foreach($registros as $registro){
            $date = Carbon::parse($registro['fecha'])->format('l');
            switch ($date) {
                case 'Monday':
                    $date='Lunes';
                break;
                case 'Tuesday':
                    $date='Martes';
                break;
                case 'Wednesday':
                    $date='Miercoles';
                break;
                case 'Thursday':
                    $date='Jueves';
                break;
                case 'Friday':
                    $date='Viernes';
                break;
                case 'Saturday':
                    $date='Sabado';
                break;
                case 'Sunday':
                    $date='Domingo';
                break;
                
                default:
                break;
            }
            $faltas = $cant-$registro['count'];
            $puntos[] = ['nombre' => $registro['fecha'], 'y' => floatval($faltas), 'drilldown' => $registro['fecha']];
        }
        return view('faltas', ['data' => json_encode($puntos)]);
    }

    public function entradasSalidas(){
        $hoy = Carbon::today();
        $entradas = EntradasSalida::select(EntradasSalida::raw('count(entrada) as count'))->whereDate('fecha', '=', $hoy)->get();
        $salidas = EntradasSalida::select(EntradasSalida  ::raw('count(salida)as count'))->whereDate('fecha', '=', $hoy)->get();
        $entradashoy=0;
        $salidashoy=0;
        foreach ($entradas as $item) {
            $entradashoy = $item['count'];
        }
        foreach ($salidas as $item) {
            $salidashoy = $item['count'];
        }
        // dump($salidashoy);
        return view('entradasSalidas', ['entradas' => json_encode($entradashoy), 'salidas' => json_encode($salidashoy) ]);
    }

    public function temperatura(){
        $temperatura = 24;

        return view('temperatura', ['temperatura' => json_encode($temperatura)]);
    }

    public function voltaje(){
        $voltaje = 4;
        return view('voltaje')->with(['voltaje' => json_encode($voltaje)]);
    }
}
