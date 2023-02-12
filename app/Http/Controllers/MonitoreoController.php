<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoreoController extends Controller
{
    public function __invoke()
    {
        return view('monitoreo');
    }
}
