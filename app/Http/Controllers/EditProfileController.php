<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Models\User;
use Illuminate\Http\Request;

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

        $registro = $request->all();

        if($imagen=$request->file('foto')){
            $rutaGuardarImg = 'imgs/';
            $imgRegistro = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imgRegistro);
            $registro['foto'] = "$imgRegistro";
        }

        $user->update($registro);

        return redirect()->route('inicio');
    }
}
