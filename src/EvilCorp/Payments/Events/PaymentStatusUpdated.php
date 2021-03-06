<?php

namespace EvilCorp\Payments\Events;

use EvilCorp\EventInterface;
use EvilCorp\Orders\Events\OrderEventInterface;
use EvilCorp\Payments\OrderInterface;
use EvilCorp\Payments\PaymentStatus;

class PaymentStatusUpdated implements EventInterface, OrderEventInterface
{
    private $orderId;
    private $paymentStatus;

    public function __construct(OrderInterface $order, PaymentStatus $paymentStatus)
    {
        $this->orderId = $order->id();
        $this->paymentStatus = $paymentStatus->status();
    }

    public function data(): array
    {
        return [
            'order_id' => $this->orderId,
            'status' => $this->paymentStatus,
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->data();
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }
}
