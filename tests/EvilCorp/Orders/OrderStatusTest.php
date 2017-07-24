<?php

namespace Tests\EvilCorp\Orders;

use EvilCorp\Orders\OrderStatus;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class OrderStatusTest extends TestCase
{
    public function testStatus()
    {
        $status = OrderStatus::AWAITING_SHIPMENT;
        $orderStatus = new OrderStatus($status);

        static::assertSame(OrderStatus::AWAITING_SHIPMENT, $orderStatus->status());
    }

    public function testInvalidStatusThrows()
    {
        $status = -1;

        $this->expectException(InvalidArgumentException::class);
        new OrderStatus($status);
    }
}
