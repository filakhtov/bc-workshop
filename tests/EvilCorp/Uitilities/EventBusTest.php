<?php

namespace Tests\EvilCorp\Utilities;

use EvilCorp\EventInterface;
use EvilCorp\Utilities\EventBus;
use EvilCorp\Utilities\EventSubscriberInterface;
use PHPUnit\Framework\TestCase;

class EventBusTest extends TestCase
{
    private $subscribers;
    private $eventBus;
    private $eventSubscriber1Prophecy;
    private $eventSubscriber2Prophecy;

    protected function setUp()
    {
        parent::setUp();

        $this->eventSubscriber1Prophecy = $this->prophesize(EventSubscriberInterface::class);
        $this->eventSubscriber2Prophecy = $this->prophesize(EventSubscriberInterface::class);

        $this->subscribers = [
            $this->eventSubscriber1Prophecy->reveal(),
            $this->eventSubscriber2Prophecy->reveal(),
        ];

        $this->eventBus = new EventBus($this->subscribers);
    }

    /** @covers EvilCorp\Utilities\EventBus::__construct() */
    public function testEventBusAddsSubscribersOnConstruction()
    {
        static::assertAttributeEquals($this->subscribers, 'subscribers', $this->eventBus);
    }

    /** @covers EvilCorp\Utilities\EventBus::publish() */
    public function testEventBusPublishNotifiesSubscribers()
    {
        $eventProphecy = $this->prophesize(EventInterface::class);
        $eventMock = $eventProphecy->reveal();

        $this->eventSubscriber1Prophecy
            ->notify($eventMock)
            ->willReturn($this->eventSubscriber1Prophecy)
            ->shouldBeCalled();

        $this->eventSubscriber2Prophecy
            ->notify($eventMock)
            ->willReturn($this->eventSubscriber2Prophecy)
            ->shouldBeCalled();

        $this->eventBus->publish($eventMock);
    }
}
