<?php

namespace gotham\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserRemovedFromProject implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
    
    public $user;
    public $project_name;
    public $project_count;
    public $admin_email;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->user = $user[0];
        $this->project_name = $user[1];
        $this->project_count = $user[2];
        $this->admin_email = $user[3];
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
