<?php

namespace EvilCorp\Payments;

use EvilCorp\Payments\PaymentStatus;

interface OrderInterface
{
    public function id(): int;

    public function setPaymentStatus(PaymentStatus $paymentStatus): OrderInterface;
}
