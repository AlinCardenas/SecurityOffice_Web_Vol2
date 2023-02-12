<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function __invoke()
    {
        return view('crudBonos.create');
    }
}
