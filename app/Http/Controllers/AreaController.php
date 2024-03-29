<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Sucursale;
use Illuminate\Http\Request;

/**
 * Class AreaController
 * @package App\Http\Controllers
 */
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::paginate();

        return view('area.index', compact('areas'))
            ->with('i', (request()->input('page', 1) - 1) * $areas->perPage());
    }
    //************************************************************** */
    public function indexes(Request $request)
    {
        $coincidencia = $request->get('mensaje');

        $areas = Area::where('nombre', 'LIKE', $coincidencia.'%')->get();

        if ($areas->isNotEmpty()) {
            return view('buscar.areas.veru', compact('areas'));
        }else{
            return view('buscar.areas.sin');
        }
    }
    public function normal(Request $request)
    {
        $areas = Area::paginate();

        return view('buscar.areas.vern', compact('areas'));
    }
    //************************************************************** */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = new Area();
        $registro = Sucursale::pluck('nombre', 'id');
        return view('area.create', compact('area', 'registro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Area::$rules);

        $area = Area::create($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'Area created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::find($id);

        return view('area.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        $registro = Sucursale::pluck('nombre', 'id');
        return view('area.edit', compact('area', 'registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Area $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        request()->validate(Area::$rules);

        $area->update($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'Area updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $area = Area::find($id)->delete();

        return redirect()->route('areas.index')
            ->with('success', 'Area deleted successfully');
    }
}
