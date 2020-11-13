<?php

namespace App\Listeners;

use App\Events\EventSaving as EventSavingEvent;
use App\Models\Event;

class EventSaving
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\EventSavingEvent $event
     * @return mixed
     */
    public function handle(EventSavingEvent $event)
    {
        $count = Event::where('user_id', $event->event->user_id)
            ->whereRaw('begin > ? AND begin < ?', [$event->event->begin, $event->event->end])
            ->orWhereRaw('end > ? AND end < ?', [$event->event->begin, $event->event->end])
            ->count();

        return ($count < 1);
    }
}
