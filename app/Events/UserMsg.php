<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserMsg implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userMsg;
    public $type;
    public $toId;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userMsg, $type, $toId)
    {
        $this->userMsg      = $userMsg;
        $this->type         = $type;
        $this->toId         = $toId;
        $this->message      = "Refresh the chat";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['user-msg'];
    }
}