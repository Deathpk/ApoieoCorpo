<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PasswordChangeRequested;
use Illuminate\Support\Facades\Mail;
use App\Mail\resetPassword;
class SendPasswordResetEmail implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PasswordChangeRequested $event)
    {
        $recipientInfo = $event->getData();
        try{
            Mail::send(new resetPassword($recipientInfo));
        } catch (\Exception $e){
            throw new \Exception(
                'Oops! , Ocorreu uma falha inesperada ao enviar o e-mail. Mensage:'.
                $e->getMessage()
            );
        }
    }
}
