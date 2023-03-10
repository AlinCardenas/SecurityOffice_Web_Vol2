<?php

namespace App\Http\Controllers;

use App\Models\Bono;
use App\Models\EntradasSalida;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class EntradasSalidaController
 * @package App\Http\Controllers
 */
class EntradasSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $entradasSalidas = EntradasSalida::paginate();

        return view('entradas-salida.index', compact('entradasSalidas'))
            ->with('i', (request()->input('page', 1) - 1) * $entradasSalidas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entradasSalida = new EntradasSalida(); 
        $registro = User::pluck('nombre', 'id');
        $registrob = Bono::pluck('cantidad', 'id');
        return view('entradas-salida.create', compact('entradasSalida', 'registro', 'registrob'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hoy = Carbon::today();

        $registro = new EntradasSalida();

        $registro->entrada = $request->entrada;
        $registro->salida = $request->salida;
        $registro->fecha = $hoy;
        $registro->usuario_id = $request->usuario_id;
        $registro->bono_id = $request->bono_id;

        // $entradasSalida = EntradasSalida::create($request->all());
        $registro->save();

        return redirect()->route('entradas.index')
            ->with('success', 'EntradasSalida created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entradasSalida = EntradasSalida::find($id);

        return view('entradas-salida.show', compact('entradasSalida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entradasSalida = EntradasSalida::find($id);
        $registro = User::pluck('nombre', 'id');
        $registrob = Bono::pluck('cantidad', 'id');
        return view('entradas-salida.edit', compact('entradasSalida', 'registro', 'registrob'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EntradasSalida $entradasSalida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EntradasSalida $entradasSalida)
    {
        
        request()->validate(EntradasSalida::$rules);

        $entradasSalida->update($request->all());

        // $id->save();

        return redirect()->route('entradas.index')->with('success', 'EntradasSalida updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $entradasSalida = EntradasSalida::find($id)->delete();

        return redirect()->route('entradas.index')
            ->with('success', 'EntradasSalida deleted successfully');
    }
}
