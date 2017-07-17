<?php

namespace Tests\EvilCorp\Orders;

use EvilCorp\Orders\Order;
use EvilCorp\Payments\PaymentStatus;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testSetPaymentStatus()
    {
        $paymentStatus = $this->prophesize(PaymentStatus::class)->reveal();

        $order = new Order();
        $order->setPaymentStatus($paymentStatus);

        static::assertAttributeSame($paymentStatus, 'paymentStatus', $order);
        static::assertSame(12, $order->id());
    }
}
