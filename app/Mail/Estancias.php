<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

//Models
use App\Models\Parametro;

class Estancias extends Mailable
{

    use Queueable, SerializesModels;

    protected $parametro;

    public function __construct(Parametro $parametro)
    {
        $this->parametro = $parametro::where('modulo','GENERAL')->where('campo','FIRMA')->first();;
    }

    public function build()
    {
        return $this->markdown('emails.estancias')->with('footer',$this->parametro );
    }

}
