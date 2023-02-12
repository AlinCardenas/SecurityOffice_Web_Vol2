<?php

namespace App\Http\Controllers;

use App\Models\TiposBono;
use Illuminate\Http\Request;

/**
 * Class TiposBonoController
 * @package App\Http\Controllers
 */
class TiposBonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposBonos = TiposBono::paginate();

        return view('tipos-bono.index', compact('tiposBonos'))
            ->with('i', (request()->input('page', 1) - 1) * $tiposBonos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposBono = new TiposBono();
        return view('tipos-bono.create', compact('tiposBono'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TiposBono::$rules);

        $tiposBono = TiposBono::create($request->all());

        return redirect()->route('tipos-bonos.index')
            ->with('success', 'TiposBono created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiposBono = TiposBono::find($id);

        return view('tipos-bono.show', compact('tiposBono'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposBono = TiposBono::find($id);

        return view('tipos-bono.edit', compact('tiposBono'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TiposBono $tiposBono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposBono $tiposBono)
    {
        request()->validate(TiposBono::$rules);

        $tiposBono->update($request->all());

        return redirect()->route('tipos-bonos.index')
            ->with('success', 'TiposBono updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tiposBono = TiposBono::find($id)->delete();

        return redirect()->route('tipos-bonos.index')
            ->with('success', 'TiposBono deleted successfully');
    }
}
