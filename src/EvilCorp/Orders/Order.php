<?php

namespace EvilCorp\Orders;

use EvilCorp\Payments\PaymentStatus;
use EvilCorp\Payments\OrderInterface;

class Order implements OrderInterface
{
    /** @var PaymentStatus */
    private $paymentStatus;

    public function setPaymentStatus(PaymentStatus $paymentStatus): OrderInterface
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    public function id(): int
    {
        return 12;
    }
}
