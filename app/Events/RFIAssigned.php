<?php

namespace gotham\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RFIAssigned implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
    public $rfi;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($rfi)
    {
        //
        
        $this->rfi = $rfi[0];
        $this->user = $rfi[1];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return [
                "gotham-user-" . $this->user->id,
                ];
    }
}
