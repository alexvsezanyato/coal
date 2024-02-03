<?php

namespace App\Listeners;

use App\Events\CallbackRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Mail;
use App\Mail\CallbackRequested as CallbackRequestedMail;
use App\Mail\CallbackRequestMailToClient;

class CallbackRequestMail
{
    /**
     * Handle the event.
     */
    public function handle(CallbackRequested $event): void
    {
        $data = $event->getData();

        if (!empty($data["email"]))
        {
            Mail::to(env("MAIL_RECIEVER"))
                ->send(new CallbackRequestedMail($event->getData()));

            Mail::to($data["email"])
                ->send(new CallbackRequestMailToClient($event->getData()));
        }
    }
}
