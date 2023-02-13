<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Models\Area;
use Illuminate\Http\Request;

/**
 * Class PuestoController
 * @package App\Http\Controllers
 */
class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = Puesto::paginate();

        return view('puesto.index', compact('puestos'))
            ->with('i', (request()->input('page', 1) - 1) * $puestos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puesto = new Puesto();
        $registro = Area::pluck('nombre', 'id');
        return view('puesto.create', compact('puesto', 'registro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Puesto::$rules);

        $puesto = Puesto::create($request->all());

        return redirect()->route('puestos.index')
            ->with('success', 'Puesto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puesto = Puesto::find($id);
        return view('puesto.show', compact('puesto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puesto = Puesto::find($id);
        $registro = Area::pluck('nombre', 'id');
        return view('puesto.edit', compact('puesto', 'registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Puesto $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puesto $puesto)
    {
        request()->validate(Puesto::$rules);

        $puesto->update($request->all());

        return redirect()->route('puestos.index')
            ->with('success', 'Puesto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $puesto = Puesto::find($id)->delete();

        return redirect()->route('puestos.index')
            ->with('success', 'Puesto deleted successfully');
    }
}
