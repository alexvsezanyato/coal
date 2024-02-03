<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CallbackRequested
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected array $data;

    public function getData()
    {
        return $this->data;
    }

    public function __construct(array $data)
    {
        $this->data = $data;
    }
}
