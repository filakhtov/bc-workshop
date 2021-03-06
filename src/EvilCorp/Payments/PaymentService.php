<?php

namespace EvilCorp\Payments;

use EvilCorp\EventBusInterface;
use EvilCorp\Payments\Events\PaymentStatusUpdated;
use EvilCorp\Payments\OrderInterface;
use EvilCorp\Payments\PaymentStatus;

class PaymentService
{
    private $eventBus;

    public function __construct(EventBusInterface $eventBus)
    {
        $this->eventBus = $eventBus;
    }

    public function updatePaymentStatus(OrderInterface $order, PaymentStatus $paymentStatus): PaymentService
    {
        if ($paymentStatus->isOk()) {
            $order->setPaymentStatus($paymentStatus);
            $event = new PaymentStatusUpdated($order, $paymentStatus);

            $this->eventBus->publish($event);
            // Change order status
        } else {
            // Log
        }

        return $this;
    }
}
