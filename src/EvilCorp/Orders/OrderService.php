<?php

namespace EvilCorp\Orders;

use EvilCorp\Orders\OrderRepositoryInterface;
use EvilCorp\Orders\OrderStatus;

class OrderService
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function updateStatus(int $orderId, OrderStatus $status)
    {
        $order = $this->orderRepository->getById($orderId);
        $order->setStatus($status);
    }
}
