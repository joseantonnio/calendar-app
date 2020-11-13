<?php

namespace App\Events;

use App\Models\Event;
use Illuminate\Queue\SerializesModels;

class EventSaving
{
    use SerializesModels;

    public $event;

    /**
     * Create a new event instance.
     *
     * @param \App\Model\Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }
}
