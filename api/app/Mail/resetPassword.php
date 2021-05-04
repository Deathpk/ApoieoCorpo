<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class resetPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $oldPassword;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($oldPassword)
    {
        $this->oldPassword = $oldPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Resetar senha Apoie o Corpo');
        $this->to('bettercallmiguel@gmail.com');
        $this->from('bettercallmiguel@gmail.com', 'Apoie o Corpo');

        return $this->markdown('mail.sendPasswordResetLink',[
            'oldPassword'=> $this->oldPassword
        ]);
    }
}
