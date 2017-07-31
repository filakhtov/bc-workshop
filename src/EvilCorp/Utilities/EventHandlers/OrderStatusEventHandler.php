<?php

namespace EvilCorp\Utilities\EventHandlers;

use EvilCorp\EventInterface;
use EvilCorp\Orders\OrderService;
use EvilCorp\Orders\OrderStatus;
use EvilCorp\Utilities\EventSubscriberInterface;

class OrderStatusEventHandler implements EventSubscriberInterface
{
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function notify(EventInterface $event): EventSubscriberInterface
    {
        $this->orderService->updateStatus(123, new OrderStatus(OrderStatus::AWAITING_SHIPMENT));

        return $this;
    }
}
