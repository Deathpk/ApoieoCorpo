<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactMessage extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dadosRemetente)
    {
        $this->user = $dadosRemetente;
        // dd($this->user['email']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Suporte Apoie o Corpo');
        $this->to('bettercallmiguel@gmail.com');
        $this->from($this->user['email'], $this->user['nome']);

        return $this->markdown('mail.contactMessage',[
            'email'=>$this->user['email'],
            'name'=>$this->user['nome'],
            'mensagem'=>$this->user['mensagem']
        ]);
    }
}
