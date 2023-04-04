<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Puesto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        $user = new User();
        $registro = Puesto::pluck('nombre', 'id');
        return view('auth.register', compact( 'user', 'registro'));
    }

    public function registerVerify(Request $request){
        $request->validate([
            'nombre' => 'required',
		    'appA' => 'required',
		    'appB' => 'required',
		    'fechaN' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'email' => 'required'
        ]);

        $usuario = new User();

        if($request->foto!=null){
            $path = $request->foto->store('public/box');
            $usuario->foto = $path;
        }

        $gen_pass = $request->password;
        $hashed = Hash::make($gen_pass, [
            'rounds' => 15,
        ]);

        $usuario->password = $hashed;

        $usuario->nombre = $request->nombre;
        $usuario->appA = $request->appA;
        $usuario->appB = $request->appB;
        $usuario->fechaN = $request->fechaN;
        $usuario->genero = $request->genero;
        $usuario->email = $request->email;
        // $usuario->estatus = $request->estatus;
        $usuario->puesto_id = $request->puesto_id;

        $usuario->save();

        return redirect()->route('login')->with('success', 'Registro generado');
    }

    public function login(){
        return view('auth.login');
    }

    public function loginVerify(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('inicio');
        }
        return back()->withErrors(['invalid_credentials'=>'Credenciales incorrectas'])->withInput();
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('login');
    }

}
