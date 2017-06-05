<?php

use EvilCorp\EventBusInterface;
use EvilCorp\EventInterface;

namespace EvilCorp;

interface EventBusInterface
{
    public function publish(EventInterface $event): EventBusInterface;
}
