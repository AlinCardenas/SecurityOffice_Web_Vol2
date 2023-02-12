<?php

namespace App\Http\Controllers;

use App\Models\EntradasSalida;
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
        return view('entradas-salida.create', compact('entradasSalida'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EntradasSalida::$rules);

        $entradasSalida = EntradasSalida::create($request->all());

        return redirect()->route('entradas-salidas.index')
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

        return view('entradas-salida.edit', compact('entradasSalida'));
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

        return redirect()->route('entradas-salidas.index')
            ->with('success', 'EntradasSalida updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $entradasSalida = EntradasSalida::find($id)->delete();

        return redirect()->route('entradas-salidas.index')
            ->with('success', 'EntradasSalida deleted successfully');
    }
}
