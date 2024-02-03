<?php

namespace App\Listeners;

use App\Events\CallbackRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Telegram\Bot\Api;

class CallbackRequestTelegram
{
    /**
     * Handle the event.
     */
    public function handle(CallbackRequested $event): void
    {
        $telegram = new Api('6574313854:AAEIQ7fX1c4O5p3GNCjZZed-DVUIYv7eEbY');
    }
}
