<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestosApiController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'salario' => 'required',
            'estatus' => 'required',
            'rol' => 'required',
            'area_id' => 'required',
        ]);

        $registros = new Puesto();

        $registros->nombre = $request->nombre;
        $registros->salario = $request->salario;
        $registros->estatus = $request->estatus;
        $registros->rol = $request->rol;
        $registros->area_id = $request->area_id;

        $registros->save();
    }

    public function update(Request $request){
        $registros = Puesto::findOrFail($request->id);

        $registros->nombre = $request->nombre;
        $registros->salario = $request->salario;
        $registros->estatus = $request->estatus;
        $registros->rol = $request->rol;
        $registros->area_id = $request->area_id;

        $registros->save();

        return $registros;
    }

    public function destroy($id){
        $registros = Puesto::destroy($id);
        return $registros;
    }
}
