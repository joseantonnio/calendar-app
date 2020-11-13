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
            ->where(function ($query) use ($event) {
                $query->where(function ($query) use ($event) {
                    $query->whereRaw('begin > ? and begin < ?', [$event->event->begin, $event->event->end]);
                    $query->orWhereRaw('end > ? and end < ?', [$event->event->begin, $event->event->end]);
                });
                $query->orWhere(function ($query) use ($event) {
                    $query->where('begin', $event->event->begin);
                    $query->where('end', $event->event->end);
                });
            })
            ->count();

        if ($count > 0) {
            throw new \Exception('The current event is overlapping an existing one!');
        }
    }
}
