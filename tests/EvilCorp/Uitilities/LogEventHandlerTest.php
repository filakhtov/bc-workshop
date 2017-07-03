<?php

namespace Tests\EvilCorp\Utilities;

use EvilCorp\EventInterface;
use EvilCorp\Utilities\LogEventHandler;
use EvilCorp\Utilities\Logger;
use PHPUnit\Framework\TestCase;

class LogEventHandlerTest extends TestCase
{
    public function testNotify()
    {
        $eventData = [
            'name' => 'foo',
            'origin' => 'bar',
        ];

        $data = json_encode($eventData);

        $loggerProphecy = $this->prophesize(Logger::class);
        $loggerProphecy->log($data)
            ->willReturn($loggerProphecy->reveal())
            ->shouldBeCalled();

        $event = $this->prophesize(EventInterface::class);

        $logEventHandler = new LogEventHandler($loggerProphecy->reveal());
        $logEventHandler->notify($event->reveal());
    }
}
