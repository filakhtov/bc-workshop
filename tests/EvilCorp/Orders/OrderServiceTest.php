<?php

namespace Tests\EvilCorp\Orders;

use EvilCorp\Orders\Order;
use EvilCorp\Orders\OrderRepositoryInterface;
use EvilCorp\Orders\OrderService;
use EvilCorp\Orders\OrderStatus;
use PHPUnit\Framework\TestCase;

class OrderServiceTest extends TestCase
{
    public function testUpdateOrderStatus()
    {
        $orderId = 123;
        $status = new OrderStatus(OrderStatus::AWAITING_SHIPMENT);

        $orderProphecy = $this->prophesize(Order::class);

        $orderRepositoryProphecy = $this->prophesize(OrderRepositoryInterface::class);
        $orderRepositoryProphecy->getById(123)->willReturn($orderProphecy->reveal());

        $orderService = new OrderService($orderRepositoryProphecy->reveal());

        $orderProphecy->setStatus($status)->shouldBeCalled()->willReturn($orderProphecy->reveal());
        $orderService->updateStatus($orderId, $status);
    }
}
