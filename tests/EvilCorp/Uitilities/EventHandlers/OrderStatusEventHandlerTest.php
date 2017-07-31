<?php

namespace Tests\EvilCorp\Utilities\EventHandlers;

use EvilCorp\EventInterface;
use EvilCorp\Orders\OrderService;
use EvilCorp\Orders\OrderStatus;
use EvilCorp\Utilities\EventHandlers\OrderStatusEventHandler;
use PHPUnit\Framework\TestCase;

class OrderStatusEventHandlerTest extends TestCase
{
    public function testHandler()
    {
        $eventProphecy = $this->prophesize(EventInterface::class);

        $orderId = 123;
        $orderStatus = new OrderStatus(OrderStatus::AWAITING_SHIPMENT);

        $orderServiceProphecy = $this->prophesize(OrderService::class);
        $orderServiceProphecy->updateStatus($orderId, $orderStatus)->shouldBeCalled();

        $orderStatusEventHandler = new OrderStatusEventHandler($orderServiceProphecy->reveal());
        $orderStatusEventHandler->notify($eventProphecy->reveal());
    }
}
