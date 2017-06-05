<?php

namespace Tests\EvilCorp\Payments;

use EvilCorp\Payments\PaymentStatus;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PaymentStatusTest extends TestCase
{
    public function testStatus()
    {
        $paymentStatus = new PaymentStatus(PaymentStatus::STATUS_OK);

        static::assertSame(PaymentStatus::STATUS_OK, $paymentStatus->status());
    }

    public function testInvalidStatus()
    {
        $this->expectException(InvalidArgumentException::class);

        new PaymentStatus('boolshit');
    }

    public function testIsOk()
    {
        $paymentStatus = new PaymentStatus(PaymentStatus::STATUS_OK);

        static::assertTrue($paymentStatus->isOk());
    }

    public function testIsNotOk()
    {
        $paymentStatus = new PaymentStatus(PaymentStatus::STATUS_ERROR);

        static::assertFalse($paymentStatus->isOk());
    }
}
