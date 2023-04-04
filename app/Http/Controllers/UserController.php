<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $registro = Puesto::pluck('nombre', 'id');
        return view('user.create', compact('user', 'registro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

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

        return redirect()->route('users.index')->with('success', 'Usuario generado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $registro = Puesto::pluck('nombre', 'id');
        return view('user.edit', compact('user', 'registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */ 
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

        return redirect()->route('users.index')->with('success', 'Usuario generado');

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
