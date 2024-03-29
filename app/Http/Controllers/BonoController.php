<?php

namespace App\Http\Controllers;

use App\Models\Bono;
use App\Models\TiposBono;
use Illuminate\Http\Request;

/**
 * Class BonoController
 * @package App\Http\Controllers
 */
class BonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonos = Bono::paginate();

        return view('bono.index', compact('bonos'))
            ->with('i', (request()->input('page', 1) - 1) * $bonos->perPage());
    }

    //************************************************************** */
    public function indexes(Request $request)
    {
        $coincidencia = $request->get('mensaje');

        $bonos = Bono::where('nombre', 'LIKE', $coincidencia.'%')->get();

        if ($bonos->isNotEmpty()) {
            return view('buscar.bonos.veru', compact('bonos'));
        }else{
            return view('buscar.bonos.sin');
        }
    }
    public function normal(Request $request)
    {
        $bonos = Bono::paginate();

        return view('buscar.bonos.vern', compact('bonos'));
    }
    //************************************************************** */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bono = new Bono();
        return view('bono.create', compact('bono'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bono::$rules);

        $bono = Bono::create($request->all());

        return redirect()->route('bonos.index')
            ->with('success', 'Bono created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bono = Bono::find($id);

        return view('bono.show', compact('bono'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bono = Bono::find($id);
        return view('bono.edit', compact('bono'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bono $bono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bono $bono)
    {
        request()->validate(Bono::$rules);

        $bono->update($request->all());

        return redirect()->route('bonos.index')
            ->with('success', 'Bono updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bono = Bono::find($id)->delete();

        return redirect()->route('bonos.index')
            ->with('success', 'Bono deleted successfully');
    }
}
