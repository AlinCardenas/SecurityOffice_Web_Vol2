<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function index($id){
        // dump($id);
        $user = User::find($id);
        $registro = Puesto::pluck('nombre', 'id');
        return view('editarPerfil', compact('user','registro'));
    }

    public function update(Request $request, User $user)
    { 
        request()->validate(User::$rules);

        if($request->foto!=null){
            $path = $request->foto->store('public/box');
            $user->foto = $path;
        }

        $user->nombre = $request->nombre;
        $user->appA = $request->appA;
        $user->appB = $request->appB;
        $user->fechaN = $request->fechaN;
        $user->genero = $request->genero;
        $user->email = $request->email;
        $user->puesto_id = $request->puesto_id;

        $user->save();

        return redirect()->route('inicio');
    }
}
