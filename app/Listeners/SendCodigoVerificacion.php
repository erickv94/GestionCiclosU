<?php

namespace App\Listeners;

use App\Events\CreateUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendCodigoVerificacion
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  CreateUser  $event
     * @return void
     */
    public function handle(CreateUser $event)
    {
        $user=$event->user;
        Mail::send('email.codigo', compact('user'), function ($message) use($user) {
            $message->from('quimica@ues.edu.sv.com', 'Facultad de quimica y farmacia');
            $message->to($user->email, $user->name);
            $message->subject('Validación de cuenta');
        });
    }
}
