<?php

namespace EvilCorp\Orders;

use EvilCorp\Payments\PaymentStatus;

class Order
{
    /** @var PaymentStatus */
    private $paymentStatus;

    public function setPaymentStatus(PaymentStatus $paymentStatus): \EvilCorp\Orders\Order
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }
}
