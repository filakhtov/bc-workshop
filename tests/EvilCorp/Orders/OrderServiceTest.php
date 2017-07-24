<?php

namespace Tests\EvilCorp\Orders;

use EvilCorp\Orders\Order;
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
        $order = $orderProphecy->reveal();

        $orderService = new OrderService();

        $orderProphecy->setStatus($status)->shouldBeCalled();
        $orderService->updateStatus($orderId, $status);
    }
}
