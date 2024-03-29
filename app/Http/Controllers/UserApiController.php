<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'appA' => 'required',
            'appB' => 'required',
            'genero' => 'required',
            'email' => 'required',
            'password' => 'required',
            'puesto_id' => 'required',
        ]);

        $registros = new User();

        $gen_pass = $request->password;
        $hashed = Hash::make($gen_pass, [
            'rounds' => 15,
        ]);
        
        $registros->password = $hashed;

        $registros->nombre = $request->nombre;
        $registros->appA = $request->appA;
        $registros->appB = $request->appB;
        $registros->fechaN = $request->fechaN;
        $registros->genero = $request->genero;
        $registros->email = $request->email;
        $registros->puesto_id = $request->puesto_id;
        
        $registros->save();
    }

    public function update(Request $request){
        $registros = User::findOrFail($request->id);

        $registros->nombre = $request->nombre;
        $registros->appA = $request->appA;
        $registros->appB = $request->appB;
        $registros->fechaN = $request->fechaN;
        $registros->genero = $request->genero;
        $registros->email = $request->email;
        $registros->puesto_id = $request->puesto_id;

        $registros->save();

        return $registros;
    }

    public function destroy($id){
        $registros = User::destroy($id);
        return $registros;
    }
}
