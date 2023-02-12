<?php

namespace App\Http\Controllers;

use App\Models\PuestosTurno;
use Illuminate\Http\Request;

/**
 * Class PuestosTurnoController
 * @package App\Http\Controllers
 */
class PuestosTurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestosTurnos = PuestosTurno::paginate();

        return view('puestos-turno.index', compact('puestosTurnos'))
            ->with('i', (request()->input('page', 1) - 1) * $puestosTurnos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puestosTurno = new PuestosTurno();
        return view('puestos-turno.create', compact('puestosTurno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PuestosTurno::$rules);

        $puestosTurno = PuestosTurno::create($request->all());

        return redirect()->route('puestos-turnos.index')
            ->with('success', 'PuestosTurno created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puestosTurno = PuestosTurno::find($id);

        return view('puestos-turno.show', compact('puestosTurno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puestosTurno = PuestosTurno::find($id);

        return view('puestos-turno.edit', compact('puestosTurno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PuestosTurno $puestosTurno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PuestosTurno $puestosTurno)
    {
        request()->validate(PuestosTurno::$rules);

        $puestosTurno->update($request->all());

        return redirect()->route('puestos-turnos.index')
            ->with('success', 'PuestosTurno updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $puestosTurno = PuestosTurno::find($id)->delete();

        return redirect()->route('puestos-turnos.index')
            ->with('success', 'PuestosTurno deleted successfully');
    }
}
