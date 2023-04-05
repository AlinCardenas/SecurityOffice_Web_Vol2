<?php

namespace App\Http\Controllers;

use App\Models\Bono;
use Illuminate\Http\Request;

class BonosApiController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'salario' => 'required',
            'descripcion' => 'required',
            'tipo' => 'required',
        ]);

        $registros = new Bono();

        $registros->nombre = $request->nombre;
        $registros->cantidad = $request->cantidad;
        $registros->descripcion = $request->descripcion;
        $registros->tipo = $request->tipo;

        $registros->save();
    }

    public function update(Request $request){
        $registros = Bono::findOrFail($request->id);

        $registros->nombre = $request->nombre;
        $registros->cantidad = $request->cantidad;
        $registros->descripcion = $request->descripcion;
        $registros->tipo = $request->tipo;

        $registros->save();

        return $registros;
    }

    public function destroy($id){
        $registros = Bono::destroy($id);
        return $registros;
    }
}
