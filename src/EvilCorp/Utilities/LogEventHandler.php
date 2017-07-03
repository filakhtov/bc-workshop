<?php

namespace EvilCorp\Utilities;

use EvilCorp\EventInterface;
use EvilCorp\Utilities\EventSubscriberInterface;
use EvilCorp\Utilities\Logger;

class LogEventHandler implements EventSubscriberInterface
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function notify(EventInterface $event): EventSubscriberInterface
    {
        $this->logger->log(json_encode($event));

        return $this;
    }
}
