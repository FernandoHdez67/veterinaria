<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;

class RecuperarContrasenaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function build()
    {
        $app_name = Config::get('app.name');

        return $this->view('emails.recuperar-contrasena')
            ->subject("Recuperación de contraseña")
            ->with(['token' => $this->token]);
    }
}
