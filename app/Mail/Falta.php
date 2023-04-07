<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Falta extends Mailable
{
    use Queueable, SerializesModels;
    protected $usuario, $fecha;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $fecha)
    {
        $this->usuario = $usuario;
        $this->fecha = $fecha;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('emails.falta')
            ->subject("Notificación de asistencia")
            ->with([
                "usuario" => $this->usuario,
                "fecha" => $this->fecha,
            ]);
    }
}
