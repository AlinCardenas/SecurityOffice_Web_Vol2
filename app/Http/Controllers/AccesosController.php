<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccesosController extends Controller
{
    public function __invoke()
    {
        return view('entradasSalidas');
    }
}
