<?php

namespace EvilCorp\Payments;

use EvilCorp\EventBusInterface;
use EvilCorp\Orders\Order;
use EvilCorp\Payments\PaymentStatus;

class PaymentService
{
    private $eventBus;

    public function __construct(EventBusInterface $eventBus)
    {
        $this->eventBus = $eventBus;
    }

    public function updatePaymentStatus(Order $order, PaymentStatus $paymentStatus): PaymentService
    {
        if ($paymentStatus->isOk()) {
            $order->setPaymentStatus($paymentStatus);
            // Log
            // Change order status
        } else {
            // Log
        }

        return $this;
    }
}
