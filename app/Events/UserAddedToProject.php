<?php

namespace gotham\Events;


use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserAddedToProject implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $user;
    public $project;
    public $project_count;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->user = $user[0];
        $this->project = $user[1];
        $this->project_count = $user[2];
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
