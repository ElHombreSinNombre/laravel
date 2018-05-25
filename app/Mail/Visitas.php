<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

//Models
use App\Models\Parametro;

class Visitas extends Mailable
{
    
    use Queueable, SerializesModels;

    protected $parametro;
    protected $input;

    public function __construct(Parametro $parametro, $input)
    {
        $this->parametro = $parametro::where('modulo','GENERAL')->where('campo','FIRMA')->first();
        $this->input = $input;
    }

    public function build()
    {
        $texto = $this->input->nombre.' '.$this->input->apellidos. ' de la empresa '.$this->input->empresa.' ha llegado a recepción';
        return $this->markdown('emails.visitas')->with('texto',$texto)->with('footer',$this->parametro);
    }

}
