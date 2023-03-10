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

        $registro = $request->all();

        $gen_pass = $request->password;

        $hashed = Hash::make($gen_pass, [
            'rounds' => 15,
        ]);
        
        
        $registro['password'] = $hashed;
        // dump($registro['password']);
        
        if($imagen=$request->file('foto')){
            $rutaGuardarImg = 'imgs/';
            $imgRegistro = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imgRegistro);
            $registro['foto'] = "$imgRegistro";
        }

        $user = User::create($registro);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.'); 
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

        $registro = $request->all();

        if($imagen=$request->file('foto')){
            $rutaGuardarImg = 'imgs/';
            $imgRegistro = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imgRegistro);
            $registro['foto'] = "$imgRegistro";
        }

        $user->update($registro);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
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
