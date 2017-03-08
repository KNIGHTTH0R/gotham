<?php

namespace gotham\Listeners;

use gotham\Events\RFIUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUpdateNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RFIUpdated  $event
     * @return void
     */
    public function handle(RFIUpdated $event)
    {
        //
        
    }
}
