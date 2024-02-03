<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Mail;
use App\Mail\OrderCreatedMailMessage;
use App\Mail\OrderCreatedMailMessageToClient;


class OrderCreatedMailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        Mail::to(env("MAIL_RECIEVER"))
            ->send(new OrderCreatedMailMessage($event->getData()));

        Mail::to(env("MAIL_RECIEVER"))
            ->send(new OrderCreatedMailMessageToClient($event->getData()));
    }
}
