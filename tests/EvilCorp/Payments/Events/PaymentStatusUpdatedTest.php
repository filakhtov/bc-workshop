<?php

namespace Tests\EvilCorp\Payments\Events;

use EvilCorp\Payments\Events\PaymentStatusUpdated;
use EvilCorp\Payments\OrderInterface;
use EvilCorp\Payments\PaymentStatus;
use PHPUnit\Framework\TestCase;

class PaymentStatusUpdatedTest extends TestCase
{
    public function testPaymentStatus()
    {
        $orderId = 123;
        $newPaymentStatus = PaymentStatus::STATUS_OK;

        $order = $this->prophesize(OrderInterface::class);
        $order->id()->willReturn($orderId);

        $paymentStatus = $this->prophesize(PaymentStatus::class);
        $paymentStatus->status()->willReturn($newPaymentStatus);

        $event = new PaymentStatusUpdated($order->reveal(), $paymentStatus->reveal());

        static::assertJsonStringEqualsJsonString(
            json_encode([
                'status' => $newPaymentStatus,
                'order_id' => $orderId,
            ]),
            json_encode($event)
        );
    }

    public function test()
    {
        TODO: test id getter
    }
}
