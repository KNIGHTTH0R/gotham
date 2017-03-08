<?php

namespace gotham\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProjectCreated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
    
    public $project;
    public $createdby;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($project)
    {
        //
        $this->project = $project[0];
        $this->createdby = $project[1];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
         return [
                'gotham-1',
                ];
    }
}
