<?php

namespace EvilCorp\Utilities;

use EvilCorp\EventInterface;
use EvilCorp\Utilities\EventSubscriberInterface;
use EvilCorp\Utilities\JsonHelper;
use EvilCorp\Utilities\Logger;

class LogEventHandler implements EventSubscriberInterface
{
    private $logger;
    private $jsonHelper;

    public function __construct(Logger $logger, JsonHelper $jsonHelper)
    {
        $this->logger = $logger;
        $this->jsonHelper = $jsonHelper;
    }

    public function notify(EventInterface $event): EventSubscriberInterface
    {
        $this->logger->log(
            $this->jsonHelper->encode($event)
        );

        return $this;
    }
}
