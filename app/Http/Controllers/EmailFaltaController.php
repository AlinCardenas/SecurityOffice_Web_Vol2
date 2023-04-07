<?php

namespace App\Http\Controllers;

use App\Mail\Falta;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailFaltaController extends Controller
{
    public function enviarCorreoFalta($id){
        $usuario = User::find($id);
        $fecha = Carbon::now()->toDateString();
        $mailable = new Falta($usuario, $fecha);
        // dump($usuario->email);
        Mail::to($usuario->email)->send($mailable);
    }
}
