<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

/**
 * Class TurnoController
 * @package App\Http\Controllers
 */
class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos = Turno::paginate();

        return view('turno.index', compact('turnos'))
            ->with('i', (request()->input('page', 1) - 1) * $turnos->perPage());
    }

    //************************************************************** */
    public function indexes(Request $request)
    {
        $coincidencia = $request->get('mensaje');

        $turnos = Turno::where('turno', 'LIKE', $coincidencia.'%')->get();

        if ($turnos->isNotEmpty()) {
            return view('buscar.turnos.veru', compact('turnos'));
        }else{
            return view('buscar.turnos.sin');
        }
    }
    public function normal(Request $request)
    {
        $turnos = Turno::paginate();

        return view('buscar.turnos.vern', compact('turnos'));
    }
    //************************************************************** */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turno = new Turno();
        return view('turno.create', compact('turno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Turno::$rules);

        $turno = Turno::create($request->all());

        return redirect()->route('turnos.index')
            ->with('success', 'Turno created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turno = Turno::find($id);

        return view('turno.show', compact('turno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turno = Turno::find($id);

        return view('turno.edit', compact('turno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Turno $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turno $turno)
    {
        request()->validate(Turno::$rules);

        $turno->update($request->all());

        return redirect()->route('turnos.index')
            ->with('success', 'Turno updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $turno = Turno::find($id)->delete();

        return redirect()->route('turnos.index')
            ->with('success', 'Turno deleted successfully');
    }
}
