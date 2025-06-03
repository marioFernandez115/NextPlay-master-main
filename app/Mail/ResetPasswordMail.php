<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function build()
    {
        return $this->view('auth.passwords.resetPassword')  // Vista correcta para el correo
            ->subject('Restablecimiento de Contraseña')
            ->from('Administrador@NextPlay.es', 'NextPlay')  // Establece el correo y nombre del remitente
            ->with([
                'url' => $this->url,  // Pasa la URL al correo
            ]);
    }
}
