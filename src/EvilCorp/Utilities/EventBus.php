<?php

namespace EvilCorp\Utilities;

use EvilCorp\EventBusInterface;
use EvilCorp\EventInterface;

class EventBus implements EventBusInterface
{
    private $subscribers = [];

    public function __construct(array $subscribers)
    {
        foreach ($subscribers as $subscriber) {
            $this->addSubscriber($subscriber);
        }
    }

    private function addSubscriber(\EvilCorp\Utilities\EventSubscriberInterface $subscriber): EventBusInterface
    {
        $this->subscribers[] = $subscriber;

        return $this;
    }

    public function publish(EventInterface $event): EventBusInterface
    {
        foreach ($this->subscribers as $subscriber) {
            $subscriber->notify($event);
        }

        return $this;
    }
}
