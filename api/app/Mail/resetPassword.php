<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class resetPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $recipientData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($recipientData)
    {
        $this->recipientData = $recipientData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Resetar senha Apoie o Corpo');
        $this->to($this->recipientData->email);
        $this->from('bettercallmiguel@gmail.com', 'Apoie o Corpo');

        return $this->markdown('mail.sendPasswordResetLink',[
            'oldPassword'=> $this->recipientData,
            'recipientMail' => $this->recipientData->email
        ]);
    }
}
