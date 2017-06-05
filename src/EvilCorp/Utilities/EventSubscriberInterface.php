<?php

namespace EvilCorp\Utilities;

use EvilCorp\EventInterface;

interface EventSubscriberInterface
{
    public function notify(EventInterface $event): EventSubscriberInterface;
}
